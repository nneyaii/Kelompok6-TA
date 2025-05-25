CREATE DATABASE IF NOT EXISTS perpusweb;
USE perpusweb;
CREATE TABLE IF NOT EXISTS peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pinjam VARCHAR(20),
    tgl_pinjam DATE,
    anggota VARCHAR(100),
    tempo DATE,
    status VARCHAR(20),
    keterangan TEXT
);
INSERT INTO peminjaman (id_pinjam, tgl_pinjam, anggota, tempo, status, keterangan) VALUES
('PJM0001', '2020-09-15', 'Heri Perdi', '2020-09-18', 'Pinjam', 'Tidak diisi'),
('PJM0002', '2020-09-15', 'Heri Perdi', '2020-09-18', 'Kembali', 'Tidak diisi');