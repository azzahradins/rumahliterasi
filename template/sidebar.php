<link rel="stylesheet" href="../template/sidebar.css">
<div class="sidenav">
    <a href="#about">
        <?php
        include '../controller/connection.php';
        if (!isset($_SESSION["name"])) {
            header("location: ../index.php");
        }if($_SESSION["level"] != 1){
            header("location: ../view-only/list_buku.php");
        }echo ($_SESSION["name"]);
        ?>
    </a>
    <hr>
    <a href="../user/dashboard.php">Dashboard</a>
    <a href="../user/katalog.php">Katalog Buku</a>
    <a href="../user/listpeminjaman.php">Peminjaman</a>
    <a href="../user/listpengembalian.php">Pengembalian</a>
    <a href="../model/logout.php">Logout</a>
</div>