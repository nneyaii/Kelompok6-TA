<?php include 'db.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengguna WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Pengguna</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama User:</label><br>
        <input type="text" name="nama_user" value="<?= $data['nama_user'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $data['email'] ?>" required><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="Tidak Aktif" <?= $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
        </select><br><br>

        <label>Level:</label><br>
        <select name="level">
            <option value="Kepala" <?= $data['level'] == 'Kepala' ? 'selected' : '' ?>>Kepala</option>
            <option value="Petugas" <?= $data['level'] == 'Petugas' ? 'selected' : '' ?>>Petugas</option>
            <option value="Administrasi" <?= $data['level'] == 'Administrasi' ? 'selected' : '' ?>>Administrasi</option>
        </select><br><br>

        <label>Foto (kosongkan jika tidak diubah):</label><br>
        <input type="file" name="foto"><br><br>

        <input type="submit" name="update" value="Update" class="btn btn-add">
    </form>
    <br>
    <a href="pengguna.php" class="btn btn-edit">Kembali</a>
</div>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $level = $_POST['level'];

    if ($_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $foto);
        $sql = "UPDATE pengguna SET nama_user='$nama_user', email='$email', status='$status', level='$level', foto='$foto' WHERE id=$id";
    } else {
        $sql = "UPDATE pengguna SET nama_user='$nama_user', email='$email', status='$status', level='$level' WHERE id=$id";
    }

    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil diupdate');window.location='pengguna.php';</script>";
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>
