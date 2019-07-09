<?php
include '../template/sidebar.php';
?>
<title> Data Peminjaman | Admin </title>
<main>
    <?php
    include '../template/header.php';
    if (!isset($_SESSION["name"])) {
        header("location: ../index.php");
    }
    ?>
    <link href="../user/user.css" rel="stylesheet">
    <link href="../user/katalog.css" rel="stylesheet">
    <div class="container dashboardCatalog">
        <h2 style="grid-column: 1/span 2; margin-bottom: 10px;"> Data Peminjaman Buku </h2>
        <label>
            <input type="text" name="cari" id="cari" placeholder="Cari Kode Peminjam">
        </label>
        <a id="add_book" href="peminjaman.php" style="text-align: right; font-size: 12px;">
            <i class="fas fa-plus"></i> Tambah Peminjam Buku
        </a>
        <div id="result"></div>
    </div>
</main>
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "../controller/datapeminjaman.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
        $('#cari').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>

</html>