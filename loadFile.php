<?php
require_once 'settings.php';
require_once 'functions.php';
if(!empty($_FILES['file'])){
    $file = $_FILES['file'];
    $name = $file['name'];
    $pathFile = __DIR__.'/images_gallery/'.$name;

    if(!move_uploaded_file($file['tmp_name'], $pathFile)){
        echo "Файл не смог загрузиться!";
    }
    if($name == '') {
        echo "Файл не смог загрузиться!";
    }
    else {
        loadImg($_SESSION['id'], $name);
    }


}


header('location: '.'/gallery.php');
?>