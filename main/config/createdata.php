<?php

date_default_timezone_set("Asia/Jakarta");

include('conn.php');
header("Access-Control-Allow-Origin: *");
header("Content-type", "application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$response = array();

if ($koneksi) {
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $catatan    = $_POST['note'];
    $jenis      = $_POST['jenis'];
    $telp       = $_POST['telp'];

    // 
    // cek apakah data yang dikirim sudah lengkap
    // 
    if ($_FILES['gambar']['tmp_name'] && $nama && $alamat && $catatan && $jenis && $telp) {

        // data gambar
        $tmp_file   = $_FILES['gambar']['tmp_name'];
        $img_name   = $_FILES["gambar"]['name'];
        $upload_dir = './images/' . $img_name;

        // data to db
        $kode       = date('ymdHis');
        // kueri insert lapor
        $sql = "INSERT INTO lapor (nama_lapor,alamat_lapor,detail_lapor,foto_lapor,jenis_lapor,nomer_tlp,tiket_lapor,tanggal_lapor ) VALUES
         ('{$nama}', '{$alamat}', '{$catatan}', '{$img_name}', '{$jenis}', '{$telp}', '{$kode}', NOW())";

        // eksekusi 
        $result = $koneksi->query($sql);

        // cek apakah hasil eksekusi berhasil
        if (move_uploaded_file($tmp_file, $upload_dir) && $result) {

            // kueri cek data
            $sql2 = "SELECT * FROM lapor WHERE tiket_lapor='{$kode}'";

            $cekData = $koneksi->query($sql2); // mysqli_query($koneksi, $sql2);

            if ($cekData) {
                while ($row = mysqli_fetch_assoc($cekData)) {

                    $id = $row['id_lapor'];
                    $tiketLapor = $row['tiket_lapor'];

                    // kueri insert
                    $insertLog = "INSERT INTO logs (id_lapor, date, nama_sts) VALUES ('{$id}', NOW(), 'pending')";
                    $logs = $koneksi->query($insertLog);
                    if ($logs) {
                        // echo 'Berhasil insert log';
                    }
                    http_response_code(200);
                    echo json_encode(array(
                        "id" => $id,
                        "kode_tiket" => $tiketLapor,
                        "message" => "Berhasil di Simpan",
                        "status" => "ok"
                    ));
                }
            }
        } else {
            http_response_code(406);
            echo json_encode(array("message" => "Gagal Menyimpan!", "status" => "error"));
        }
    } else {
        http_response_code(405);
        echo json_encode(array("message" => "Data Belum Lengkap!", "status" => "error"));
    }
} else {
    echo "database gagal";
}
?>