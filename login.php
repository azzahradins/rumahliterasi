<?php
session_start();
if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == 1) {
        header("location:user/dashboard.php");
    } else {
        header("location:view-only/list_buku.php");
    }
} else {
    ?>

    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'">
    <meta name="theme-color" content="#311b92">

    <head>
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- CSS -->
        <link href="login.css" rel="stylesheet">
        <link href="grid-system.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">

        <!-- JS -->
        <script src="jquery.js"></script>
    </head>

    <body scroll="no">
        <div class="area">
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <form action="model/login.php" method="post">
            <div class="box">
                <div id="registration" class="registration-box">
                    <h2> Login Member </h2>
                    <label>Email</label> <br>
                    <input name="email" type="email" placeholder="Kode" required> <br>
                    <label>Password</label> <br>
                    <input name="pass" type="password" placeholder="Password" required> <br>
                    <button type="submit" class="button-default-reverse" style="color: black;">Login Member</button> <br>
                    <a href="register.php">Belum memiliki akun? Klik disini.</a>
                </div>
                <a href="index.php" class="bottom-back">Kembali Ke Halaman Awal</a>
                <?php
                if (isset($_SESSION["error"])) {
                    $error = $_SESSION["error"];
                    ?>
                    <div class="alert-danger alert-box container">
                        <i class="fas fa-exclamation-circle" style="font-size: 1.5em"></i>
                        <p> Login Gagal </p>
                        <p> Cek Kembali Email dan Password </p>
                    </div>
                <?php
                } else if (isset($_SESSION["detail_buku"])) {
                ?>
                    <div class="alert-danger alert-box container">
                        <i class="fas fa-exclamation-circle" style="font-size: 1.5em"></i>
                        <p> Login terlebih dahulu </p>
                        <p> sebelum melihat detail buku </p>
                    </div>
                <?php
                };
                ?>
            </div>
        </form>
    </body>

    </html>
<?php
}
unset($_SESSION["error"]);
unset($_SESSION["detail_buku"]);
?>