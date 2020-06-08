<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device width">
    <title>ALIAS - Masuk</title>
    <link href="css/d_login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="logo">
            <a href="home.php"><img src="css/Assets/Logos/LogoALIAS.png"></a>
        </div>
        <div class="navBar">
            <p>Silahkan login disini</p>
        </div>
        <div class="masuk">
            <form  action="aksi_login.php" method="post">
                <input type="text" name="login_username" placeholder="username">
                <input type="password" name="login_password" placeholder="password">
                <input type="submit" name="login" value="Masuk">
            </form>
        </div>
    </div>
</body>

</html>