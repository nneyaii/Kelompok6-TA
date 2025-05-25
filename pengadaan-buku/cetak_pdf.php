<?php
require 'vendor/autoload.php';
include 'koneksi.php';

use Dompdf\Dompdf;

$where = '';
if (!empty($_GET['tanggal_mulai']) && !empty($_GET['tanggal_akhir'])) {
    $where = "WHERE tanggal BETWEEN '{$_GET['tanggal_mulai']}' AND '{$_GET['tanggal_akhir']}'";
}

$data = $koneksi->query("SELECT * FROM pengadaan $where ORDER BY tanggal DESC");

$html = '<h2>Laporan Pengadaan Buku</h2><table border="1" cellpadding="5" cellspacing="0">
<tr>
<th>No</th><th>Tanggal</th><th>Judul Buku</th><th>Asal Buku</th><th>Jumlah</th><th>Keterangan</th></tr>';

$no = 1;
while ($row = $data->fetch_assoc()) {
    $html .= "<tr><td>{$no++}</td><td>{$row['tanggal']}</td><td>{$row['judul_buku']}</td><td>{$row['asal_buku']}</td><td>{$row['jumlah']}</td><td>{$row['keterangan']}</td></tr>";
}
$html .= '</table>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('laporan_pengadaan.pdf');
?>