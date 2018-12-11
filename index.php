<?php
ini_set('display_errors', 'on');
ini_set('error_reporting', -1);
require ("db.php");
require ("function.php");
getBlock("header.php");
getBlock("menu.php");

?>
    <main>
        <section>
            <h3 class="list">Liste des films</h3>
            <ul id="movieList">
                <?php
                $dataMovies = getAllMovie();
                foreach ($dataMovies as $movie) {
                    echo '<li><a href="movie.php?id=' . $movie['id'] .'">' . $movie['title'] . '</a></li>';
                }
                ?>
            </ul>
            <!--        Liste des acteurs-->
            <h3 class="block">Liste des acteurs</h3>
            <ul id="actorsList">
                <?php
                $dataActors = getAllActors();
                for ($i = 0; $i< sizeof($dataActors); ++$i) {
                    echo '<li><a href="actors.php?id=' . $dataActors[$i]['id'] .'">' . $dataActors[$i]['firstName'] . " ". $dataActors[$i]['lastName'] . '</a></li>';
                }
                ?>
            </ul>
            <!--        Liste des réalisateurs-->
            <h3 class="block">Liste des réalisateurs</h3>
            <ul id="directorsList">
                <?php
                $dataDirectors = getAllDirectors();
                for ($i = 0; $i< sizeof($dataDirectors); ++$i) {
                    echo '<li><a href="actors.php?id=' . $dataDirectors[$i]['id'] .'">' . $dataDirectors[$i]['firstName'] . " ". $dataDirectors[$i]['lastName'] . '</a></li>';
                }
                ?>
            </ul>
        </section>
    </main>
<?php
getBlock("footer.php");
?>