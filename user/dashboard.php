<?php
include '../template/sidebar.php';
$sql = "SELECT * FROM buku ORDER BY dikunjungi DESC LIMIT 8";
$result = $conn->query($sql);
?>
<main>
    <title> Dashboard | Admin </title>
    <?php
    include '../template/header.php';
    ?>
    <link href="user.css" rel="stylesheet">
    <link href="dashboardUser.css" rel="stylesheet">
    <div class="container dashboardCatalog">
        <h2>Dashboard Admin</h2>
        <div id="catalog">
            <p>Koleksi buku paling banyak dicari</p>
            <div id="location" class="container cardContainer">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="card">
                            <?php
                            if ($row['cover_buku'] != null) {
                                ?>
                                <img src="../uploads/<?php echo $row['cover_buku'] ?>"><br>
                            <?php
                            } else {
                            ?>
                                <img src="../fff.png"><br>
                            <?php
                            }
                            ?>
                            <p><?php echo $row['nama_buku'] ?></p>
                            <p style="font-size: 10px;"><?php echo $row['dikunjungi'] ?> views</p>
                        </div>
                    <?php
                }
            }
            ?>
            </div>
            <a href="katalog.php">Lihat Semua Buku</a>
        </div>
        </div>
    </div>
    </div>
</main>

</html>