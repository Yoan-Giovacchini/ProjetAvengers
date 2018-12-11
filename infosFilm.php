<!--Titre du film-->
<h1 class="title"><?=$data["title"]?></h1>
<?php
    getBlock("imagesMovies.php", getPictureByMovie($_GET['id']));
?>
<!--Date de sortie-->
<aside class="information" id="Release">
    <h3>Date de sortie : <?= $data["releaseDate"]?></h3>
</aside>
<!--Note-->
<aside class="information" id="Rating">
    <h3> Note : <?= $data["rating"]?> sur 5 &nbsp;<meter id="avancement" value="<?= $data["rating"]?>" max="5"></meter></h3>
</aside>
<!--Synopsis-->
<article id="Synopsis">
    <h2 class="title2">Synopsis</h2>
    <p class="text"><?= $data["Synopsis"]?></p>
</article>
<!--Acteurs-->
<article id="Actors">
    <h2 class="title2">Acteurs principaux</h2>
    <?php
        $dataActors = getMovieActors($data['id']);
        foreach ($dataActors as $actor) {
            $tab = getPictureByActor($actor['id']);
            getBlock("imagesActors.php", $tab);
        }
    ?>
</article>
<!--Realisateurs-->
<article id="Director">
    <h2 class="title2">Réalisateurs</h2>
    <?php
    $dataDirectors = getMovieDirectors($data['id']);
    foreach ($dataDirectors as $director) {
        $tab = getPictureByActor($director['id']);
        getBlock("imagesActors.php", $tab);
    }
    ?>
</article>
