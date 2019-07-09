<?php
include '../controller/connection.php';
echo "<label id=\"kb\">Kode Buku <br>
<input type=\"text\" class=\"input-disable\" placeholder=\"Kode Buku\" readonly=\"readonly\" name=\"kb\" id=\"kode\" value=\"\">
</label>

<label id=\"jh\">Jumlah Halaman <br>
<input type=\"text\" class=\"input-disable\" placeholder=\"Jumlah Halaman\" readonly=\"readonly\" name=\"jh\" id=\"jumlah\" value=\"\">
</label>

<label id=\"p\">Penerbit <br>
<input type=\"text\" class=\"input-disable\" placeholder=\"Penerbit\" readonly=\"readonly\" name=\"p\" id=\"penerbit\">
</label>";

$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT kode_buku, cover_buku, jumlah_halaman, penerbit FROM buku WHERE kode_buku='" . $search . "'";
} else {
    $query = "SELECT kode_buku, cover_buku, jumlah_halaman, penerbit FROM buku WHERE kode_buku='null'";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<script>
        $('#gambar').attr('src', '../uploads/".$row['cover_buku']."');
        $('#kode').val('".$row['kode_buku']."');
        $('#jumlah').val('".$row['jumlah_halaman']."');
        $('#penerbit').val('".$row['penerbit']."');
        </script>";
    }
    echo $output;
} else {
    echo "";
}
