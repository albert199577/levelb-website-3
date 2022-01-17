<style>
    .lists *, .controls * {
        box-sizing: border-box;
    }

    .lists {
        width: 210px;
        height: 260px;
        margin: auto;
        /* background-color: #fff; */
        overflow: hidden;
    }

    .lists .po {
        width: 100%;
        text-align: center;
        display: none;
    }

    .po img {
        width: 100%;
    }

    .controls, .icons {
        display: flex;
    }

    .controls {
        justify-content: space-around;
        align-items: center;
    }

    .icons {
        /* background-color: pink; */
        width: 300px;
        height: 90px;
        justify-items: center;
    }

    .icon {
        width: 80px;
        background-color: lightblack;
    }

    .left {
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        /* border-left: 30px solid transparent; */
        border-right: 20px solid #192dda;
        cursor: pointer;
    }

    .right {
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-left: 20px solid #192dda;
        /* border-right: 30px solid transparent; */
        cursor: pointer;
    }

    .left:hover {
        border-right: 20px solid #558323;
    }

    .right:hover {
        border-left: 20px solid #658323;
    }



</style>

<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div>
            <div class="lists">
                <?php
                    $pos = $Poster -> all(" WHERE `sh` = 1 ORDER BY `rank`");
                    foreach ($pos as $key => $value) {
                        echo "<div class='po'>";
                        echo "<img src='./img/{$value['path']}'>";
                        echo $value['name'];
                        echo "</div>";
                ?>

                <?php
                }
                ?>
            </div>
            <div class="controls">
                <div class="left">
                    <!-- left -->
                </div>
                <div class="icons">
                    <div class="icon">sss</div>
                    <div class="icon">sss</div>
                    <div class="icon">sss</div>
                    <div class="icon">sss</div>
                </div>
                <div class="right">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".po").eq(0).show();
</script>