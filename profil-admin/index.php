<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id = 1");
$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style4.css">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background-color: #12372A;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h4 {
            font-weight: bold;
            padding-left: 20px;
            margin-bottom: 2rem;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ffffffb3;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #57B85B;
            color: white !important;
            border-radius: 10px;
        }

        .main-content {
            margin-left: 240px; /* Jarak dari sidebar */
            padding: 30px;
        }

        .table td img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="fas fa-book-reader"></i>  Perpus Admin</h4>
        <nav>
            <a href="../index.php"><i class="fas fa-chart-pie me-2"></i> Dashboard</a>
            <a href="../data-pengguna/pengguna.php"><i class="fas fa-user-shield me-2"></i> Admin</a>
            <a href="../data-anggota/index.php"><i class="fas fa-users me-2"></i> Data Anggota</a>
            <a href="../data-buku/index.php"><i class="fas fa-book me-2"></i> Data Buku</a>
            <a href="../peminjamann-buku/index.php"><i class="fas fa-book-reader me-2"></i> Peminjaman Buku</a>
            <a href="../pengadaan-buku/index.php"><i class="fas fa-box me-2"></i> Pengadaan Buku</a>
            <a href="../profil-admin/index.php" class="active"><i class="fas fa-user-circle me-2"></i> Profil Admin</a>
        </nav>
    </div>

    <div class="container">
            <div class="profile-card">
                <div class="profile-card">
                <h4 class="profile-title">Profil Admin</h4>
                <img src="images/<?= $admin['foto'] ?>" alt="Foto Admin" class="profile-img">
                <h3><?= $admin['nama'] ?></h3>
                <div class="row">
                    <div class="col-md-6"><i class="fas fa-envelope"></i> <?= $admin['email'] ?></div>
                    <div class="col-md-6"><i class="fas fa-phone"></i> <?= $admin['telepon'] ?></div>
                    <div class="col-md-6"><i class="fas fa-check-circle"></i> <?= $admin['status'] ?></div>
                    <div class="col-md-6"><i class="fas fa-user"></i> <?= $admin['role'] ?></div>
                </div>
                <div style="text-align: center;">
                    <a href="edit_profil.php" class="btn-edit"><i class="fas fa-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </body>
</html>
