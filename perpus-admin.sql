-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2025 pada 02.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus-admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `role` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `telepon`, `status`, `role`, `foto`) VALUES
(1, 'aini', 'aini@gmail.com', '08895914400', 'Aktif', 'Administrasi', 'WhatsApp Image 2025-05-24 at 14.56.47_e6525e39.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `telepon`, `gender`, `umur`, `alamat`, `foto`) VALUES
(4, 'figa', '081111111111', 'Laki-laki', 15, 'jalan', 'uploads/3e4d558fd995732c569c6808d0a08bfb.jpg'),
(5, 'yoga', '0855555555', 'Laki-laki', 17, 'mugas', 'uploads/0a7b9eaae57aa135441c5a55c4d03fa6.jpg'),
(6, 'tika', '08999999999', 'Perempuan', 18, 'simpang5', 'uploads/4227563f1503390eec476a577b9b4c0b.jpg'),
(7, 'Supri', '08111126165494', 'Perempuan', 105, 'Jalan Budiono Siregar', 'uploads/4227563f1503390eec476a577b9b4c0b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `rak` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `stok`, `kategori`, `rak`, `foto`) VALUES
(1, 'bulan', 'jaja', 1, 'alam', '20', '683186976ba19.png'),
(2, 'bulan', 'jaja', -2, 'alam', '20', 'Screenshot (115).png'),
(3, 'bulan', 'jaja', -4, 'alam', '20', 'Screenshot (114).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `level` enum('Kepala','Petugas','Administrasi') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_user`, `email`, `status`, `level`, `foto`) VALUES
(1, 'yoga', 'adiyoga@gmail.com', 'Aktif', 'Kepala', '0a7b9eaae57aa135441c5a55c4d03fa6.jpg'),
(3, 'Aini', 'aini@gmail.com', 'Aktif', 'Petugas', 'fd62d74e6b124c844a8f2c73f4153ed6.jpg'),
(4, 'figa', 'alfigaaprilia@gmail.com', 'Aktif', 'Administrasi', '3e4d558fd995732c569c6808d0a08bfb.jpg'),
(5, 'tama', 'tama@gmail.com', 'Aktif', 'Petugas', '48afd8f0cf0322508e1af048c031e7ec.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
