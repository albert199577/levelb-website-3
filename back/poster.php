<h4 class="ct">預告片清單</h4>
<form action="./api/edit_poster.php" method="post">
    <div>
        <?php
            $all = $Poster -> all(" ORDER BY `rank`");
            echo $all;
            foreach ($rows as $key => $value) {
        ?>
        <div class="ct" style="display: flex;justify-content: space-between;">
            <div style="width: 24.5%; background: #eee;">
                <img src="img/<?$value['path'];?>" alt="" style="width: 60%;">
            </div>
            <div style="width: 24.5%; background: #eee;"><?$value['name'];?></div>
            <div style="width: 24.5%; background: #eee;"><?$value['rank'];?></div>
            <div style="width: 24.5%; background: #eee;">操作</div>
        </div>
        <div class="ct" style="display: flex;">
            <div style="width: 24.5%;">預告片海報</div>
            <div style="width: 24.5%;">預告片片名</div>
            <div style="width: 24.5%;">預告片排序</div>
            <div style="width: 24.5%;">
                <input type="checkbox" name="sh[]" value="">顯示
                <input type="checkbox" name="del[]" value="">刪除
                <select name="ani[]" id="">
                    <option value="1">淡入淡出</option>
                    <option value="2">縮放</option>
                    <option value="3">滑動</option>
                </select>
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
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <h4 class="ct">新增預告片海報</h4>
        <div class="ct">
            <label for="">預告片海報:
                <input type="file" name="path" id="">
            </label>
            <label for="">預告片片名:
                <input type="text" name="name" id="">
            </label>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重製">
        </div>
    </form>
</div>