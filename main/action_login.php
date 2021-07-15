<?php
session_start();
include('config/conn.php');
$user = $_POST['username'];
$pass = md5($_POST['password']);

$sql = "SELECT * FROM pegawai WHERE username='$user' AND password='$pass'";

$login = mysqli_query($koneksi, $sql);
$count = mysqli_num_rows($login);

if ($count > 0) {
    $row = mysqli_fetch_assoc($login);
		$_SESSION["username"]=$row["username"];
		$_SESSION["password"]=$row["password"];
    $_SESSION["login"]=true;
    header("location:home.php");
    echo "sukses";
} else {
    echo "<script>alert('username dan password tidak sesuai');</script>";
    header("location:login.php");
}
