<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="style.css">
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
        <a href="pengguna.php" class="active"><i class="fas fa-user-shield me-2"></i> Admin</a>
        <a href="../data-anggota/index.php"><i class="fas fa-users me-2"></i> Data Anggota</a>
        <a href="../data-buku/index.php"><i class="fas fa-book me-2"></i> Data Buku</a>
        <a href="../peminjamann-buku/index.php"><i class="fas fa-book-reader me-2"></i> Peminjaman Buku</a>
        <a href="../pengadaan-buku/index.php"><i class="fas fa-box me-2"></i> Pengadaan Buku</a>
        <a href="../profil-admin/index.php"><i class="fas fa-user-circle me-2"></i> Profil Admin</a>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <h2>Data Pengguna</h2>
        <a href="tambah_pengguna.php" class="btn btn-add">Tambah Data</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM pengguna";
                $result = $koneksi->query($sql);
                $no = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td><img src='uploads/{$row['foto']}'></td>";
                    echo "<td>{$row['nama_user']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td><span class='status aktif'>{$row['status']}</span></td>";
                    echo "<td>{$row['level']}</td>";
                    echo "<td>
                            <a href='edit_pengguna.php?id={$row['id']}' class='btn btn-edit'>✎</a>
                            <a href='hapus_pengguna.php?id={$row['id']}' class='btn btn-delete' onclick=\"return confirm('Yakin hapus data ini?')\">🗑</a>
                       </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
