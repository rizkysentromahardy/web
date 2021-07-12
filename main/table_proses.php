<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location:index.php");
    exit;
}

include('header/header.php');
include('config/conn.php');

// $sql = "SELECT * FROM lapor ORDER BY tanggal_lapor ";
// $result = mysqli_query($koneksi, $sql);
// $sql2 = "SELECT * FROM logs WHERE nama_sts LIKE 'selesai'";
// $result2 = mysqli_query($koneksi, $sql2);
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
WHERE c.nama_sts = 'proses' ";

$result = mysqli_query($koneksi,$sql);


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 0, "desc" ]]'>

                    <thead>
                        <tr>
                        <a href="export_data.php">export excel</a>
                            <th style="text-align:center;">TANGGAL</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>JENIS</th>
                            <th>TIKET</th>
                            <th>AKSI</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <tr style="position: center;">
                                <td style="text-align:center;"><?= $row['tanggal_lapor'] ?></td>
                                <td><?= $row['nama_lapor'] ?></td>
                                <td><?= $row['alamat_lapor'] ?></td>
                                <td><?= $row['jenis_lapor'] ?></td>
                                <td><?= $row['tiket_lapor'] ?></td>
                                <td style="text-align:center;">
                                    <!-- Button trigger modal -->

                                    <a href=<?= "form.php?id=" . $row['id_lapor'] ?> class="btn btn-primary">Lihat</a>
                                <td><?= $row['nama_sts'] ?></td>
                                </td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
<?php include('footer/footer.php') ?>