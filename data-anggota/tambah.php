<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Anggota</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama" required><br><br>

        <label>No. Telepon</label><br>
        <input type="text" name="telepon" required><br><br>

        <label>Jenis Kelamin</label><br>
        <select name="gender" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>

        <label>Umur</label><br>
        <input type="number" name="umur" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Foto</label><br>
        <input type="file" name="foto" accept="image/*" required><br><br>

        <button type="submit" class="btn btn-add">Simpan</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $gender = $_POST['gender'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];

    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = "uploads/" . $foto_name;

    move_uploaded_file($foto_tmp, $foto_path);

    $query = mysqli_query($koneksi, "INSERT INTO anggota (nama, telepon, gender, umur, alamat, foto) 
        VALUES ('$nama', '$telepon', '$gender', '$umur', '$alamat', '$foto_path')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah data');</script>";
    }
}
?>
</body>
</html>
