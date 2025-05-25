<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Laporan Peminjaman</h2>

    <form method="GET" class="filter-form">
        <input type="date" name="mulai" value="<?= $_GET['mulai'] ?? '' ?>">
        <input type="date" name="akhir" value="<?= $_GET['akhir'] ?? '' ?>">
        <button type="submit">Filter</button>
        <a href="index.php" class="reset-btn">Reset</a>
        <a href="tambah.php" class="add-btn">Tambah Data</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pinjam</th>
                <th>Tgl Pinjam</th>
                <th>Anggota</th>
                <th>Tempo</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $where = "";
            if (!empty($_GET['mulai']) && !empty($_GET['akhir'])) {
                $mulai = $_GET['mulai'];
                $akhir = $_GET['akhir'];
                $where = "WHERE tgl_pinjam BETWEEN '$mulai' AND '$akhir'";
            }
            $query = $koneksi->query("SELECT * FROM peminjaman $where ORDER BY tgl_pinjam DESC");
            while ($row = $query->fetch_assoc()) {
                echo "<tr>
                    <td>$no</td>
                    <td>{$row['id_pinjam']}</td>
                    <td>{$row['tgl_pinjam']}</td>
                    <td>{$row['anggota']}</td>
                    <td>{$row['tempo']}</td>
                    <td><span class='status {$row['status']}'>{$row['status']}</span></td>
                    <td><i>" . ($row['keterangan'] ?: '(Tidak diisi)') . "</i></td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> | 
                        <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")'>Hapus</a>
                    </td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>