<?php

$koneksi = new mysqli("localhost","root","","dbadmin");// mengecek koneksi
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
