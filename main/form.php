<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}
include('header/header.php');
include('config/conn.php');

$id;
$imgurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// $sql = 'SELECT 
//     m.id_lapor id, 
//     m.nama_lapor nama,
//             m.tiket_lapor,
//             m.alamat_lapor,
//             m.jenis_lapor,
//             m.detail_lapor,
//             m.nomer_tlp,
//             m.foto_lapor,
//             c.nama_sts,
//             c.date

// FROM
//     lapor m
// INNER JOIN logs c ON c.id_lapor = m.id_lapor
// WHERE m.id_lapor = ' . $id;



$sql = "SELECT * FROM lapor WHERE id_lapor='$id'";
$sql2 = "SELECT * FROM logs WHERE id_lapor ='$id' ORDER BY date DESC";
$result = mysqli_query($koneksi, $sql);
$result2 = mysqli_query($koneksi, $sql2);

if ($result) {
    # code...
    $row = mysqli_fetch_array($result);
} else {
    printf('gegel');
}
if ($result2) {
    # code...
    $row2 = mysqli_fetch_array($result2);
    if ($row2) {
        # code...
    } else {
        $row2 = array("nama_sts" => "Tidak ada status!");
    }
} else {
    printf('gegel');
    $row2 = array("nama_sts" => "Tidak ada status!");
}


?>


<!-- Begin Page Content -->
<div class="container-fluid" id="component-form">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Details </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <!-- <div class="text-center" id="imgdetail">
                <img src="<?= $imgurl ?>/admin/main/config/images/<?= $row['foto_lapor'] ?>" class="rounded img-fluid" alt="Responsive image">
            </div> -->
            <div class="row mt-3">
                <div class="col">

                </div>
                <div class="col">
                    <img src="<?= $imgurl ?>/config/images/<?= $row['foto_lapor'] ?>" class="rounded img-fluid imgdetail" alt="...">

                </div>
                <div class="col">

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3" style="font-weight: bold;">
                    Nama
                </div>
                <div class="col">
                    : <?= $row['nama_lapor'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="font-weight: bold;">
                    Alamat
                </div>
                <div class="col">
                    : <?= $row['alamat_lapor'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="font-weight: bold;">
                    Jenis Laporan
                </div>
                <div class="col">
                    : <?= $row['jenis_lapor'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="font-weight: bold;">
                    Detail Laporan
                </div>
                <div class="col">
                    : <?= $row['detail_lapor'] ?>
                </div>
            </div>
            <div class="row">
                <div class="col-3" style="font-weight: bold;">
                    Nomer Telpon
                </div>
                <div class="col">
                    : <?= $row['nomer_tlp'] ?>
                </div>
            </div>
            <div class="row ">
                <div class="col-3" style="font-weight: bold;">
                    Tanggal Lapor
                </div>
                <div class="col">
                    : <?= $row['tanggal_lapor'] ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3" style="font-weight: bold;">
                    Status
                </div>
                <div class="col status">
                    : <?= $row2['nama_sts'] ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-9" style="font-weight: bold;">

                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary backPage">Kembali</button>
                    <?php
                    if ($row2['nama_sts'] == 'pending') {
                        echo '<button type="button" class="btn btn-success " id="simpan" name="proses">Proses</button>';
                    } else if ($row2['nama_sts'] == 'proses') {
                        echo '<button type="button" class="btn btn-danger " id="simpan" name="selesai">Selesai</button>';
                    }
                    ?>
                </div>
            </div>
            <!-- <textarea id="editor"></textarea>
            <br /> -->

        </div>
    </div>
</div>

<script>
    window.onload = function() {
        if (window.jQuery) {
            $("#simpan").click(function() {
                var sts = $('#simpan').attr('name');
                v = query_string('id');
                alert(sts);
                $.ajax({
                    type: 'POST',
                    url: "insert_log.php",
                    data: {
                        id: v,
                        sts: sts
                    },
                    success: function() {
                        alert('Berhasil guys...');
                        // $('#component-form').load()
                        location.reload();
                    }
                });
            });

            $('.backPage').click(function () {
                window.history.go(-1);
            })
        }
    }

    function query_string(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return (false);
    }
</script>
<!-- /.container-fluid -->
<?php include('footer/footer.php') ?>