<?php
$title = "Добавление пункта меню";
require_once "header.php";
?>
<?php
$yes = false;
if(isset($_POST['button-g'])){

    $name = $_POST['name'];


    if (searchInstituts($name)) {
        $result = searchInstituts($name);
        $rows = $result->num_rows;

    }
    else {
        $yes = true;

    }

}


?>


<body class="text-center" >

<main class="form-signin" style="margin-top: 150px; color: #ffffff;">
    <form method="post" action="search_institutes.php" style="">

        <h1 class="h3 mb-3 fw-normal" style="color: #ffffff;">Поиск института</h1>


        <div class="form-floating">
            <input name="name" style="margin-left: 42%; color: white; margin-bottom: 3px;" type="text" class="form-control" id="floatingPassword" placeholder="Название">
            <label for="floatingInput" style="color: #ffffff; margin-bottom: 25px;">Название(Абривиатура)</label>
        </div>




        <button name="button-g" style="margin-top: 30px; margin-left: 100px; font-weight: bolder; color: white;" class="w-100 btn btn-lg btn-primary" type="submit">Найти</button>


    </form>
    <div style="margin-top: 150px; margin-bottom: 150px; color: white;" class="row services-content">

        <div id="serv-1" style="display: block;" class="services-list block-1-2 block-tab-full group">
    <?php
    for ($i = 0; $i < $rows; ++$i):
        $result->data_seek($i);
        $namee = $result->fetch_assoc()['name'];
        $result->data_seek($i);
        $image = $result->fetch_assoc()['image'];
        $result->data_seek($i);
        $description = $result->fetch_assoc()['description'];
    ?>
        <div class="bgrid service-item animate-this">

            <img src="images/icon-<?php echo $image; ?>.png"/>

            <div class="service-content">
                <h3 style="color: white;" class="h05"><?php echo $namee; ?></h3>

                <p><?php echo $description; ?></p>
            </div>

        </div>

    <?php
    endfor;
    ?>
        </div>
    </div>

    <?php
    if ($yes) {
        echo "<div style=' height: 82px;
    color: red;
    font-size: 20px;' id='yes_reg'>Такого нет!</div>";
    }
    ?>






    <?php
    require_once "footer.php";
    ?>
