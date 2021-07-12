<?php
include('config/conn.php');
$id = $_POST['id'];
$status = $_POST['sts'];
echo $id;
// $sql = "SELECT * FROM lapor WHERE id_lapor='$id'";
// $result = mysqli_query($koneksi, $sql);
$insertLog = "INSERT INTO logs (id_lapor, date, nama_sts) VALUES ('{$id}', NOW(), '{$status}')";
$logs = $koneksi->query($insertLog);
