<?php
include('conn.php');
$response= array();
if($koneksi){
    $sql="select * from lapor";
    $result= mysqli_query($koneksi,$sql);
    if($result){
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['tiket_lapor'];
            $response[$i]['nama'] = $row['nama_lapor'];
            $response[$i]['alamat'] = $row['alamat_lapor'];
            $response[$i]['detail'] = $row['detail_lapor'];
            $response[$i]['foto'] = $row['foto_lapor'];
            $response[$i]['nomer'] = $row['nomer_tlp'];
            $response[$i]['tanggal'] = $row['tanggal_lapor'];
            $response[$i]['jenis'] = $row['jenis_lapor'];
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }


}
else{
    echo "database gagal";
}

?>