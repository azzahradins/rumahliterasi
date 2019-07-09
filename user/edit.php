<?php
include '../template/sidebar.php';
$kode = $_GET['kode'];
$sql = "SELECT * FROM buku WHERE kode_buku='$kode'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<title><?php echo $row['nama_buku'] ?> | Edit Admin</title>
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
                    $('input[name=' + fieldName + ']').val(0);
                }
            });
        });
    </script>
    <link href="user.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <html>
    <?php
    echo "<form action=\"../model/edit.php?kode=$kode\" method=\"POST\" enctype='multipart/form-data'>";
    ?>
    <div id="form" class="container">
        <div style="grid-column: 1 / span 3; grid-row: 1; margin-bottom: 20px;">
            <h2 style="padding: 10px 0px;">Ubah Buku <?php echo $row['nama_buku']; ?></h2>
            <hr>
        </div>

        <label id="cover">Cover Buku
            <?php
            if ($row['cover_buku'] == null) {
                ?>
                <div style="background : black; width: 100%; height: 300px;"> </div>
            <?php
            }else{    
            ?>
                <div style="width: 100%; height: 300px; background: url('../uploads/<?php echo $row['cover_buku']?>')"> </div>
            <?php
            }
            ?>
            <input type="file" name="image" style="border-radius: 0px;">
        </label>

        <label id="nb">Nama Buku <br>
            <input type="text" placeholder="Nama Buku" name="nb" required value="<?php echo $row['nama_buku']; ?>">

        </label>

        <label id="st">Stok <br>
            <div class="form-group">
                <input type='text' required name='st' class='qty' value="<?php echo $row['jumlah_buku']; ?>"><input type='button' value='+' class='qtyplus' field='st'><input type='button' value='-' class='qtyminus' field='st'>
            </div>
        </label>

        <label id="jh">Jumlah Halaman <br>
            <input type="text" placeholder="Jumlah Halaman" name="jh" value="<?php echo $row['jumlah_halaman']; ?>" required>
        </label>

        <label id="s">Sinopsis Buku <br>
            <textarea rows="4" cols="50" name='s' style="width: 100%; height:207px; margin-bottom: 13px;" placeholder="Sinopsis"><?php echo $row['sinopsis_buku']; ?></textarea>
        </label>

        <div>
            <button type="submit" class="button-primary">Ubah Informasi Buku</button>
        </div>
    </div>
    </form>

    </html>
</main>