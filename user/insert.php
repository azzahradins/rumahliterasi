<?php
include '../template/sidebar.php';
?>
<title>Tambah Buku | Admin</title>
<main>
    <?php
    include '../template/header.php';
    ?>
    <script>
        jQuery(document).ready(function() {
            // This button will increment the value
            $('.qtyplus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If is not undefined
                if (!isNaN(currentVal)) {
                    // Increment
                    $('input[name=' + fieldName + ']').val(currentVal + 1);

                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(0);
                }
            });
            // This button will decrement the value till 0
            $(".qtyminus").click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                fieldName = $(this).attr('field');
                // Get its current value
                var currentVal = parseInt($('input[name=' + fieldName + ']').val());
                // If it isn't undefined or its greater than 0
                if (!isNaN(currentVal) && currentVal > 1) {
                    // Decrement one
                    $('input[name=' + fieldName + ']').val(currentVal - 1);
                } else {
                    // Otherwise put a 0 there
                    $('input[name=' + fieldName + ']').val(1);
                }
            });
        });
    </script>
    <link href="user.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <form action="../model/insert.php" method="POST" enctype='multipart/form-data' style="margin-top: 10px;">
        <div id="form" class="container">
            <div style="grid-column: 1 / span 3; grid-row: 1; margin-bottom: 20px;">
            <h2 style="padding: 10px 0px;">Masukan Buku Baru</h2>
            <hr>
            </div>
            <label id="cover">Cover Buku
                <div style="background : black; width: 100%; height: 300px;"> </div>
                <input type="file" name="image" style="border-radius: 0px;">
            </label>

            <label id="kb">Kode Buku <br>
                <input id="kode" type="text" placeholder="Kode Buku" name="kb" required>
            </label>

            <label id="nb">Nama Buku <br>
                <input type="text" placeholder="Nama Buku" name="nb" required>

            </label>

            <label id="st">Stok <br>
                <div class="form-group">
                    <input type='text' required name='st' class='qty' value="1"><input type='button' value='+' class='qtyplus' field='st'><input type='button' value='-' class='qtyminus' field='st'>
                </div>
            </label>

            <label id="jh">Jumlah Halaman <br>
                <input type="text" placeholder="Jumlah Halaman" name="jh" required>
            </label>

            <label id="s">Sinopsis Buku <br>
                <textarea rows="4" cols="50" name='s' style="width: 100%; height:207px; margin-bottom: 13px;" placeholder="Sinopsis"></textarea>
            </label>

            <label id="p">Penerbit <br>
                <input type="text" placeholder="Penerbit" name="p" required>
            </label>

            <div>
                <button type="submit" class="button-primary">Insert Book</button>
                <button type="reset" class="button-danger">Reset</button>
            </div>
            <?php
            if (isset($_SESSION['invalid'])) {
                ?>
                <div class="alert-danger alert-box container">
                    <i class="fas fa-exclamation-circle" style="font-size: 1.5em"></i>
                    <p></p>
                    <p>
                        Input Data Buku Salah!
                    </p>
                </div>
            <?php
        }
        unset($_SESSION['invalid']); ?>
        </div>
    </form>
</main>