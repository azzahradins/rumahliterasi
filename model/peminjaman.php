<?php
include '../controller/connection.php';
$kb = $_POST['kb'];
$tp = $_POST['tp'];
$tk = $_POST['tk'];
$em = $_POST['email'];

$sql = "INSERT INTO peminjaman VALUES (null, '$kb', '$em', '$tp', '$tk')";

if ($conn->query($sql)) {
    echo "Insert Success";
    header('location: ../user/ListPeminjaman.php');
} else {
    echo "ERRPR";
}