<?php include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM peminjaman WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $tempo = $_POST['tempo'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $koneksi->query("UPDATE peminjaman SET 
        id_pinjam='$id_pinjam',
        tgl_pinjam='$tgl_pinjam',
        anggota='$anggota',
        tempo='$tempo',
        status='$status',
        keterangan='$keterangan'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            background-color: #eef3f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px 0;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<form method="POST">
    <h2>Edit Data</h2>
    <input name="id_pinjam" value="<?= $data['id_pinjam'] ?>" required>
    <input type="date" name="tgl_pinjam" value="<?= $data['tgl_pinjam'] ?>" required>
    <input name="anggota" value="<?= $data['anggota'] ?>" required>
    <input type="date" name="tempo" value="<?= $data['tempo'] ?>" required>
    <select name="status">
        <option value="Pinjam" <?= $data['status']=='Pinjam'?'selected':'' ?>>Pinjam</option>
        <option value="Kembali" <?= $data['status']=='Kembali'?'selected':'' ?>>Kembali</option>
    </select>
    <textarea name="keterangan"><?= $data['keterangan'] ?></textarea>
    <button type="submit">Update</button>
</form>

</body>
</html>
