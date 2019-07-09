<?php
include '../template/sidebar.php';
?>
<?php
$id = $_GET['kode'];
$sql = "SELECT p.idPeminjaman, p.kodeBuku, b.jumlah_halaman, b.nama_buku, p.email, p.tanggalPinjam, p.tanggalKembali, 
        DATEDIFF(CURRENT_DATE, p.tanggalKembali) AS telat
        FROM peminjaman p 
        INNER JOIN buku b
        ON p.kodeBuku = b.kode_buku WHERE idPeminjaman='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
if($row['telat'] > 0){
    $denda = $row['telat'] * 2000;
}else{
    $denda = 0;
}
?>
<title> Pendataan Buku Kembali | Admin </title>
<main>

    <?php
    include '../template/header.php';
    ?>
    <link href="user.css" rel="stylesheet">
    <link href="form.css" rel="stylesheet">
    <link href="form-pengembalian.css" rel="stylesheet">

    <form action="../model/pengembalian.php" method="POST" style="margin-top: 10px;">
        <div id="form" class="container">
            <div style="grid-column: 1 / span 3; grid-row: 1; margin-bottom: 20px;">
                <h2 style="padding: 10px 0px;"> Pendataan Buku Kembali </h2>
                <hr>
            </div>

            <input type="text" style="display: none;" name="idPeminjaman" value="<?php echo $id ?>">

            <label id="nb">Nama Buku <br>
                <input type="text" class="input-disable" placeholder="Kode Buku" readonly="readonly" name="nb" id="kode" value="<?php echo $row['nama_buku'] ?>">
            </label>

            <label id="kb">Kode Buku <br>
                <input type="text" class="input-disable" placeholder="Kode Buku" readonly="readonly" name="kb" id="kode" value="<?php echo $row['kodeBuku'] ?>">
            </label>

            <label id="jh">Jumlah Halaman <br>
                <input type="text" class="input-disable" placeholder="Jumlah Halaman" readonly="readonly" name="jh" id="jumlah" value="<?php echo $row['jumlah_halaman'] ?>">
            </label>

            <label id="tp">Tanggal Pinjam<br>
                <input type="date" placeholder="Tanggal Pinjam" name="tp" value="<?php echo $row['tanggalPinjam'] ?>" readonly="readonly">
            </label>

            <label id="tk">Tanggal Kembali<br>
                <input type="date" placeholder="Tanggal Kembali" name="tk" value="<?php echo $row['tanggalKembali'] ?>" readonly="readonly">
            </label>

            <label id="thi">Tanggal Hari Ini<br>
                <input type="date" placeholder="Tanggal Kembali" name="thini" value="<?php echo date('Y-m-d'); ?>">
            </label>
            <label id="den">Denda<br>
                <input type="text" placeholder="Denda" name="denda"  value="<?php echo  $denda ?>">
            </label>

            <label id="em">Email<br>
                <input type="text" class="input-disable" placeholder="Email" name="email" autocomplete="off" value="<?php echo $row['email'] ?>">
            </label>

            <div id="button">
                <button type="submit" class="button-primary">Buku Telah Kembali</button>
                <button type="reset" class="button-danger">Reset</button>
            </div>
        </div>
    </form>
</main>