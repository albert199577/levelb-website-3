<?php include_once "../base.php";

$movie = $Movie -> find($_GET['id']);
$date = $_GET['date'];
$session = $ss[$_GET['session']];

$ords = $Ord -> all(['movie' => $movie['name'], 'date' => $date, 'session' => $session]);
$seats = [];
foreach ($ords as $key => $ord) {
    $seats = array_merge($seats, unserialize($ord['seat']));

}

?>
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(5, 62.4px);
        grid-template-rows: repeat(4, 85px);
        width: 540px;
        height: 370px;
        margin: auto;
        background: url("./icon/03D04.png");
        box-sizing: border-box;
        justify-content: center;
        padding-top: 18px;
        gap: 1px;
    }
    .seat {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .null {
        background: url("./icon/03D02.png");
        background-position: center;
        background-repeat: no-repeat;
    }

    .booked {
        background: url("./icon/03D03.png");
        background-position: center;
        background-repeat: no-repeat;
    }


    #check {
        position: absolute;
        right: 5px;
        bottom: 5px;
    }

</style>

<div class="grid">
    <?php 
    for ($i =0; $i < 20; $i++) {
        $booked = in_array($i, $seats) ? "booked" : "null";
    ?>
    <div class="seat <?=$booked;?>">
        <div class="ct">
            <?=floor($i / 5) + 1?>排<?=($i % 5) + 1?>號
        </div>
        <?php 
            if (!in_array($i, $seats)) {   
        ?>
        <input class="check" type="checkbox" name="check" id="check" value="<?=$i?>">
        <?php
        }
        ?>
    </div>
    <?php
    }
    ?>


</div>
<div>
    <div>您選擇的電影是:<?=$movie['name'];?></div>
    <div>您選擇的時刻是:<?=$date;?> <?=$session;?></div>
    <div>您已經勾選了<span id="tickets">0</span>張票，最高可以購買<span id="">4</span>張票</div>
    <div>
        <button onclick="prev()">回上一步</button>
        <button onclick="order()">完成訂購</button>
    </div>
</div>

<script>
    let seats = [];
    $(".check").on("click", function() {
        console.log(seats);
        if ($(this).prop("checked")) {
            if (seats.length < 4) {
                seats.push($(this).val());
            } else {
                alert("最多只能勾選四張票");
                $(this).prop("checked", false)
            }
        } else {
            seats.splice(seats.indexOf($(this).val()),1)
        }
        $("#tickets").text(seats.length);
    })

    function order() {
        let order = {
            id: $("#movie").val(),
            date: $("#date").val(),
            session: $("#session").val(),
            seats
        }
        $.post("./api/order.php", order, (result) => {
            $("#mm").html(result);
        })
    }
</script>