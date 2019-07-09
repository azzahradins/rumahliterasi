<?php
include '../controller/connection.php';
$email  = $_POST['email'];
$nama = $_POST['nama'];
$pass = $_POST['pass'];
$alamat = $_POST['alamat'];
$sql = "INSERT INTO user(email, namaLengkap, password, alamat)
VALUES ('$email', '$nama', '$pass' , '$alamat')";

if ($conn->query($sql) === TRUE) {
    header("location: ../login.php");
    echo "Pendaftaran Berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>