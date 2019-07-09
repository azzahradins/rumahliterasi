<?php
include '../controller/connection.php';

$kode = $_GET['kode'];

$sql = "DELETE FROM buku WHERE kode_buku='$kode'";

if($conn->query($sql)){
    echo "Delete Success";
    header('location: ../user/katalog.php');
}else{
    echo "Error";
    var_dump($conn->query($sql));
}
?>