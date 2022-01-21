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
        <div>電影:</div>
        <div>
            <select name="movie" id="movie">
                
            </select>
        </div>
    </div>
    <div class="row">
        <div>日期:</div>
        <div>
            <select name="date" id="date">
                
            </select>
        </div>
    </div>
    <div class="row">
        <div>場次:</div>
        <div>
            <select name="session" id="session">

            </select>
        </div>
    </div>
    <div class="row0">
        <div class="ct">
            <button onclick="booking()">確定</button>
            <button onclick="reset()">重置</button>
        </div>
    </div>
</div>
<div id="booking" style="display: none;">劃位</div>
<script>
let id = (new URL(location)).searchParams.get("id");

getMovies(id);

$("#movie").on("change", () => {
    getDays()
})

function booking() {
    $("#order, #booking").toggle();

    let order = {
        id: $("#movie").val(),
        date: $("#date").val(),
        session: $("#session").val()
    }
    $.get("./api/booking.php", order, (booking) => {
        $("#booking").html(booking);
    })
}

function reset() {
    getMovies(id);
}

function prev() {
    $("#order, #booking").toggle();
    $("#booking").html("");
}

function getMovies(id) {
    $.get("./api/get_movies.php", {id}, (movies)=>{
        $("#movie").html(movies);
        getDays();
    })
}


function getDays() {
    let id = $("#movie").val();
    $.get("./api/get_days.php", {id}, (days) => {
        $("#date").html(days);
        getSessions();
    })
}

function getSessions() {
    let id = $("#movie").val();
    let date = $("#date").val();
    $.get("./api/get_sessions.php", {id, date}, (sessions) => {
        $("#session").html(sessions);
    })
}
</script>