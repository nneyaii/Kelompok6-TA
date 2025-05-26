<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "perpus-admin");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!isset($_POST['privacy'])) {
        $error = "Anda harus menyetujui kebijakan privasi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } elseif ($password !== $confirm_password) {
        $error = "Password tidak cocok.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Perbaikan: nama tabel harus sesuai (login, bukan db_login)
        $check = $conn->prepare("SELECT id FROM login WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "Email sudah digunakan.";
        } else {
            $stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashed_password);
            if ($stmt->execute()) {
                header("Location: login.php");
                exit;
            } else {
                $error = "Gagal membuat akun.";
            }
            $stmt->close();
        }
        $check->close();
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Account</title>
  <link rel="stylesheet" href="crtakun.css" />
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="image-section">
        <img src="img/create-account-office.jpeg" alt="Create Account" />
      </div>

      <div class="form-section">
        <h1>Create account</h1>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form action="" method="POST">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required placeholder="contoh@domain.com" />

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />

          <label for="confirm_password">Confirm password</label>
          <input type="password" id="confirm_password" name="confirm_password" required />

          <div class="checkbox-container">
            <input type="checkbox" id="privacy" name="privacy" required />
            <label for="privacy" class="privacy-policy">I agree to the privacy policy</label>
          </div>

          <button type="submit">Create account</button>
        </form>

        <a href="login.php" class="login-link">Already have an account? Login</a>
      </div>
    </div>
  </div>
</body>
</html>
