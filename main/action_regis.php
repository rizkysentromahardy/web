<?php
 include('config/conn.php');
$user = mysqli_real_escape_string($koneksi, $_POST['username']);
$pass = mysqli_real_escape_string($koneksi, $_POST['password']);
$passwordhash = md5($pass);

$result = mysqli_query($koneksi, "INSERT INTO pegawai VALUES('','$user','$passwordhash')");
if ($result) {
    header("Location:login.php?pesan=berhasil");
}
else {
header("location:regis.php?pesan=gagal");
}
?>