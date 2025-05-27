<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <style>
        body {
            background-color: #f4f7f8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <form method="POST">
        <h2>Tambah Pengadaan Buku</h2>
        <input type="date" name="tanggal" required>
        <input type="text" name="judul_buku" placeholder="Judul Buku" required>
        <input type="text" name="asal_buku" placeholder="Asal Buku" required>
        <input type="number" name="jumlah" placeholder="Jumlah" required>
        <textarea name="keterangan" placeholder="Keterangan"></textarea>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $koneksi->query("INSERT INTO pengadaan (tanggal, judul_buku, asal_buku, jumlah, keterangan)
            VALUES ('$_POST[tanggal]', '$_POST[judul_buku]', '$_POST[asal_buku]', $_POST[jumlah], '$_POST[keterangan]')");
        header("Location: index.php");
    }
    ?>

</body>
</html>
