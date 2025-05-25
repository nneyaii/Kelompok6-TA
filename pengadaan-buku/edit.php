<?php include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengadaan WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Data</title></head>
<body>
    <h2>Edit Pengadaan Buku</h2>
    <form method="POST">
        <input type="date" name="tanggal" value="<?=$data['tanggal']?>" required><br>
        <input type="text" name="judul_buku" value="<?=$data['judul_buku']?>" required><br>
        <input type="text" name="asal_buku" value="<?=$data['asal_buku']?>" required><br>
        <input type="number" name="jumlah" value="<?=$data['jumlah']?>" required><br>
        <textarea name="keterangan"><?=$data['keterangan']?></textarea><br>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $koneksi->query("UPDATE pengadaan SET 
            tanggal='$_POST[tanggal]',
            judul_buku='$_POST[judul_buku]',
            asal_buku='$_POST[asal_buku]',
            jumlah=$_POST[jumlah],
            keterangan='$_POST[keterangan]' WHERE id=$id");
        header("Location: index.php");
    }
    ?>
</body>
</html>