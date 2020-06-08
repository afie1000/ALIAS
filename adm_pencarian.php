<!DOCTYPE html>
<html>

<head>
    <title>ALIAS - Pencarian Kriminalitas</title>
    <link a href="css/adm_pencarian.css" rel="stylesheet">
</head>

<body>
    <?php
        session_start();
        //cek apakah yang mengakses halaman ini sudah login
        if(isset($_SESSION['nama'])=="NULL")
        {
            echo '<script language="javascript"> alert("Anda harus login terlebih dahulu untuk mengakses halaman ini!"); document.location="../Alias/home.php"; </script>';
        }
    ?> 
    <div class="logo">
        <a href="adm_home.php"><img src="css/Assets/Logos/LogoALIAS.png"></a>
    </div>
    <div class="tambah">
        <p>Klik disini untuk menambahkan data baru</p>
        <form class="pencarian" action="aksi_adm_pencarian.php" method="post">
            <ul>
                <li><input type="text" name="domisili" placeholder="domisili" required="required">
                <li><input type="text" name="jeniskejahatan" placeholder="jenis kejahatan" required="required">
                <li><input type="text" name="jeniskelamin" placeholder="jenis kelamin" required="required">
                <li><input type="text" name="kategorikejahatan" placeholder="kategori kejahatan" required="required">
                <li><input type="text" name="kejahatan" placeholder="kejahatan" required="required">
                <li><input type="text" name="nama" placeholder="nama" required="required">
                <li><input type="text" name="tempatkejadian" placeholder="tempat kejadian" required="required">
                <li><input type="text" name="umur" placeholder="umur" required="required">
                <li><input type="submit" name="tambah" value="Tambah">
            </ul>
        </form>
    </div>
</body>

</html>