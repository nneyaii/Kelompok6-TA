<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-add {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-add:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Data Anggota</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <label>No. Telepon</label>
        <input type="text" name="telepon" required>

        <label>Jenis Kelamin</label>
        <select name="gender" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label>Umur</label>
        <input type="number" name="umur" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <label>Foto</label>
        <input type="file" name="foto" accept="image/*" required>

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
