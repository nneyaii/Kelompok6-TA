<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan konfirmasi cocok
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok!";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Gunakan prepared statement
    $stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Akun berhasil dibuat!";
    } else {
        if (str_contains($conn->error, 'Duplicate')) {
            echo "Email sudah terdaftar!";
        } else {
            echo "Gagal: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
