<?php
include '../controller/connection.php';
echo "<table width=\"100%\">
    <tr>
        <th id=\"kode_buku\">Kode Peminjaman</th>
        <th id=\"kode_buku\">Kode Buku</th>
        <th id=\"nama_buku\">Nama Buku</th>
        <th> Nama Peminjam </th>
        <th class=\"tgl_table\">Tanggal Pinjam</th>
        <th class=\"tgl_table\">Tangal Kembali</th>
        <th width='5%'>Pengembalian</th>
    </tr>";
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT p.idPeminjaman, p.kodeBuku, b.nama_buku, u.namaLengkap, p.tanggalPinjam, p.tanggalKembali FROM peminjaman p 
    INNER JOIN buku b 
        ON b.kode_buku = p.kodeBuku
    INNER JOIN user u
        ON p.email = u.email
    LEFT JOIN pengembalian pg
        ON p.idPeminjaman = pg.idPeminjaman
    WHERE p.idPeminjaman LIKE '%" . $search . "%' AND pg.idPeminjaman IS NULL";
} else {
    $query = "SELECT p.idPeminjaman, p.kodeBuku, b.nama_buku, u.namaLengkap, p.tanggalPinjam, p.tanggalKembali FROM peminjaman p 
    INNER JOIN buku b 
        ON b.kode_buku = p.kodeBuku
    INNER JOIN user u
        ON p.email = u.email
    LEFT JOIN pengembalian pg
        ON p.idPeminjaman = pg.idPeminjaman
    WHERE pg.idPeminjaman IS NULL
        ";
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
            <td class=\"tgl_table\">" . $row['tanggalPinjam'] . "</td>
            <td class=\"tgl_table\">" . $row['tanggalKembali'] . "</td>
            <td><a href=\"pengembalian.php?kode=$row[idPeminjaman]\">
            <i class=\"fas fa-pencil-alt\"></i> Pengembalian </a></td>
            </tr>";
    }
    echo $output;
} else {
    echo "</table> <br> ";
    echo "Data Tidak Ditemukan !";
}
