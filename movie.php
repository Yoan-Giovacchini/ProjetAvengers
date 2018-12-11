<?php
require ("db.php");
require ("function.php");
getBlock("header.php");
getBlock("menu.php");

?>
    <main>
        <section>
            <?php
            getBlock("infosFilm.php", getMovieInfos($_GET['id']));
            ?>
        </section>
    </main>
<?php
getBlock("footer.php");
?>