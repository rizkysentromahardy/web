<?php
// use \Firebase\JWT\JWT;
// include('conn.php');

// $jwt = JWT::encode('test', 'secret key');
// echo $jwt;

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $response = array();
// $kode = $_GET['kode'];
// // echo $kode;
// if ($koneksi && $kode) {
//     $sql = 'SELECT 
//     m.id_lapor id, 
//     m.nama_lapor nama,
//             m.tiket_lapor,
//             c.nama_sts,
//             c.date
            
// FROM
//     lapor m
// INNER JOIN logs c ON c.id_lapor = m.id_lapor
// WHERE m.id_lapor = ' . $kode;
//     $result = mysqli_query($koneksi, $sql);
//     if ($result) {
//         $i = 0;
//         while ($row = mysqli_fetch_assoc($result)) {
//             $response[$i]['id'] = $row['id'];
//             $response[$i]['nama'] = $row['nama_sts'];
//             $response[$i]['date'] = $row['date'];
//             $i++;
//         }
//         http_response_code(200);
//         echo json_encode($response, JSON_PRETTY_PRINT);
//     }
// } else {
//     http_response_code(404);
//     echo json_encode(array("message" => "not found data!"));
// }
date_default_timezone_set("Asia/Jakarta");
$date=date("Y-m-d H:i:s");
echo $date;
