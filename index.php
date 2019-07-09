<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'">
<meta name="theme-color" content="#311b92">
<?php
include 'controller/connection.php';
if (isset($_SESSION["name"])) {
    header("location: user/dashboard.php");
} else {
?>

<head>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSS -->
    <link href="grid-system.css" rel="stylesheet">
    <link href="landingpage.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">

    <!-- JS -->

</head>

<body>
    <main>
        <div id="landing-page">
            <div class="container">
                <h1 class="title"> Rumah Literasi </h1>
                <div id="menu-landing" class="menu">
                    <a href="#program" class="header-menu">Program</a>
                    <a href="#SubTitle2" class="header-menu">Lokasi Rumah Baca</a>
                    <a href="login.php" class="button-primary header-menu">Login</a>
                </div>
            </div>
            <div class="container greetings">
                <div id="greetings">
                    <h2>Pantang Bertanya Sebelum Membaca</h2>
                    <hr>
                    <p>Mari bersatu tingkatkan minat membaca warga Indonesia,
                        <br> dengan menjadi salah satu bagian dari Rumah Literasi.
                    </p>
                    <div id="join">
                        <a href="view-only/list_buku.php" class="button-default"> Mari Membaca Buku </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="article">
            <div id="SubTitle1" class="container subTitle">
                <h2>Keadaan Rumah Literasi</h2>
            </div>
            <div id="facts" class="container cardContainer alternate-container">
                <div id="card1" class="card">
                    <i class="fas fa-home"></i> <br>
                    <span class="count">5</span>
                    <p>Rumah Baca</p>
                </div>
                <div id="card2" class="card">
                    <i class="fas fa-book-open"></i> <br>
                    <?php
                        $sql = "SELECT count(*) FROM buku ORDER BY kode_buku";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<span class=\"count\">".$row['count(*)']."</span>";
                    ?>
                    <p>Buku Terdaftar</p>
                </div>
                <div id="card3" class="card">
                    <i class="fas fa-hand-holding-heart"></i> <br>
                    <?php
                        $sql = "SELECT count(*) FROM user ORDER BY email";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<span class=\"count\">".$row['count(*)']."</span>";
                    ?>
                    <p>Pengembang Rumah Literasi</p>
                </div>
            </div>
            <div id="program" class="container">
                <div id="caption">
                    <h2>Program dan Kegiatan</h2>
                    <p>Serangkaian program dan kegiatan pada rumah literasi di seluruh Indonesia
                        dengan tujuan meningkatkan tingkat pendidikan dan literasi. Program ini diharapkan
                        dapat menghasilkan generasi penerus bangsa yang lebih berkualitas dan berwawasan
                        terbuka.
                    </p>
                </div>
                <form method="post" action="model/register.php">
                    <div id="registration" class="registration-box">
                        <h2> Registerasi Member </h2>
                        <label>Email</label> <br>
                        <input name="email" type="text" placeholder="Email" srequired> <br>
                        <label>Password</label> <br>
                        <input name="pass" type="password" placeholder="Password" srequired> <br>
                        <label>Konfirmasi Password</label> <br>
                        <input type="password" placeholder="Konfirmasi Password" srequired> <br>
                        <button type="submit" class="button-default" style="color : black;">Mendaftar Literasi</button> <br>
                        <a href="login.php">Sudah memiliki akun? Klik disini.</a>
                    </div>
                    <form>
            </div>
            <div id="SubTitle2" class="container subTitle">
                <h2>Lokasi Rumah Literasi</h2>
            </div>
            <div id="location" class="container cardContainer">
                <div id="card2" class="card">
                    <img src="https://dummyimage.com/600x400/000/fff.png"><br>
                    <p>Rumah Baca Bali</p>
                    <p>Jl. Persatuan Pelajar No.92B</p>
                    <a href="#" class="button-primary">Baca Lebih Lanjut</a>
                </div>
                <div id="card3" class="card">
                    <img src="https://dummyimage.com/600x400/000/fff.png"><br>
                    <p>Rumah Baca Lombok</p>
                    <p>Jl. Persatuan Pelajar No.92B</p>
                    <a href="#" class="button-primary">Baca Lebih Lanjut</a>
                </div>
                <div id="card4" class="card">
                    <img src="https://dummyimage.com/600x400/000/fff.png"><br>
                    <p>Rumah Baca Depok</p>
                    <p>Jl. Persatuan Pelajar No.92B</p>
                    <a href="#" class="button-primary">Baca Lebih Lanjut</a>
                </div>
                <div id="card5" class="card">
                    <img src="https://dummyimage.com/600x400/000/fff.png"><br>
                    <p>Rumah Baca Jambi</p>
                    <p>Jl. Persatuan Pelajar No.92B</p>
                    <a href="#" class="button-primary">Baca Lebih Lanjut</a>
                </div>
                <div id="card6" class="card">
                    <img src="https://dummyimage.com/600x400/000/fff.png"><br>
                    <p>Rumah Baca Keraton</p>
                    <p>Jl. Persatuan Pelajar No.92B</p>
                    <a href="#" class="button-primary">Baca Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="container containerFooter">
        <div id="navigation">
            <h4>Navigation</h4>
            <a href="#">Beranda</a> <br>
            <a href="#location">Lokasi Rumah Baca</a> <br>
            <a href="#program">Program</a> <br>
            <a href="register.php">Registrasi Pengguna</a> <br>
            <a href="login.php">Masuk Sebagai Pengguna</a>
        </div>
        <div id="marking">
            <h4>Our social media</h4>
            <a href="#"><i class="fas fa-hashtag"></i> RumahLiterasi </a> <br>
            <a href="#"><i class="fab fa-facebook-f"></i> facebook.com/rumahliterasi </a> <br>
            <a href="#"><i class="fab fa-twitter"></i> twitter.com/rumahliterasi </a> <br>
            <a href="#"><i class="fab fa-instagram"></i> instagram.com/rumahliterasi </a>
        </div>
    </footer>
</body>
<script>
    window.onscroll = function() {
        myFunction()
    };

    // Get the header
    var header = document.getElementById("header");
    var navbar = document.getElementById("navbar");
    var landing = document.getElementById("article");

    // Get the offset position of the navbar
    var sticky = landing.offsetTop;
    window.onresize = function() {
        sticky = landing.offsetTop;
        console.log(landing.offsetTop);
    }

    // Add the sticky class to the header when you reach its scroll position. 
    // Remove "sticky" when you leave the scroll position
    $(document).ready(function() {
        $("#header").css("display", "none");
    });

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            $("#header").fadeIn();
        } else {
            $("#header").fadeOut();
        }
    }

    //counting
    $('.count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
<?php
 }
?>
</html>