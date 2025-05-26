<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Anggota</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f5f9;
            color: #333;
            /* hapus padding body supaya sidebar dan main-content pas */
            min-height: 100vh;
        }

        /* Sidebar */
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

        /* Main content di kanan sidebar */
        .main-content {
            margin-left: 240px; /* Lebar sidebar */
            padding: 30px;
            background-color: #f3f5f9;
            min-height: 100vh;
        }

        /* Container */
        .container {
            max-width: 100%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Judul */
        .container h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        /* Tombol */
        .btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            margin: 2px;
            transition: background-color 0.3s ease;
        }

        .btn-add {
            background-color: #3498db;
            margin-bottom: 15px;
        }

        .btn-add:hover {
            background-color: #2980b9;
        }

        .btn-edit {
            background-color: #27ae60;
        }

        .btn-edit:hover {
            background-color: #219150;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        th {
            background-color: #f1f1f1;
            color: #2c3e50;
        }

        /* Foto */
        .foto {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4><i class="fas fa-book-reader me-2"></i>Perpus Admin</h4>
    <nav>
        <a href="../index.php"><i class="fas fa-chart-pie me-2"></i> Dashboard</a>
        <a href="../data-pengguna/pengguna.php"><i class="fas fa-user-shield me-2"></i> Admin</a>
        <a href="../data-anggota/index.php"  class="active"><i class="fas fa-users me-2"></i> Data Anggota</a>
        <a href="../data-buku/index.php"><i class="fas fa-book me-2"></i> Data Buku</a>
        <a href="../peminjamann-buku/index.php"><i class="fas fa-book-reader me-2"></i> Peminjaman Buku</a>
        <a href="../pengadaan-buku/index.php"><i class="fas fa-box me-2"></i> Pengadaan Buku</a>
        <a href="../profil-admin/index.php"><i class="fas fa-user-circle me-2"></i> Profil Admin</a>
    </nav>
</div>

<!-- Main content -->
<div class="main-content">
    <div class="container">
        <h2>Data Anggota</h2>
        <a class="btn btn-add" href="tambah.php">Tambah Data</a>
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>No. Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM anggota");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td><img src='{$data['foto']}' class='foto' alt='Foto'></td>
                    <td>{$data['nama']}</td>
                    <td>{$data['telepon']}</td>
                    <td>{$data['gender']}</td>
                    <td>{$data['umur']}</td>
                    <td>{$data['alamat']}</td>
                    <td>
                        <a class='btn btn-edit' href='edit.php?id={$data['id']}'>Edit</a>
                        <a class='btn btn-delete' href='hapus.php?id={$data['id']}' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
