<?php
ini_set('display_errors', 'on');
ini_set('error_reporting', -1);
require ("db.php");
require ("function.php");
getBlock("header.php");
getBlock("menu.php");

?>
    <main>
        <section class="list">
            <?php
            $dataActor = getBiographyByActor($_GET['id']);
            $dataActorPicture = getPictureByActor($_GET['id']);
            echo '<img src="'. $dataActorPicture["path"].'"/>
            <p> '. $dataActor['biography']. '</p>';
            ?>
        </section>
    </main>
<?php
getBlock("footer.php");
?>