<?php
session_start();
include('config/conn.php');

if (!isset($_SESSION["login"])) {
    header("Location:404.php");
    exit;
}

if (isset($_POST['regis'])){

    $user = mysqli_real_escape_string($koneksi,$_POST['username']);
    $pass = mysqli_real_escape_string($koneksi ,$_POST['password']);
    $passwordhash = md5($pass);

    $result=mysqli_query($koneksi,"INSERT INTO pegawai VALUES('','$user','$passwordhash')");
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">

        <ul>
            <li>
                <label for="username"> username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="regis"> register </button>
            </li>
        </ul>

    </form>
</body>

</html>
