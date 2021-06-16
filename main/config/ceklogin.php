<?php

include('conn.php');
header("Access-Control-Allow-Origin: *");
header("Content-type", "application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$response = array();

if (isset($_POST['username']) && isset($_POST['passwd'])) {
    $user = $_POST['username'];
    $pass = $_POST['passwd'];
    $sql = "SELECT * FROM logins WHERE username='$user' AND passwd='$pass'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['username'] = $row['username'];
            $response[$i]['passwd'] = $row['passwd'];
        }
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "not found data!"));
    }
} else {
    http_response_code(404);
    echo json_encode(array("message" => "not found data!"));
}
