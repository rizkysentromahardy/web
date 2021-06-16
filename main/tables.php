<?php

include('header/header.php');
include('config/conn.php');

$sql = "SELECT * FROM lapor";
$result = mysqli_query($koneksi, $sql);


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
            <input id="datepicker" width="276" />
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align:center;">TANGGAL</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>JENIS</th>
                            <th style="text-align:center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <tr style="position: center;">
                                <td style="text-align:center;"><?= $row['tanggal_lapor'] ?></td>
                                <td><?= $row['nama_lapor'] ?></td>
                                <td><?= $row['alamat_lapor'] ?></td>
                                <td><?= $row['jenis_lapor'] ?></td>
                                <td style="text-align:center;">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                       <a href=<?= "form.php?id=".$row['id_lapor'] ?> >Lihat</a>
                                        
                                    </button>
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