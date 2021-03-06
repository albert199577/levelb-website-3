<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<div style="overflow: auto; height: 420px">
<?php
$mos = $Movie -> all("ORDER BY `rank`");

foreach ($mos as $key => $value) {
    if ($key == 0) {
        $up = $value['id'] . "-" . $value['id'];
        $down = $value['id'] . "-" . ($mos[$key + 1]['id']);
    }
    if ($key == (count($mos) - 1)) {
        $down = $value['id'] . "-" . $value['id'];
        $up = $value['id'] . "-" . ($mos[$key - 1]['id']);
    }
    if ($key > 0 && $key < (count($mos) - 1)) {
        $up = $value['id'] . "-" . $mos[$key-1]['id'];
        $down = $value['id'] . "-" . $mos[$key+1]['id'];
    }

?>
<div style="display: flex; width: 100%; justify-content: space-around;">
    <div>
        <img src="./img/<?=$value['poster'];?>" alt="" style="width: 80px;">
    </div>
    <div>
        分級:
        <img src="./icon/<?=$value['level'];?>.png" alt="">
    </div>
    <div>
        <div style="display: flex; ">
            <div style="width: 33%">片名:<?=$value['name'];?></div>
            <div style="width: 33%">片長:<?=$value['length'];?></div>
            <div style="width: 33%">上映時間:<?=$value['ondate'];?></div>
        </div>
        <div>
            <button class="show" data-id="<?=$value['id'];?>"><?=($value['sh'] == 1)? "顯示" : "隱藏"?></button>
            <button class="sw" data-sw="<?=$up;?>">往上</button>
            <button class="sw" data-sw="<?=$down;?>">往下</button>
            <button onclick="location.href='?do=edit_movie&id=<?=$value['id'];?>'">編輯電影</button>
            <button onclick="del('movie', <?=$value['id'];?>)">刪除電影</button>
        </div>
        <div>
            劇情介紹:<?=$value['intro'];?>
        </div>
    </div>
</div>

<?php

}

?>
</div>

<script>
    $(".show").on("click", (e) => {
        let id = $(e.target).data("id");
        $.post("./api/show.php", {id}, () => {
            location.reload();
        });
    })
    // $(".show").on("click", function() {
    //     let id = $(this).data("id");
    //     $.post("./api/show.php", {id}, () => {
    //         location.reload();
    //     });
    // })

    $('.sw').on('click', function() {
        let id = $(this).data('sw').split('-');
        $.post("./api/sw.php", {id, table: "movie"}, () => {
            location.reload();
        })
        console.log(id);
    })

</script>