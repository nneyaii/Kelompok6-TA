CREATE DATABASE IF NOT EXISTS db_pengadaan;
USE db_pengadaan;

CREATE TABLE pengadaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    judul_buku VARCHAR(100),
    asal_buku VARCHAR(50),
    jumlah INT,
    keterangan TEXT
);

INSERT INTO pengadaan (tanggal, judul_buku, asal_buku, jumlah, keterangan) VALUES
('2020-09-15', 'Otodidak Web Programming', 'Sumedang', 5, '-'),
('2020-04-21', 'Lancar JavaScript', 'Sumedang', 6, '-'),
('2020-04-22', 'Belajar Otodidak CodeIgniter', 'Sumedang', 6, '-'),
('2020-04-15', 'Pro PHP & Jquery 7 Hari', 'Sumedang', 5, '-');