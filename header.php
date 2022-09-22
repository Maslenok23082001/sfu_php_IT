<!DOCTYPE html>
<head>


    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="author" content="">


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">



    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <script>
        var postran = function(n){
            var number = n;
            console.log(number);
            if (number == 1) {
                var elem1 = document.getElementById("serv-1");
                var elem2 = document.getElementById("serv-2");
                var elem3 = document.getElementById("serv-3");

                elem1.style.display = "block";
                elem2.style.display = 'none';
                elem3.style.display = 'none';
            }
            else if(number == 2) {
                var elem1 = document.getElementById("serv-1");
                var elem2 = document.getElementById("serv-2");
                var elem3 = document.getElementById("serv-3");
                elem1.style.display = 'none';
                elem2.style.display = 'block';
                elem3.style.display = 'none';
            }
            else {
                var elem1 = document.getElementById("serv-1");
                var elem2 = document.getElementById("serv-2");
                var elem3 = document.getElementById("serv-3");
                elem1.style.display = 'none';
                elem2.style.display = 'none';
                elem3.style.display = 'block';
            }
        }


    </script>


    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <?php
    require_once 'settings.php';
    require_once 'functions.php';
    ?>

    <?php
    if(isset($_SESSION['id'])){
        $users_menu = getUserMenu($_SESSION['id']);
        $rows = $users_menu->num_rows;
    }
    ?>

</head>
<body id="top">

<!-- header
================================================== -->
<header style="height: 100px;
  background-color: #FF7800;">

    <div class="header-logo">
        <a href="index.php">сфу</a>
    </div>

    <a id="header-menu-trigger" href="#0">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>

    <nav id="menu-nav-wrap">

        <a href="#0" class="close-button" title="close"><span>Close</span></a>

        <h3>СФУ</h3>

        <ul class="nav-list">
            <?php
            if(isset($_SESSION['id'])):
            ?>
                <li class="current"><a class="" href="/index.php" title="">Домой</a></li>
                <li><a class="smoothscroll" href="#about" title="">Описание</a></li>
                <li><a class="smoothscroll" href="#services" title="">Институты</a></li>
                <li><a class="" href="/gallery.php" title="">Моя галерея</a></li>
                <li><a class="" href="/users_menu.php" title="">Добавить пункт</a></li>
                <li><a class="" href="/del_users_menu.php" title="">Удалить пункт</a></li>
                <li><a class="" href="/logout.php" title="">Выход</a></li>
            <?php
            for ($i=0; $i<$rows; ++$i):
            $users_menu->data_seek($i);
            $name = $users_menu->fetch_assoc()['name'];
            $users_menu->data_seek($i);
            $url = $users_menu->fetch_assoc()['url'];

            ?>
                <li><a class="" href="<?php echo $url;  ?>" title=""><?php echo $name;  ?></a></li>
            <?php

                endfor;
            ?>

            <?php else: ?>
                <li class="current"><a class="" href="/index.php" title="">Домой</a></li>
                <li><a class="smoothscroll" href="#about" title="">Описание</a></li>
                <li><a class="smoothscroll" href="#services" title="">Институты</a></li>
                <li><a class="" href="/auth.php" title="">Вход</a></li>

            <?php endif; ?>

        </ul>


        <ul class="header-social-list">
            <li>
                <a href="#"><i class="fa fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>

        </ul>

    </nav>

</header>
