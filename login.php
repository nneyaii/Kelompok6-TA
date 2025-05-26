<?php
$host     = "localhost";
$username = "root";
$password = "";
$database = "perpus-admin"; // Ganti dengan nama database kamu

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Perpustakaan</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="login-container">
    <div class="login-card">
      <div class="login-left">
        <img src="img/login-office.jpeg" alt="Office">
      </div>
      <div class="login-right">
        <h2>Login</h2>

        <!-- Form login ke process-login.php -->
        <form action="process-login.php" method="post">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="contoh@domain.com" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="********" required>

          <button type="submit">Log In</button>
        </form>

        <p><a href="create-account.php">Create Account</a></p>
      </div>
    </div>
  </div>
</body>
</html>
