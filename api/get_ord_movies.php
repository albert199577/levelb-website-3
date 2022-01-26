<?php include_once "../base.php";

$movies = $Movie -> q("SELECT `movie` FROM `ord` GROUP BY `movie`");

foreach ($movies as $movie) {
    echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
}

?>