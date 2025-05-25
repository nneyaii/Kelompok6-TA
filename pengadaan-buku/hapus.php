<?php
include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM pengadaan WHERE id=$id");
header("Location: index.php");
?>