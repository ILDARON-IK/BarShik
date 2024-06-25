<?php
include "connect.php";

session_start();

$user = isset($_SESSION["User_id"]) ? mysqli_fetch_assoc(mysqli_query($con, "SELECT `role` FROM Users WHERE User_id =".$_SESSION['User_id']))['role'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-header.css">
</head>
<body>
<header  content="width=device-width, initial-scale=1">
    <div class="container">
        <div class="naw-header">
            <img src="images\Group 8192.png" alt="" class="logo">
            <h1>BarShik</h1>
            <div class="naw-menu">
                <a href="/">Главная</a>
                <a href="catalog.php">Каталог</a>
                <a href="">Корзина</a>
                <a href="#footer">Контакты</a>
                <?php if ($user) {?>
                <a href="/personal-cab.php">
                    <?= $user?>
                </a>
                <?php } ?>
                <a href='<?= (!$user)? "auto" : "reg" ?>.php'<span><?= (!$user) ? "Вход" : "Выход" ?></span></a>
            </div>
        </div>
    </div>
</header>
</body>
</html>