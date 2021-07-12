<?php

include('config/conn.php');
// nama file
$filename="data pelapor-".date('Ymd').".xls";

//header info for browser
header("Content-Type: application/vnd-ms-excel"); 
   header('Content-Disposition: attachment; filename="' . $filename . '";');

   //menampilkan data sebagai array dari tabel produk
   $out=array();
   $sql = "SELECT 
m.id_lapor, 
m.nama_lapor,
        m.tiket_lapor,
        m.detail_lapor,
        m.jenis_lapor,
        m.alamat_lapor,
        m.tanggal_lapor,
        c.nama_sts
        
FROM
lapor m
INNER JOIN logs c ON c.id_lapor = m.id_lapor
WHERE c.nama_sts = 'selesai' ";

$result=mysqli_query($koneksi,$sql);
while($data=mysqli_fetch_assoc($result)) $out[]=$data;

$show_coloumn = false;
foreach($out as $record) {
if(!$show_coloumn) {
//menampilkan nama kolom di baris pertama
echo implode("\t", array_keys($record)) . "\n";
$show_coloumn = true;
}
// looping data dari database
echo implode("\t", array_values($record)) . "\n";
} 
exit;