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
        position: relative;
    }

    .lists .po {
        width: 100%;
        text-align: center;
        display: none;
        position: absolute;
    }

    .po img, .icon img {
        width: 100%;
        border: 2px solid #eee;
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
        width: 320px;
        height: 110px;
        justify-items: center;
        overflow: hidden;
        font-size: 12px;
    }

    .icon {
        width: 80px;
        position: relative;
        flex-shrink: 0;
        padding: 5px;
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
                        echo "<div class='po' data-ani='{$value['ani']}'>";
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
                <?php
                    foreach ($pos as $key => $value) {
                        echo "<div class='icon' data-ani='{$value['ani']}'>";
                        echo "<img src='./img/{$value['path']}'>";
                        echo $value['name'];
                        echo "</div>";
                    }
                ?>
                </div>
                <div class="right">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".po").eq(0).show();
    let i = 0;
    let all = $('.po').length;
    // console.log(all);
    let slides = setInterval(() => {
        // console.log($(".po").eq(i).data('ani'));
        // $(".po").eq(i).hide(1000);
        i++;
        if (i > all - 1) {
            i = 0;
        }
        ani(i);
    }, 2500);

    function ani(n) {
        let ani = $(".po").eq(n).data('ani');
        let now = $(".po:visible");
        let next = $(".po").eq(n);
        switch (ani) {
            case 1:
                now.fadeOut(1000, function () {
                    next.fadeIn(1000);
                });
            break;
            case 2:
                now.hide(1000, function () {
                    next.show(1000);
                });
            break;
            case 3:
                now.slideUp(1000, function () {
                    next.slideDown(1000);
                });
            break;
        }
    }
    
    let p = 0;
    $(".left, .right").click(function() {
        if ($(this).hasClass('left')) {
            if (p - 1 > 0) {
                p--;
            }
        } else {
            if (p + 1 < all - 3) {
                p++;
            }
        }
        $(".icon").animate({right:p*80}, 500);
    });

    $(".icon").on("click", function() {
        clearInterval(slides);
        let idx = $(this).index();
        ani(idx);
        i = idx;
        slides = setInterval(() => {
            i++;
            if (i > all - 1) {
                i = 0;
            }
            ani(i);

        }, 2500)
    });

</script>