<?php include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengadaan WHERE id = $id")->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $judul_buku = $_POST['judul_buku'];
    $asal_buku = $_POST['asal_buku'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $koneksi->query("UPDATE pengadaan SET tanggal='$tanggal', judul_buku='$judul_buku', asal_buku='$asal_buku', jumlah='$jumlah', keterangan='$keterangan' WHERE id=$id");
    header("Location: index.php");
}
?>
<form method="POST">
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br>
    <input type="text" name="judul_buku" value="<?= $data['judul_buku'] ?>" required><br>
    <input type="text" name="asal_buku" value="<?= $data['asal_buku'] ?>" required><br>
    <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required><br>
    <textarea name="keterangan"><?= $data['keterangan'] ?></textarea><br>
    <button type="submit">Update</button>
</form>