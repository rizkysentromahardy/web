<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php include('header/header.php'); ?>
    <div class="row justify-content-center">
        <h1>SELAMAT DATANG </h1>
        <br>
        <H2>DI WEBSITE PENGADUAN KECAMATAN SUMOBITO</H2>
        <br>
<br>
        <img src="/config/images/jombang.png" style="height: 370px;" />
    </div>
    <?php include('footer/footer.php'); ?>
</body>

</html>