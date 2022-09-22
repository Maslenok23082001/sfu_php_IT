

<?php
$title = "Институты";
require_once 'header.php';
require_once 'functions.php';

$institutes = getInstitutes();
$rows = $institutes->num_rows;


#echo '<pre>';
#print_r($rows);
#echo '</pre>';
?>

<h1 style="color: white; margin-top: 15%; margin-left: 25%;" ">Институты СФУ</h1>
<div style="margin-left: 45%;" class="more animate-intro">
    <a class="button stroke" href="/search_institutes.php" style="color: #FFFFFF;">
        Поиск
    </a>
</div>
<div style="margin-top: 150px; margin-bottom: 150px; color: white;" class="row services-content">

    <div id="serv-1" style="display: block;" class="services-list block-1-2 block-tab-full group">
        <?php
            for ($i=0; $i<4; ++$i):
            $institutes->data_seek($i);
            $name = $institutes->fetch_assoc()['name'];
            $institutes->data_seek($i);
            $image = $institutes->fetch_assoc()['image'];
            $institutes->data_seek($i);
            $description = $institutes->fetch_assoc()['description'];
        ?>
        <div class="bgrid service-item animate-this">

            <img src="images/icon-<?php echo $image; ?>.png"/>

            <div class="service-content">
                <h3 style="color: white;" class="h05"><?php echo $name; ?></h3>

                <p><?php echo $description; ?></p>
            </div>

        </div> <!-- end bgrid -->
        <?php
            endfor;
        ?>

    </div> <!-- end services-list -->









    <div id="serv-2" style="display: none;" class="services-list block-1-2 block-tab-full group">
        <?php
        for ($i=4; $i<8; ++$i):
            $institutes->data_seek($i);
            $name = $institutes->fetch_assoc()['name'];
            $institutes->data_seek($i);
            $image = $institutes->fetch_assoc()['image'];
            $institutes->data_seek($i);
            $description = $institutes->fetch_assoc()['description'];
            ?>
            <div class="bgrid service-item animate-this">

                <img src="images/icon-<?php echo $image; ?>.png"/>

                <div class="service-content">
                    <h3 style="color: white;" class="h05"><?php echo $name; ?></h3>

                    <p><?php echo $description; ?></p>
                </div>

            </div> <!-- end bgrid -->
        <?php
        endfor;
        ?>

    </div> <!-- end services-list -->











    <div id="serv-3" style="display: none;" class="services-list block-1-2 block-tab-full group">
        <?php
        for ($i=8; $i<$rows; ++$i):
            $institutes->data_seek($i);
            $name = $institutes->fetch_assoc()['name'];
            $institutes->data_seek($i);
            $image = $institutes->fetch_assoc()['image'];
            $institutes->data_seek($i);
            $description = $institutes->fetch_assoc()['description'];
            ?>
            <div class="bgrid service-item animate-this">

                <img src="images/icon-<?php echo $image; ?>.png"/>

                <div class="service-content">
                    <h3 style="color: white;" class="h05"><?php echo $name; ?></h3>

                    <p><?php echo $description; ?></p>
                </div>

            </div> <!-- end bgrid -->
        <?php
        endfor;
        ?>

    </div> <!-- end services-list -->




    <div style="margin-top: 20px; padding: 20px;">
        <a id="postran1" onclick="postran(1)" style="padding: 7px; cursor: pointer;">1  </a>
        <a id="postran2" onclick="postran(2)" style="padding: 7px; cursor: pointer;">2  </a>
        <a id="postran3" onclick="postran(3)" style="padding: 7px; cursor: pointer;">3  </a>

    </div>

</div> <!-- end services-content -->





<?php
require_once 'footer.php';

?>