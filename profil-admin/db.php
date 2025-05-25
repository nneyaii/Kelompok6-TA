
<?php
// db.php
$conn = mysqli_connect("localhost", "root", "", "perpus-admin");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
