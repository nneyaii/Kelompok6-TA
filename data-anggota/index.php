<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <!-- Hubungkan CSS di sini -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

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
                <td><img src='{$data['foto']}' class='foto'></td>
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
</body>
</html>
