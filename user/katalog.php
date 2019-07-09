<?php
include '../template/sidebar.php';
?>
<main>
    <title>Katalog | Admin</title>
    <?php
    include '../template/header.php';
    if (!isset($_SESSION["name"])) {
        header("location: ../index.php");
    }
    ?>
    <link href="../user/user.css" rel="stylesheet">
    <link href="../user/katalog.css" rel="stylesheet">
    <div class="container dashboardCatalog">
        <label> Cari Nama Buku
            <input type="text" name="cari" id="cari" placeholder="Cari Nama Buku">
        </label>
        <a id="add_book" href="insert.php" style="text-align: right; font-size: 12px;">
            <i class="fas fa-plus"></i> Tambah Katalog Buku
        </a>
        <div id="result"></div>
    </div>
</main>
<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "../controller/databuku.php",
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