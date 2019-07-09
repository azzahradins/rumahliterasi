<?php
include '../controller/connection.php';
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT * FROM buku 
  WHERE nama_buku LIKE '%" . $search . "%'";
} else {
    $query = "
  SELECT * FROM buku ORDER BY kode_buku ASC
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo"
        <div id=\"book-list\" class=\"container\">
        <a href=\"../view-only/detail_buku.php?id=".$row['kode_buku']."\" style=\"color: black;\">
        <img src=\"../uploads/".$row['cover_buku']."\" style=\"grid-row: 1; width: 140px; height: 200px;\">
        <h3 style=\"grid-row: 2;\">". $row['nama_buku'] ."</h3>";
        echo "</a></div>";
        }
    echo $output;
} else {
    echo "</table> <br> ";
    echo "Data Tidak Ditemukan !";
}
