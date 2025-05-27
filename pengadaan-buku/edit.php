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
<form method="POST" style="max-width: 400px; margin: 40px auto; padding: 30px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"><br>

    <input type="text" name="judul_buku" value="<?= $data['judul_buku'] ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"><br>

    <input type="text" name="asal_buku" value="<?= $data['asal_buku'] ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"><br>

    <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;"><br>

    <textarea name="keterangan" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 6px; resize: vertical; height: 80px;"><?= $data['keterangan'] ?></textarea><br>

    <button type="submit"
        style="width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer;">
        Update
    </button>
</form>
