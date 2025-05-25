<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM admin WHERE id = 1");
$admin = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $foto = $admin['foto'];
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "images/$foto");
    }

    $query = "UPDATE admin SET 
        nama='$nama', 
        email='$email', 
        telepon='$telepon', 
        status='$status', 
        role='$role',
        foto='$foto'
        WHERE id=1";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<div class="container">
    <h4>Edit Profil</h4>
    <form method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $admin['nama'] ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $admin['email'] ?>" required>

        <label>Telepon</label>
        <input type="text" name="telepon" value="<?= $admin['telepon'] ?>" required>

        <label>Status</label>
        <select name="status">
            <option <?= $admin['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
            <option <?= $admin['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
        </select>

        <label>Role</label>
        <select name="role">
            <option <?= $admin['role'] == 'Administrasi' ? 'selected' : '' ?>>Administrasi</option>
            <option <?= $admin['role'] == 'Manajemen' ? 'selected' : '' ?>>Manajemen</option>
            <option <?= $admin['role'] == 'Keuangan' ? 'selected' : '' ?>>Keuangan</option>
        </select>

        <label>Foto</label>
        <input type="file" name="foto">

        <button type="submit" class="btn-primary">Simpan</button>
        <a href="index.php" class="btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
