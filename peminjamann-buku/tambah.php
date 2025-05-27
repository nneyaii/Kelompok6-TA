<?php include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $anggota = $_POST['anggota'];
    $tempo = $_POST['tempo'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $koneksi->query("INSERT INTO peminjaman (id_pinjam, tgl_pinjam, anggota, tempo, status, keterangan) 
                    VALUES ('$id_pinjam', '$tgl_pinjam', '$anggota', '$tempo', '$status', '$keterangan')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
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
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form method="POST">
    <h2>Tambah Data</h2>
    <input name="id_pinjam" placeholder="ID Pinjam" required>
    <input type="date" name="tgl_pinjam" required>
    <input name="anggota" placeholder="Nama Anggota" required>
    <input type="date" name="tempo" required>
    <select name="status">
        <option value="Pinjam">Pinjam</option>
        <option value="Kembali">Kembali</option>
    </select>
    <textarea name="keterangan" placeholder="Keterangan"></textarea>
    <button type="submit">Simpan</button>
</form>

</body>
</html>
