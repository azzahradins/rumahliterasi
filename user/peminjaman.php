<?php
include '../template/sidebar.php';
?>
<?php
$sql = "SELECT * FROM buku WHERE jumlah_buku > 0";
$result = $conn->query($sql);
?>
<title> Tambah Peminjaman | Admin </title>
<main>

    <?php
    include '../template/header.php';
    ?>
    <link href="user.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <link href="form-peminjaman.css" rel="stylesheet">
    <!-- <script>
        function rohan(value) {
            $('#kode').val(value);
        }
    </script> -->
    <form action="../model/peminjaman.php" method="POST" enctype='multipart/form-data' style="margin-top: 10px;">
        <div id="form" class="container">
            <div style="grid-column: 1 / span 3; grid-row: 1; margin-bottom: 20px;">
                <h2 style="padding: 10px 0px;">Pendataan Peminjaman</h2>
                <hr>
            </div>
            <label id="cover">Cover Buku
                <div style="height: 400px;">
                    <img id="gambar" src="../fff.png" style="width: 200px; object-fit: cover;">
                </div>
            </label>
            <label id="kb">Nama Buku <br>
                <select id="nama" name="kb" required>
                    <option value="">Pilih Buku</option>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['kode_buku'] . "'>" . $row['nama_buku'] . "</option> \n";
                    } ?>
                </select>
                <?php
                ?>
            </label>
            <div id="result" style="grid-column: 2;"></div>

            <label id="tp">Tanggal Pinjam<br>
                <input type="date" placeholder="Tanggal Pinjam" name="tp" min="<?php echo date('Y-m-d'); ?>" required>
            </label>
            <div>
            <label id="tk">Tanggal Kembali<br>
                <input type="date" placeholder="Tanggal Kembali" name="tk" min="<?php echo date('Y-m-d'); ?>" required>
            </label>
            <label id="em">Email<br>
                <input type="text" placeholder="Email" name="email" required autocomplete="off">
            </label>
            </div>

            <div id="button" style="grid-column: 2;">
                <button type="submit" class="button-primary">Insert Book</button>
                <button type="reset" class="button-danger">Reset</button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            
            load_data();
            function load_data(query) {
                $.ajax({
                    url: "../controller/peminjaman.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#nama').change(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });
    </script>
</main>