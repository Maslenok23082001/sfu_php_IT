
<?php
$title = "Удаление пункта меню";
require_once "header.php";
?>
<?php
$yes = false;
if(isset($_POST['button-r'])){

    $name = $_POST['name'];


    if (deleteUserMenu($_SESSION['id'], $name)) {
        require ('index.php');
    }
    else {
        $yes = true;

    }

}


?>


<body class="text-center" >

<main class="form-signin" style="margin-top: 150px; color: #ffffff;">
    <form method="post" action="del_users_menu.php" style="">

        <h1 class="h3 mb-3 fw-normal" style="color: #ffffff;">Удаление пункта из меню</h1>


        <div class="form-floating">
            <input name="name" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="text" class="form-control" id="floatingPassword" placeholder="Название">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Название</label>
        </div>




        <button name="button-r" style="margin-top: 30px; margin-left: 100px; font-weight: bolder; color: white;" class="w-100 btn btn-lg btn-primary" type="submit">Удалить</button>


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
