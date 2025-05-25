<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id = 1");
$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Admin</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

<div class="container">
    <h4>Profile</h4>
    <div class="profile-card">
        <img src="images/<?= $admin['foto'] ?>" alt="Foto Admin" class="profile-img">
        <h3><?= $admin['nama'] ?></h3>
        <div class="row">
            <div class="col-md-6"><i class="fas fa-envelope"></i> <?= $admin['email'] ?></div>
            <div class="col-md-6"><i class="fas fa-phone"></i> <?= $admin['telepon'] ?></div>
            <div class="col-md-6"><i class="fas fa-check-circle"></i> <?= $admin['status'] ?></div>
            <div class="col-md-6"><i class="fas fa-user"></i> <?= $admin['role'] ?></div>
        </div>
        <div style="text-align: center; margin-top: 30px;">
        <a href="edit_profil.php" class="btn-edit">Ubah Profil</a>
    </div>
    </div>
</div>

</body>
</html>
