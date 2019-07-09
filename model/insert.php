<?php
include '../controller/connection.php';
$kb = $_POST['kb'];
$nama = $_POST['nb'];
$stok = $_POST['st'];
$sinopsis = $_POST['s'];
$penerbit = $_POST['p'];
$jumhal = $_POST['jh'];

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $text = strtolower(end(explode('.',$_FILES['image']['name'])));
    $file_ext=$text;
    
    
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
    $sql = "INSERT INTO buku VALUES ('$kb', '$file_name', '$nama', '$stok', '$sinopsis', '$penerbit', '$jumhal', '0')";
 }else{
    $sql = "INSERT INTO buku VALUES ('$kb', null, '$nama', '$stok', '$sinopsis', '$penerbit', '$jumhal', '0')";
 }

if ($conn->query($sql)) {
    echo "Insert Success";
    header('location: ../user/katalog.php');
} else {
    echo "ERROR";
}