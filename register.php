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
    <form action="model/register.php" method="POST">
        <div class="box">
            <div id="registration" class="registration-box">
                <h2> Pendaftaran Member </h2>
                <label>Email</label> <br>
                <input name="email" type="email" placeholder="Email" required> <br>
                <label>Nama Lengkap</label> <br>
                <input name="nama" type="text" placeholder="Email" required> <br>
                <label>Password</label> <br>
                <input name="pass" type="password" placeholder="Password" required> <br>
                <label>Jenis Kelamin</label> <br>
                <SELECT>
                    <option> Laki-laki </option>
                    <option> Perempuan </option>
                </SELECT> <br> <br>
                <label>Alamat</label> <br>
                <textarea name="alamat" placeholder="Password" required> </textarea> <br>
                <button type="submit" class="button-default-reverse" style="color: black;">Buat Akun Member</button> <br>
                <a href="login.php">Sudah memiliki akun? Klik disini.</a>
            </div>
            <a href="index.php" class="bottom-back">Kembali Ke Beranda</a>
        </div>
    </form>
</body>

</html>