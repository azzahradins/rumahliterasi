<?php
include '../controller/connection.php';
if (!isset($_SESSION["name"])) {
    echo "<tr>
    <th id=\"kode_buku\">Kode</th>
    <th id=\"nama_buku\">Nama Buku</th>
    <th id=\"stok\">Stok</th>
    <th id=\"sinopsis\">Sinopsis</th>
    <th id=\"penerbit\">Penerbit</th>
    <th id=\"jumlah_halaman\">Jumlah Halaman</th>
    </tr>";
} else {
    echo "<table>
    <tr>
        <th id=\"kode_buku\">Kode</th>
        <th id=\"nama_buku\">Nama Buku</th>
        <th id=\"stok\">Stok</th>
        <th id=\"sinopsis\">Sinopsis</th>
        <th id=\"penerbit\">Penerbit</th>
        <th id=\"jumlah_halaman\">Jumlah Halaman</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>";
}
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
        if (!isset($_SESSION["name"])) {
            echo
                "<tr>
            <td>" . $row['kode_buku'] . "</td>
            <td>" . $row['nama_buku'] . "</td>
            <td>" . $row['jumlah_buku'] . "</td>
            <td>" . $row['sinopsis_buku'] . "</td>
            <td>" . $row['penerbit'] . "</td>
            <td>" . $row['jumlah_halaman'] . "</td>";
        } else {
            echo
                "<tr>
            <td>" . $row['kode_buku'] . "</td>
            <td>" . $row['nama_buku'] . "</td>
            <td>" . $row['jumlah_buku'] . "</td>
            <td>" . $row['sinopsis_buku'] . "</td>
            <td>" . $row['penerbit'] . "</td>
            <td>" . $row['jumlah_halaman'] . "</td>
            <td><a href=\"edit.php?kode=$row[kode_buku]\">
            <i class=\"fas fa-pencil-alt\"></i> </a> </td>
            <td><a href=\"../model/delete.php?kode=$row[kode_buku]\">
            <i class=\"fas fa-trash\"></i> </a> </td>
            </tr>";
        }
    }
    echo $output;
} else {
    echo "</table> <br> ";
    echo "Data Tidak Ditemukan !";
}
