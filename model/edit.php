<?php
include '../controller/connection.php';

$kode = $_GET['kode'];
$nama_buku = $_POST["nb"];
$sinopsis = $_POST["s"];
$jum_hal = $_POST["jh"];
$stok = $_POST["st"];

if(($_FILES['image']['size']) > 2){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152) {
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true) {
       move_uploaded_file($file_tmp,"../uploads/". $file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
    $sql = "UPDATE buku SET nama_buku='$nama_buku', jumlah_buku='$stok' , cover_buku='$file_name', sinopsis_buku='$sinopsis', jumlah_halaman='$jum_hal' WHERE kode_buku='$kode'";
}else{
    $sql = "UPDATE buku SET nama_buku='$nama_buku', jumlah_buku='$stok', sinopsis_buku='$sinopsis', jumlah_halaman='$jum_hal' WHERE kode_buku='$kode'";
}

if($conn->query($sql)){
    echo "Update Success";
    header('location: ../user/katalog.php');
}else{
    echo "Error";
    var_dump($conn->query($sql));
}
