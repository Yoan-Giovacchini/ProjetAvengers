<?php
    function getBlock($file, $data = [])
    {
        require $file;
    }

    function getMovieInfos($id) {
        $link =$GLOBALS['link'];
        $query = 'SELECT * FROM movie WHERE id = ?';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) != 0) {
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else {
            echo 'Pas de résultats';
        }
    }

    function getAllMovie() {
        $link =$GLOBALS['link'];
        $query = 'SELECT * FROM movie ORDER BY title';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);

        $tabResult = [];

        if (mysqli_num_rows($result) != 0) {
            while($tab = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $tabResult[] = $tab;
            }
        } else {
            echo 'Pas de résultats';
        }

        return $tabResult;
    }

    function getAllActors() {
        $link =$GLOBALS['link'];
        $query = 'SELECT DISTINCT firstName, lastName, p.id FROM person p, movie m, movieHasPerson mHP WHERE mHP.idMovie  = m.id AND mHP.idPerson = p.id AND role = "actor" ORDER BY firstname';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);

        $tabResult = [];

        if (mysqli_num_rows($result) != 0) {
            while($tab = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $tabResult[] = $tab;
            }
        } else {
            echo 'Pas de résultats';
        }

        return $tabResult;
    }

    function getAllDirectors() {
        $link =$GLOBALS['link'];
        $query = 'SELECT DISTINCT firstName, lastName, p.id FROM person p, movie m, movieHasPerson mHP WHERE mHP.idMovie  = m.id AND mHP.idPerson = p.id AND role = "director" ORDER BY firstname';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);

        $tabResult = [];

        if (mysqli_num_rows($result) != 0) {
            while($tab = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $tabResult[] = $tab;
            }
        } else {
            echo 'Pas de résultats';
        }

        return $tabResult;
    }

    function getBiographyByActor($id) {
        $link =$GLOBALS['link'];
        $query = 'SELECT biography, p.id FROM person p, personHasPicture pHP 
                WHERE pHP.idPerson = ? AND pHP.idPicture = p.id';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);
        $data = [];
        if (mysqli_num_rows($result) != 0) {
            return mysqli_fetch_array($result, MYSQLI_ASSOC);

        } else {
            echo 'Pas de résultats';
        }
    }

    function getMovieActors($id) {
        $link =$GLOBALS['link'];
        $query = 'SELECT firstName, lastName, p.id FROM person p, movie m, movieHasPerson mHP WHERE m.id = ? AND mHP.idMovie  = m.id AND mHP.idPerson = p.id AND role = "actor"';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);
        $data = [];
        if (mysqli_num_rows($result) != 0) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($data, $row);
            }
        } else {
            echo 'Pas de résultats';
        }
        return $data;
    }

function getMovieDirectors($id) {
    $link =$GLOBALS['link'];
    $query = 'SELECT firstName, lastName, p.id FROM person p, movie m, movieHasPerson mHP WHERE m.id = ? AND mHP.idMovie  = m.id AND mHP.idPerson = p.id AND role = "director"';
    $stmt = mysqli_prepare($link, $query)
    or die('Échec de préparation de la requête : ' . mysqli_error($link));
    mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
    or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
    mysqli_stmt_execute($stmt)
    or die('Erreur dans la requête : ' . mysqli_error($link));
    $result = mysqli_stmt_get_result($stmt);
    $data = [];
    if (mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($data, $row);
        }
    } else {
        echo 'Pas de résultats';
    }
    return $data;
}

    function getPictureByActor($id) {
        $link =$GLOBALS['link'];
        $query = 'SELECT path, legend FROM personHasPicture pHP, picture p 
                WHERE pHP.idPerson = ? AND pHP.idPicture = p.id';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);
        $data = [];
        if (mysqli_num_rows($result) != 0) {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        } else {
            echo 'Pas de résultats';
        }
        return $data;
    }

    function getPictureByMovie($id) {
        $link =$GLOBALS['link'];
        $query = 'SELECT path, legend FROM movieHasPicture mHP, picture p 
                WHERE mHP.idMovie = ? AND mHP.idPicture = p.id';
        $stmt = mysqli_prepare($link, $query)
        or die('Échec de préparation de la requête : ' . mysqli_error($link));
        mysqli_stmt_bind_param($stmt, "i", $id) // type: i, d, s or b
        or die('Échec de paramétrage de la requête : ' . mysqli_error($link));
        mysqli_stmt_execute($stmt)
        or die('Erreur dans la requête : ' . mysqli_error($link));
        $result = mysqli_stmt_get_result($stmt);
        $data = [];
        if (mysqli_num_rows($result) != 0) {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        } else {
            echo 'Pas de résultats';
        }
        return $data;
    }
?>