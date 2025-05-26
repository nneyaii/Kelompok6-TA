<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
include 'koneksi.php';

$mulai = $_GET['tanggal_mulai'] ?? '';
$akhir = $_GET['tanggal_akhir'] ?? '';
$where = (!empty($mulai) && !empty($akhir)) ? "WHERE tanggal BETWEEN '$mulai' AND '$akhir'" : "";
$result = $koneksi->query("SELECT * FROM pengadaan $where ORDER BY tanggal DESC");

$html = "<h3>Laporan Pengadaan Buku</h3><table border='1' cellpadding='5' cellspacing='0'><tr>
<th>No</th><th>Tanggal</th><th>Judul Buku</th><th>Asal Buku</th><th>Jumlah</th><th>Keterangan</th></tr>";
$no = 1;
while ($row = $result->fetch_assoc()) {
    $html .= "<tr><td>$no</td><td>{$row['tanggal']}</td><td>{$row['judul_buku']}</td>
    <td>{$row['asal_buku']}</td><td>{$row['jumlah']}</td><td>{$row['keterangan']}</td></tr>";
    $no++;
}
$html .= "</table>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("laporan_pengadaan.pdf");
?>