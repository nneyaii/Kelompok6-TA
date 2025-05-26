<?php
include 'db.php';
$query = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
        <h4><i class="fas fa-book-reader me-2"></i>Perpus Admin</h4>
        <nav>
            <a href="../index.php"><i class="fas fa-chart-pie me-2"></i> Dashboard</a>
            <a href="/crud-php/Kelompok6-TA/data-pengguna/pengguna.php"><i class="fas fa-user-shield me-2"></i> Admin</a>
            <a href="../data-anggota/index.php"><i class="fas fa-users me-2"></i> Data Anggota</a>
            <a href="../data-buku/index.php" class="active"><i class="fas fa-book me-2"></i> Data Buku</a>
            <a href="../peminjamann-buku/index.php"><i class="fas fa-book-reader me-2"></i> Peminjaman Buku</a>
            <a href="../pengadaan-buku/index.php"><i class="fas fa-box me-2"></i> Pengadaan Buku</a>
            <a href="../profil-admin/index.php"><i class="fas fa-user-circle me-2"></i> Profil Admin</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2 class="mb-4">Data Buku</h2>
            <a href="tambah_buku.php" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php if (!empty($row['foto']) && file_exists('images/' . $row['foto'])): ?>
                                    <img src="images/<?= $row['foto'] ?>" class="foto-buku">
                                <?php else: ?>
                                    Tidak ada foto
                                <?php endif; ?>
                            </td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td><?= $row['kategori'] ?></td>
                            <td><?= $row['rak'] ?></td>
                            <td>
                                <a href="edit_buku.php?id=<?= $row['id_buku'] ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="hapus_buku.php?id=<?= $row['id_buku'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>