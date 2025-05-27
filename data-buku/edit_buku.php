<?php
include 'db.php';
$conn = mysqli_connect("localhost", "root", "", "perpus-admin");

// Ambil ID buku dari parameter URL
$id = $_GET['id'];

// Ambil data buku berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id'");
$data = mysqli_fetch_assoc($query);

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $rak = $_POST['rak'];

    $fotoBaru = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    // Jika ada foto baru diunggah
    if (!empty($fotoBaru)) {
        $ext = strtolower(pathinfo($fotoBaru, PATHINFO_EXTENSION));
        $namaFoto = uniqid() . '.' . $ext;
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed_ext)) {
            move_uploaded_file($tmp, "images/" . $namaFoto);

            // Hapus foto lama jika ada
            if (!empty($data['foto']) && file_exists("images/" . $data['foto'])) {
                unlink("images/" . $data['foto']);
            }

            $query = mysqli_query($conn, "UPDATE buku SET 
                judul='$judul', 
                penerbit='$penerbit', 
                stok='$stok', 
                kategori='$kategori', 
                rak='$rak',
                foto='$namaFoto' 
                WHERE id_buku='$id'");
        } else {
            echo "Format file tidak didukung (JPG, JPEG, PNG, GIF).";
            exit;
        }
    } else {
        // Jika tidak mengubah foto
        $query = mysqli_query($conn, "UPDATE buku SET 
            judul='$judul', 
            penerbit='$penerbit', 
            stok='$stok', 
            kategori='$kategori', 
            rak='$rak'
            WHERE id_buku='$id'");
    }

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
    <link rel="stylesheet" href="style3.css">

    <style>
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 650px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #343a40;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        }

        small {
            display: block;
            margin-top: 5px;
            color: #666;
        }

        img {
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 15px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2>Edit Data Buku</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" value="<?= $data['penerbit'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?= $data['kategori'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Rak</label>
            <input type="text" name="rak" class="form-control" value="<?= $data['rak'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            <?php if (!empty($data['foto'])): ?>
                <img src="images/<?= $data['foto'] ?>" width="100"><br><br>
            <?php else: ?>
                Tidak ada foto
            <?php endif; ?>
            <input type="file" name="foto" class="form-control">
            <small>(Kosongkan jika tidak ingin mengganti foto)</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
