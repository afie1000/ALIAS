<!DOCTYPE html>
<html>

<head>
    <title>ALIAS - Pencarian Kriminalitas</title>
    <link a href="css/adm_hasil.css" rel="stylesheet">
</head>

<body>
    <div class="logo">
        <a href="adm_home.php"><img src="css/Assets/Logos/LogoALIAS.png"></a>
    </div>
    <div class="pencarian">
        <p>Ketikkan Jenis Kriminalitas, Nama Pelaku, atau Tempat Kejadian Kriminal</p>
        <form>
            <input type="text" placeholder="Pencarian....">
            <input type="submit" value="Cari!">
        </form>
    </div>
    <div class="tambah">
        <p>Klik disini untuk menambahkan data baru</p>
        <a href="inputData.php"><input type="submit" value="Tambah"></a>
    </div>
    <table class="dataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kasus</th>
                <th>Nama Pelaku</th>
                <th>Jenis Kasus</th>
                <th>TKP</th>
                <th>Detail</th>
            </tr>
        </thead>
    </table>
</body>

</html>