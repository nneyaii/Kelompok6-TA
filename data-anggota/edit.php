<?php 
include 'db.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Anggota</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #218838;
        }

        .image-preview {
            margin-bottom: 20px;
        }

        .image-preview img {
            max-width: 150px;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Data Anggota</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>No. Telepon</label>
        <input type="text" name="telepon" value="<?= $data['telepon'] ?>" required>

        <label>Jenis Kelamin</label>
        <select name="gender" required>
            <option value="Laki-laki" <?= $data['gender'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= $data['gender'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <label>Umur</label>
        <input type="number" name="umur" value="<?= $data['umur'] ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

        <label>Foto (kosongkan jika tidak diganti)</label>
        <input type="file" name="foto" accept="image/*">

        <?php if (!empty($data['foto'])): ?>
            <div class="image-preview">
                <strong>Foto Saat Ini:</strong><br>
                <img src="<?= $data['foto'] ?>" alt="Foto Anggota">
            </div>
        <?php endif; ?>

        <button type="submit" class="btn">Update</button>
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
        $foto_path = "uploads/" . time() . "_" . basename($foto_name);
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
