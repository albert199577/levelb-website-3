<h4 class="ct">預告片清單</h4>
<div style="display:flex" class="ct">
    <div style="width:25%;background:#eee">預告片海報</div>
    <div style="width:25%;background:#eee">預告片片名</div>
    <div style="width:25%;background:#eee">預告片排序</div>
    <div style="width:25%;background:#eee">操作</div>
</div>
    <form action="./api/edit_poster.php" method="post">
        <div style="overflow:auto; height:200px">
            <?php
                $rows = $Poster -> all(" ORDER BY `rank`");
                // dd($rows);
                foreach($rows as $key => $value) {
                    $checked = ($value['sh'] == 1) ? "checked" : "";
                    if ($key == 0) {
                        $up = $value['id'] . "-" . $value['id'];
                        $down = $value['id'] . "-" . ($rows[$key + 1]['id']);
                    }
                    if ($key == (count($rows) - 1)) {
                        $down = $value['id'] . "-" . $value['id'];
                        $up = $value['id'] . "-" . ($rows[$key - 1]['id']);
                    }
                    if ($key > 0 && $key < (count($rows) - 1)) {
                        $up = $value['id'] . "-" . $rows[$key-1]['id'];
                        $down = $value['id'] . "-" . $rows[$key+1]['id'];
                    }
            ?>
            <div class="ct" style="display: flex;justify-content: space-between;">
                <div style="width: 24.5%;">
                    <img src="./img/<?=$value['path'];?>" alt="" style="width: 60px;">
                </div>
                <div style="width: 24.5%;">
                    <input type="text" name="name[]" value="<?=$value['name'];?>">
                </div>
                <div style="width: 24.5%;">
                    <input type="button" class="sw" value="往上" data-sw="<?=$up;?>">
                    <input type="button" class="sw" value="往下" data-sw="<?=$down;?>">
                </div>
                <div style="width: 24.5%;">
                    <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=$checked?>>顯示
                    <input type="checkbox" name="del[]" value="<?=$value['id'];?>">刪除
                    <select name="ani[]" id="">
                        <option value="1" <?=($value['ani'] == 1) ? "selected" : "";?>>淡入淡出</option>
                        <option value="2" <?=($value['ani'] == 2) ? "selected" : "";?>>縮放</option>
                        <option value="3" <?=($value['ani'] == 3) ? "selected" : "";?>>滑動</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
            <input type="reset" value="重製">
        </div>
    </form>
<hr>
<div>
    <h4 class="ct">新增預告片海報</h4>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <div class="ct">
            <label for="">預告片海報:
                <input type="file" name="path">
            </label>
            <label for="">預告片片名:
                <input type="text" name="name">
            </label>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重製">
        </div>
    </form>
</div>
<script>
    $('.sw').on('click', function() {
        let id = $(this).data('sw').split('-');
        $.post("./api/sw.php", {id, table: "poster"}, () => {
            location.reload();
        })
        console.log(id);
    })
</script>