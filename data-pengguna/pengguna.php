<?php include 'db.php'; ?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h2>Data Pengguna</h2>
    <a href="tambah_pengguna.php" class="btn btn-add">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Status</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM pengguna";
            $result = $koneksi->query($sql);
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td><img src='uploads/{$row['foto']}' width='50' height='50' style='border-radius:50%;'></td>";
                echo "<td>{$row['nama_user']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td><span class='status aktif'>{$row['status']}</span></td>";
                echo "<td>{$row['level']}</td>";
                echo "<td>
                    <a href='edit_pengguna.php?id={$row['id']}' class='btn btn-edit'>✎</a>
                    <a href='hapus_pengguna.php?id={$row['id']}' class='btn btn-delete' onclick=\"return confirm('Yakin hapus data ini?')\">🗑</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
