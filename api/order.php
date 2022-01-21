<?php include_once "../base.php";


$movie = $Movie -> find($_POST['id']);
$date = $_POST['date'];
$session = $ss[$_POST['session']];
sort($_POST['seats']);
$seats = $_POST['seats'];

$id = $Ord -> math("max", "id") + 1;
$no = date("Ymd") . sprintf("%04d", $id);

$Ord -> save([
    "no" => $no,
    "movie" => $movie['name'],
    "date" => $date,
    "session" => $session,
    "seat" => serialize($seats),
    "qt" => count($seats)
])

?>
<style>
    #order {
        width: 50%;
        margin: auto;
    }
    .row {
        display: flex;
    }
    .row div:first-child {
        width: 15%;
        text-align: left;
    }

    .row div:nth-child(2) {
        width: 85%;
        text-align: right;
    }
    select {
        width: 100%;
    }
</style>


<h3 class="ct">線上訂票</h3>

<div id="order">
    <div class="row">
        <div>
            感謝您的訂購，您的訂單編號是：<?=$no;?>
        </div>
    </div>
    <div class="row">
        <div>電影名稱：</div>
        <div><?=$movie['name'];?></div>
    </div>
    <div class="row">
        <div>日期:</div>
        <div><?=$date;?></div>
    </div>
    <div class="row">
        <div>場次日期:</div>
        <div></div>
    </div>
    <div class="row">
        <div>
            座位:<br>
            <?php
            foreach ($seats as $seat) {
            ?>
            <?=floor($seat / 5) + 1?>排<?=($seat % 5) + 1?>號
            <?php
            }
            ?>
            共 <?=count($seats);?>張電影票
        </div>
    </div>
    <div class="row0">
        <div class="ct">
            <button onclick="booking()">確定</button>
            <button onclick="reset()">重置</button>
        </div>
    </div>
</div>