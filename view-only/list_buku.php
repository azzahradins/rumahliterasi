<main>
    <?php
    include '../template/header.php';
    include '../template/sidebar_user.php';
    ?>
    <link href="../user/user.css" rel="stylesheet">
    <link href="../user/katalog.css" rel="stylesheet">
    <link href="../view-only/katalog.css" rel="stylesheet">
    <style>
    </style>
    <div class="container dashboardCatalog">
        <label> Cari Nama Buku
            <input type="text" name="cari" id="cari" placeholder="Cari Nama Buku">
        </label>
        <div id="list" >
            <div id="result"  class="container list-book"> </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "../controller/dataviewbuku.php",
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