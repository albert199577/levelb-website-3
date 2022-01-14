<?php include_once "../base.php";

foreach ($_POST['id'] as $key => $value) {
    if (isset($_POST['del']) && in_array($value, $_POST['del'])) {
        $Poster -> del($value);
    } else {
        $po = $Poster -> find($value);
        $po['name'] = $_POST['name'][$key];
        $po['ani'] = $_POST['ani'][$key];
        $po['sh'] = (isset($_POST['sh']) && in_array($value, $_POST['sh'])) ? 1 : 0;
        $Poster -> save($po);
    }
}

to("../back.php?do=poster");


?>