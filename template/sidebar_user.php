<?php
    include '../controller/connection.php';
?>
<link rel="stylesheet" href="../template/sidebar.css">
<div class="sidenav">
    <?php
    if (!isset($_SESSION['level'])) {
    ?>
    <a href="../index.php">Halaman Utama</a>
    <a href="../view-only/list_buku.php">Katalog Buku</a>
    <?php
    }else{
    ?>
    <a href="../view-only/list_buku.php">Katalog Buku</a>
    <a href="../model/logout.php">Logout</a>
    <?php
    }
?>
</div>