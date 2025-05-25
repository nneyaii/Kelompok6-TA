<?php
include 'db.php'; // file koneksi, sudah benar

// Tidak perlu koneksi ulang jika sudah pakai db.php

$query = mysqli_query($koneksi, "SELECT * FROM buku");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Data Buku</h2>
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
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
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
        <i class="fas fa-edit" style="color:white;"></i>
    </a>
    <a href="hapus_buku.php?id=<?= $row['id_buku'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
        <i class="fas fa-trash-alt" style="color:white;"></i>
    </a>
</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
