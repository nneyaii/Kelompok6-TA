<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Perpus</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="style-2.css" />
</head>
<body>
  <!-- Sidebar -->
<div class="sidebar d-flex flex-column">
    <h4><i class="fas fa-book-reader me-2"></i>Perpus Admin</h4>
        <nav>
        <a href="dashboard.php" class="nav-link active">
            <i class="fas fa-chart-pie me-2"></i> Dashboard
        </a>
        <a href="data-pengguna/pengguna.php" class="nav-link">
            <i class="fas fa-user-shield me-2"></i> Admin
        </a>
        <a href="data-anggota/index.php" class="nav-link">
            <i class="fas fa-users me-2"></i> Data Anggota
        </a>
        <a href="data-buku/index.php" class="nav-link">
            <i class="fas fa-book me-2"></i> Data Buku
        </a>
        <a href="peminjamann-buku/index.php" class="nav-link">
            <i class="fas fa-book-reader me-2"></i> Peminjaman Buku
        </a>
        <a href="pengadaan-buku/index.php" class="nav-link">
            <i class="fas fa-box me-2"></i> Pengadaan Buku
        </a>
        <a href="profil-admin/index.php" class="nav-link">
            <i class="fas fa-user-circle me-2"></i> Profil Admin
        </a>
        </nav>
</div>


  <!-- Main Content -->
  <div class="main-content">
    <!-- Top Navbar -->
    <div class="top-navbar d-flex justify-content-between align-items-center">
      <h5 class="m-0 fw-semibold">Dashboard</h5>
      <div class="d-flex align-items-center gap-3">
        <input type="text" placeholder="Search..." class="form-control" />
        <div class="d-flex align-items-center gap-3">
          <div class="form-check form-switch m-0">
            <input class="form-check-input" type="checkbox" role="switch" id="darkModeToggle">
          </div>

          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-circle fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a href="login.php" class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <small class="text-success fw-bold">Jumlah Buku</small>
          <h4 class="m-0">3</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <small class="text-success fw-bold">Buku Dipinjam</small>
          <h4 class="m-0">230</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <small class="text-success fw-bold">Buku Tersedia</small>
          <h4 class="m-0">970</h4>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card shadow-sm p-3">
          <small class="text-success fw-bold">Total Anggota</small>
          <h4 class="m-0">350</h4>
        </div>
      </div>
    </div>

    <!-- Grafik & Tabel -->
      <div class="col-md-100">
        <div class="card p-3 shadow-sm">
          <h6 class="fw-semibold mb-3">Data Peminjaman Terbaru</h6>
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th>Tanggal</th>
                <th>Anggota</th>
                <th>Tempo</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>15-09-2020</td>
                <td>Heri Perdi</td>
                <td>18-09-2020</td>
                <td><span class="text-dark">Dipinjam</span></td>
              </tr>
              <tr>
                <td>15-09-2020</td>
                <td>Heri Perdi</td>
                <td>18-09-2020</td>
                <td><span class="text-dark">Kembali</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Scripts -->
  <script>
    const toggle = document.getElementById('darkModeToggle');
    toggle.addEventListener('change', () => {
      document.body.classList.toggle('dark-mode');
    });

    document.querySelector('.dropdown-item').addEventListener('click', () => {
      alert('Berhasil logout!');
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
