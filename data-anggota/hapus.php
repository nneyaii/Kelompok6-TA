<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM anggota WHERE id='$id'"));

if (file_exists($data['foto'])) {
    unlink($data['foto']); // hapus foto dari server
}

$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data');</script>";
}
?>
