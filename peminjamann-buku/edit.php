<?php include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM peminjaman WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $tempo = $_POST['tempo'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $koneksi->query("UPDATE peminjaman SET 
        id_pinjam='$id_pinjam',
        tgl_pinjam='$tgl_pinjam',
        anggota='$anggota',
        tempo='$tempo',
        status='$status',
        keterangan='$keterangan'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<form method="POST">
    <h2>Edit Data</h2>
    <input name="id_pinjam" value="<?= $data['id_pinjam'] ?>" required><br>
    <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam'] ?>" required><br>
    <input name="anggota" value="<?= $data['anggota'] ?>" required><br>
    <input type="date" name="tempo" value="<?= $data['tempo'] ?>" required><br>
    <select name="status">
        <option value="Pinjam" <?= $data['status']=='Pinjam'?'selected':'' ?>>Pinjam</option>
        <option value="Kembali" <?= $data['status']=='Kembali'?'selected':'' ?>>Kembali</option>
    </select><br>
    <textarea name="keterangan"><?= $data['keterangan'] ?></textarea><br>
    <button type="submit">Update</button>
</form>