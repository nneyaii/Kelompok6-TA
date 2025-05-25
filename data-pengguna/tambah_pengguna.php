<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Pengguna</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama User:</label><br>
        <input type="text" name="nama_user" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select><br><br>

        <label>Level:</label><br>
        <select name="level" required>
            <option value="Kepala">Kepala</option>
            <option value="Petugas">Petugas</option>
            <option value="Administrasi">Administrasi</option>
        </select><br><br>

        <label>Foto:</label><br>
        <input type="file" name="foto" required><br><br>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-add">
    </form>
    <br>
    <a href="pengguna.php" class="btn btn-edit">Kembali</a>
</div>
</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $level = $_POST['level'];

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $foto);

    $sql = "INSERT INTO pengguna (nama_user, email, status, level, foto) 
            VALUES ('$nama_user', '$email', '$status', '$level', '$foto')";
    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil ditambahkan');window.location='pengguna.php';</script>";
    } else {
        echo "Gagal menambahkan data.";
    }
}
?>
