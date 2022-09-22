<?php
$title = "Галлерея";
require_once 'header.php';
require_once 'functions.php';
if(!isset($_SESSION['id'])){
    $galleryShow = false;
}
else {
    $galleryShow = true;
    $result = getImagesUser($_SESSION['id']);
    $rows = $result->num_rows;
}
?>

<?php if($galleryShow): ?>

    <div class="lightbox-gallery">
        <div class="container">
            <div class="intro">
                <form style="color: white; margin-top: 150px;" method="post" action="loadFile.php" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" value="Загрузить">

                </form>
                <h2 class="text-center" style="margin-top: 10px; color: white;">Галерея пользователя <?php print_r($_SESSION['login']); ?></h2>

            </div>
            <div class="row photos"  style=" width: 30%;
                 height: auto;
                 ">
                <?php
                for ($i=0; $i<$rows;++$i):
                    $result->data_seek($i);
                    $path = $result->fetch_assoc()['src'];
                ?>
                <div><img class="img-fluid" src="images_gallery/<?php echo $path ?>"></div>
                <?php endfor; ?>

            </div>
        </div>
    </div>












<?php else: ?>


<h1 style="color: white; margin-top: 200px; padding: 20px;">Авторизуйтесь для доступа к галереи!</h1>



<?php  endif; ?>











<?php
require_once 'footer.php';
?>
