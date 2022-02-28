<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@200&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/assets.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <title>Benefit Epoxy Resin</title>
</head>
<body>
<header>
    <div class="content_zone1">
        <div class="logo">
            <a href="/index.php"><h1>수지</h1>
                <h2>Epoxy Resin</h2></a>
        </div>
        <div class="menu">
            <ul class="hor">
                <a href="#1"><li>О бренде</li></a>
                <a href="#2"><li>Украшения</li></a>
                <a href="#3"><li>Доставка</li></a>
                <a href="#4"><li>Отзывы</li></a>
            </ul>
        </div>
        <div class="inst">
            <?php
                if ($_SESSION['user']){
            ?>
            <a href="/php_new/log_out.php"><img src="img/img_205956.png"> </a>
            <a href="/profile.php"><img src="img/пользователь.png"></a>
                    <div style="display: none" class="num_tov"></div>

                    <?php
                }else{
            ?>
                    <a class="inst_sign" href="/register.php">Войти</a>

                    <a class="inst_sign" href="/register.php">Регистрация</a>
            <?php
            }
            ?>
        </div>
        <a href=""><div class="burger" >
            <ul>
                <li><div class="burger_1"></div></li>
                <li><div class="burger_1"></div></li>
                <li><div class="burger_1"></div></li>
            </ul>
        </div></a>
    </div>
</header>
