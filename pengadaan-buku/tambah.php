<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Data</title></head>
<body>
    <h2>Tambah Pengadaan Buku</h2>
    <form method="POST">
        <input type="date" name="tanggal" required><br>
        <input type="text" name="judul_buku" placeholder="Judul Buku" required><br>
        <input type="text" name="asal_buku" placeholder="Asal Buku" required><br>
        <input type="number" name="jumlah" placeholder="Jumlah" required><br>
        <textarea name="keterangan" placeholder="Keterangan"></textarea><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $koneksi->query("INSERT INTO pengadaan (tanggal, judul_buku, asal_buku, jumlah, keterangan)
            VALUES ('$_POST[tanggal]', '$_POST[judul_buku]', '$_POST[asal_buku]', $_POST[jumlah], '$_POST[keterangan]')");
        header("Location: index.php");
    }
    ?>
</body>
</html>