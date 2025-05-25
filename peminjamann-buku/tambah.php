<?php include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $tempo = $_POST['tempo'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $koneksi->query("INSERT INTO peminjaman (id_pinjam, tgl_pinjam, anggota, tempo, status, keterangan) 
                     VALUES ('$id_pinjam', '$tgl_pinjam', '$anggota', '$tempo', '$status', '$keterangan')");

    header("Location: index.php");
}
?>
<form method="POST">
    <h2>Tambah Data</h2>
    <input name="id_pinjam" placeholder="ID Pinjam" required><br>
    <input type="date" name="tgl_pinjam" required><br>
    <input name="anggota" placeholder="Nama Anggota" required><br>
    <input type="date" name="tempo" required><br>
    <select name="status">
        <option value="Pinjam">Pinjam</option>
        <option value="Kembali">Kembali</option>
    </select><br>
    <textarea name="keterangan" placeholder="Keterangan"></textarea><br>
    <button type="submit">Simpan</button>
</form>