<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
    <style>
        /* Reset dan body */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            padding: 30px;
            color: #333;
        }

        /* Container form */
        .container {
            background: #fff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Judul */
        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
        }

        /* Label dan input */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* Tombol umum */
        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Tombol Simpan (Tambah) - Biru */
        .btn-add {
            background-color: #007bff;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }

        /* Tombol Kembali (Edit) - Hijau */
        .btn-edit {
            background-color: #28a745;
        }

        .btn-edit:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Pengguna</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama User:</label>
        <input type="text" name="nama_user" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Status:</label>
        <select name="status" required>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>

        <label>Level:</label>
        <select name="level" required>
            <option value="Kepala">Kepala</option>
            <option value="Petugas">Petugas</option>
            <option value="Administrasi">Administrasi</option>
        </select>

        <label>Foto:</label>
        <input type="file" name="foto" required>

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
