<?php
include '../controller/connection.php';
echo "<table width=\"100%\">
    <tr>
        <th id=\"kode_buku\">Kode Peminjaman</th>
        <th id=\"kode_buku\">Kode Buku</th>
        <th id=\"nama_buku\">Nama Buku</th>
        <th> Nama Peminjam </th>
        <th class=\"tgl_table\">Tanggal Kembali</th>
        <th class=\"tgl_table\">Tangal Buku Kembali</th>
        <th width='5%'>Denda</th>
    </tr>";
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT p.idPeminjaman, p.kodeBuku, b.nama_buku, u.namaLengkap, p.tanggalKembali, pg.tglMasuk, pg.denda 
    FROM pengembalian pg
    INNER JOIN peminjaman p 
        ON pg.idPeminjaman = p.idPeminjaman
    INNER JOIN user u
        ON p.email = u.email
    INNER JOIN buku b
    	ON b.kode_buku = p.kodeBuku
    WHERE p.idPeminjaman LIKE '%" . $search . "%' AND p.idPeminjaman IS NULL";
} else {
    $query = "SELECT p.idPeminjaman, p.kodeBuku, b.nama_buku, u.namaLengkap, p.tanggalKembali, pg.tglMasuk, pg.denda 
    FROM pengembalian pg
    INNER JOIN peminjaman p 
        ON pg.idPeminjaman = p.idPeminjaman
    INNER JOIN user u
        ON p.email = u.email
    INNER JOIN buku b
    	ON b.kode_buku = p.kodeBuku";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo
            "<tr>
            <td>" . $row['idPeminjaman'] . "</td>
            <td>" . $row['kodeBuku'] . "</td>
            <td>" . $row['nama_buku'] . "</td>
            <td>" . $row['namaLengkap'] . "</td>
            <td class=\"tgl_table\">" . $row['tanggalKembali'] . "</td>
            <td class=\"tgl_table\">" . $row['tglMasuk'] . "</td>
            <td>" . $row['denda'] . "</td>
            </tr>";
    }
    echo $output;
} else {
    echo "</table> <br> ";
    echo "Data Tidak Ditemukan !";
}
