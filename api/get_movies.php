<?php include_once "../base.php";
$id = $_GET['id'];
echo $id;
$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));

$movies = $Movie -> all(" WHERE `sh` = 1 AND `ondate` BETWEEN '$ondate' AND '$today'");

foreach ($movies as $movie) {
    $selected = ($movie['id'] == $id) ? "selected" : "";
    echo "<option value='{$movie['id']}' $selected >{$movie['name']}</option>";
}

?>
