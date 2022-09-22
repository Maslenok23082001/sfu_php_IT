<?php
$title = "Добавление пункта меню";
require_once "header.php";
?>
<?php
$yes = false;
if(isset($_POST['button-reg'])){

    $name = $_POST['name'];
    $url = $_POST['url'];

    if (addMenu($name, $url, $_SESSION['id'])) {
        require ('index.php');
    }
    else {
        $yes = true;
        require ('index.php');
    }

}


?>


<body class="text-center" >

<main class="form-signin" style="margin-top: 150px; color: #ffffff;">
    <form method="post" action="users_menu.php" style="">

        <h1 class="h3 mb-3 fw-normal" style="color: #ffffff;">Форма добавления пункта в меню</h1>


        <div class="form-floating">
            <input name="name" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="text" class="form-control" id="floatingPassword" placeholder="Название">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Название</label>
        </div>

        <div class="form-floating">
            <input name="url" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="text" class="form-control" id="floatingPassword" placeholder="URL">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Путь</label>
        </div>


        <button name="button-reg" style="margin-top: 30px; margin-left: 100px; font-weight: bolder; color: white;" class="w-100 btn btn-lg btn-primary" type="submit">Создать</button>


    </form>

    <?php
    if ($yes){
        echo "<div style=' height: 82px;
    color: red;
    font-size: 20px;' id='yes_reg'>Ошибка!</div>";
    }

    ?>






<?php
    require_once "footer.php";
?>
