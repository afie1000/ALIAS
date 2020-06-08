<!DOCTYPE html>
<html>

<head>
    <title>ALIAS - Beranda</title>
    <link href="css/adm_home.css" rel="stylesheet">
</head>

<body>
   <?php
        session_start();
        //cek apakah yang mengakses halaman ini sudah login
        if(isset($_SESSION['username'])=="NULL")
        {
            echo '<script language="javascript"> alert("Anda harus login terlebih dahulu untuk mengakses halaman ini!"); document.location="../Alias/home.php"; </script>';
        }
        //else
        //{
            //echo '<script language="javascript">document.location="../Alias/adm_home.php";</script>';
        //}
    ?> 
    <div class="container">
        <div class="logo">
            <img src="css/Assets/Logos/ALIAS.png">
        </div>
        <div class="sapaan">
            <p>Selamat datang! Admin!</p>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="logout.php"><img src="css/Assets/Logos/LogoutLogo.png" class="pilihan"></a>
                </li>
                <li>
                    <a href="adm_pencarian.php"><img src="css/Assets/Logos/SearchLogo.png" class="pilihan"></a>
                </li>
                <li>
                    <a href="#"><img src="css/Assets/Logos/NewsLogo.png" class="pilihan"></a>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>