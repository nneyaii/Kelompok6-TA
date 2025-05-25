<?php
include 'db.php';

// Tidak perlu koneksi ulang jika db.php sudah ada koneksi
// Gunakan $koneksi dari db.php
// Jika kamu tetap ingin pakai $conn, sesuaikan db.php agar variabelnya konsisten


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $rak = $_POST['rak'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed_extensions)) {
        $upload_path = "images/ .$foto";
        move_uploaded_file($tmp, "images/" . $foto);

        // Insert ke database
        $query = mysqli_query($koneksi, "INSERT INTO buku (judul, penerbit, stok, kategori, rak, foto) 
                                        VALUES ('$judul', '$penerbit', '$stok', '$kategori', '$rak', '$foto')");

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    } else {
        echo "Format file tidak didukung. Gunakan JPG, PNG, atau GIF.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Buku</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Data Buku</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penerbit</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rak</label>
            <input type="text" name="rak" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
