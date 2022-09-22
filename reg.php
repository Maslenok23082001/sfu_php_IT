<?php
$title = "Регистрация";
require_once "header.php";
?>
<?php
$yes = false;
if(isset($_POST['button-reg'])){

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (loadUser($login, $email, $password)) {
        require ('auth.php');
    }
    else {
        $yes = true;
    }

}


?>


<body class="text-center" >

<main class="form-signin" style="margin-top: 150px; color: #ffffff;">
    <form method="post" action="reg.php" style="">

        <h1 class="h3 mb-3 fw-normal" style="color: #ffffff;">Форма регистрации</h1>

        <div class="form-floating">
            <input name="email" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Email address</label>
        </div>
        <div class="form-floating">
            <input name="login" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="text" class="form-control" id="floatingPassword" placeholder="Login">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Login</label>
        </div>
        <div class="form-floating">
            <input name="password" style="margin-left: 42%; color: white;  margin-bottom: 3px;" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword" style="color: #ffffff; margin-bottom: 25px;">Password</label>
        </div>


        <button name="button-reg" style="margin-top: 30px; margin-left: 100px; font-weight: bolder; color: white;" class="w-100 btn btn-lg btn-primary" type="submit">Зарегестрироваться</button>
        <button style="margin-top: 30px; font-weight: bolder; color: white;"><a style="display: block; width: 100%; height: 100%;" href="/auth.php">Войти</a></button>

    </form>
<?php
    if ($yes){
        echo "<div style=' height: 82px;
    color: red;
    font-size: 20px;' id='yes_reg'>Попробуйте ввести другой Email или Login (Возможно такой пользователь уже существует)!</div>";
    }

?>
</main>





</body>











<?php
require_once 'footer.php';

?>














