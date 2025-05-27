<?php include '../pengadaan-buku/koneksi.php'; ?> <!-- Ganti path jika perlu -->
<!DOCTYPE html>
<html>
<head>
    <title>Pengadaan Buku</title>
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
        <a href="pengguna.php" ><i class="fas fa-user-shield me-2"></i> Admin</a>
        <a href="../data-anggota/index.php"><i class="fas fa-users me-2"></i> Data Anggota</a>
        <a href="../data-buku/index.php"><i class="fas fa-book me-2"></i> Data Buku</a>
        <a href="../peminjamann-buku/index.php"><i class="fas fa-book-reader me-2"></i> Peminjaman Buku</a>
        <a href="../pengadaan-buku/index.php" class="active"><i class="fas fa-box me-2"></i> Pengadaan Buku</a>
        <a href="../profil-admin/index.php"><i class="fas fa-user-circle me-2"></i> Profil Admin</a>
    </nav>
</div>

    <!-- Main Content -->
    <div class="main-content" style="margin-left:260px; padding:20px;">
        <h2>Laporan Pengadaan</h2>

        <!-- Form Filter -->
        <form method="GET">
            <input type="date" name="tanggal_mulai" value="<?= $_GET['tanggal_mulai'] ?? '' ?>">
            <input type="date" name="tanggal_akhir" value="<?= $_GET['tanggal_akhir'] ?? '' ?>">
            <a href="tambah.php" class="btn btn-primary">Tambah Data</a>

        </form>

        <!-- Tabel -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul Buku</th>
                    <th>Asal Buku</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $where = "";
                if (!empty($_GET['tanggal_mulai']) && !empty($_GET['tanggal_akhir'])) {
                    $mulai = $_GET['tanggal_mulai'];
                    $akhir = $_GET['tanggal_akhir'];
                    $where = "WHERE tanggal BETWEEN '$mulai' AND '$akhir'";
                }

                $query = "SELECT * FROM pengadaan $where ORDER BY tanggal DESC";
                $result = $koneksi->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['judul_buku']}</td>
                                <td>{$row['asal_buku']}</td>
                                <td>{$row['jumlah']}</td>
                                <td>{$row['keterangan']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")'>Hapus</a>
                                </td>
                            </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7'>Data tidak ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
