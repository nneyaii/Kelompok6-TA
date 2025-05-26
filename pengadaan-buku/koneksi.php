<?php
$koneksi = new mysqli("localhost", "root", "", "perpus-admin");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>