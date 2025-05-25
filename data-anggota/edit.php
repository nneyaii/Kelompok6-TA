<?php include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Anggota</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label>Nama Lengkap</label><br>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

        <label>No. Telepon</label><br>
        <input type="text" name="telepon" value="<?= $data['telepon'] ?>" required><br><br>

        <label>Jenis Kelamin</label><br>
        <select name="gender" required>
            <option value="Laki-laki" <?= $data['gender'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $data['gender'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select><br><br>

        <label>Umur</label><br>
        <input type="number" name="umur" value="<?= $data['umur'] ?>" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br><br>

        <label>Foto (kosongkan jika tidak diganti)</label><br>
        <input type="file" name="foto" accept="image/*"><br><br>

        <button type="submit" class="btn btn-edit">Update</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $gender = $_POST['gender'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    if ($_FILES['foto']['name'] != "") {
        $foto_name = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $foto_path = "uploads/" . $foto_name;
        move_uploaded_file($foto_tmp, $foto_path);
        $update = mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', telepon='$telepon', gender='$gender', umur='$umur', alamat='$alamat', foto='$foto_path' WHERE id='$id'");
    } else {
        $update = mysqli_query($koneksi, "UPDATE anggota SET nama='$nama', telepon='$telepon', gender='$gender', umur='$umur', alamat='$alamat' WHERE id='$id'");
    }

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}
?>
</body>
</html>
