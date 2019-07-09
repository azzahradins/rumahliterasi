<main>
    <?php
    include '../template/header.php';
    include '../template/sidebar_user.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM buku WHERE kode_buku = '$id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if(!isset($_SESSION['level'])){
        header("location: ../login.php?id=$id");
        $_SESSION["detail_buku"]=1;
    }else{
    ?>
    <link href="../user/user.css" rel="stylesheet">
    <link href="../view-only/detail.css" rel="stylesheet">
    <style>
    </style>
    <div class="container dashboardCatalog">
        <img src="../uploads/<?php echo $row['cover_buku']?>">
        <div>
        <h2 style="grid-column: 2/span 2;"> <?php echo $row['nama_buku']; ?></h2>
        <hr>
        </div>

        <div>
        <p> <b> Sinopsis Buku </b> : <br> <?php echo $row['sinopsis_buku']?> </p>
        </div>

        <div style="margin: 5px 0px;" >
        <p> <b> Penerbit Buku </b> : <br> <?php echo $row['penerbit']?> </p>
        </div>

        <div style="margin: 5px 0px;" >
        <p> <b> Jumlah Buku </b> : <br> <?php echo $row['jumlah_buku']?> </p>
        </div>

        <div style="margin: 5px 0px;" >
        <p> <b> Jumlah Halaman </b> : <br> <?php echo $row['jumlah_halaman']?> </p>
        </div>
        
        <div style="margin: 5px 0px; grid-row: 7; grid-column: 2;" >
        <?php
            if($row['jumlah_buku'] > 0){
        ?>
        <a class="button-primary">Buku Ini Tersedia</a>
        <?php
            }else{
        ?>
        <a class="button-danger">Buku Ini Tidak Tersedia</a>
        <?php
            }
        ?>
        </div>
    </div>
</main>
<?php
    }
?>
</html>