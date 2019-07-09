<?php
include '../controller/connection.php';

$email = $_POST['email'];
$pass = trim($_POST['pass']);

$id = $_GET["id"];
$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$name = $result->fetch_object();
$error = "username/password incorrect";

if ($result->num_rows > 0) {
    // $_SESSION["name"] = $row['namaLengkap'];
    $_SESSION["name"] = "UWU";
    $_SESSION["level"] = $row['level'];
    if($row['level'] == 1){
        header("location: ../user/dashboard.php");
    }else{
        header("location: ../view-only/list_buku.php");
    }
}else{
    $_SESSION["error"] = $error;
    header("location: ../login.php");
}

?>