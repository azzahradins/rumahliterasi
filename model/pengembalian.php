<?php
include '../controller/connection.php';
$id = $_POST['idPeminjaman'];
$thini = $_POST['thini'];
$denda = $_POST['denda'];

$sql = "INSERT INTO pengembalian VALUES (null, '$id', '$thini', '$denda')";
if ($conn->query($sql)){
    echo "Insert Success";
    header('location: ../user/ListPeminjaman.php');
} else {
    echo "ERRPR";
}