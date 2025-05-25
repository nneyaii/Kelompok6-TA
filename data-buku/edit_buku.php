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
