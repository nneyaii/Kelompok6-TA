<?php
include 'db.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pengguna WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"].btn.btn-add {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"].btn.btn-add:hover {
            background-color: #0056b3;
        }

        a.btn.btn-edit {
            display: inline-block;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a.btn.btn-edit:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Pengguna</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama User:</label>
        <input type="text" name="nama_user" value="<?= $data['nama_user'] ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required>

        <label>Status:</label>
        <select name="status">
            <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="Tidak Aktif" <?= $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
        </select>

        <label>Level:</label>
        <select name="level">
            <option value="Kepala" <?= $data['level'] == 'Kepala' ? 'selected' : '' ?>>Kepala</option>
            <option value="Petugas" <?= $data['level'] == 'Petugas' ? 'selected' : '' ?>>Petugas</option>
            <option value="Administrasi" <?= $data['level'] == 'Administrasi' ? 'selected' : '' ?>>Administrasi</option>
        </select>

        <label>Foto (kosongkan jika tidak diubah):</label>
        <input type="file" name="foto">

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
