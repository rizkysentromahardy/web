<?php
include('conn.php');

header("Access-Control-Allow-Origin: *");
header("Content-type", "application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$sql = "SELECT * FROM lapor";
$result = mysqli_query($koneksi, $sql);
if ($result) {
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        //     $item[] = array(
        //         'nama' => $row["nama_lapor"],
        //     );
        $response[$i]['id'] = $row['id_lapor'];
        $response[$i]['nama'] = $row['nama_lapor'];
        $response[$i]['alamat'] = $row['alamat_lapor'];
        $response[$i]['detail'] = $row['detail_lapor'];
        $response[$i]['foto'] = $row['foto_lapor'];
        $response[$i]['jenis'] = $row['jenis_lapor'];
        $response[$i]['nomer'] = $row['nomer_tlp'];
        $response[$i]['tiket'] = $row['tiket_lapor'];
        $response[$i]['tanggal'] = $row['tanggal_lapor'];
        $i++;
    }
    // $response = array(
    //     'status' => 'OK',
    //     'data' => $item
    // );
    http_response_code(200);
    echo json_encode(array(
        'data' => $response,
        'status' => 'OK',
    ));
} else {
    http_response_code(404);
    echo json_encode(array("message" => "not found data!"));
}
