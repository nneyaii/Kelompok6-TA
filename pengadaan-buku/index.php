<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengadaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Laporan Pengadaan</h2>

    <form method="GET">
        <input type="date" name="tanggal_mulai">
        <input type="date" name="tanggal_akhir">
        <button type="submit">Filter</button>
        <a href="tambah.php">Tambah Data</a>
        <a href="cetak_pdf.php?tanggal_mulai=<?=$_GET['tanggal_mulai']??''?>&tanggal_akhir=<?=$_GET['tanggal_akhir']??''?>" target="_blank">Cetak PDF</a>
    </form>

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
            $result = $koneksi->query("SELECT * FROM pengadaan $where ORDER BY tanggal DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$no++}</td>
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
            }
            ?>
        </tbody>
    </table>
</body>
</html>