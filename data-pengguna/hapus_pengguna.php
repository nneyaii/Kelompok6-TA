<?php
include 'db.php';
$id = $_GET['id'];

// Hapus data
$koneksi->query("DELETE FROM pengguna WHERE id=$id");

echo "<script>alert('Data berhasil dihapus');window.location='pengguna.php';</script>";
?>
