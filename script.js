window.onload = () => {
    const leagueForm = document.getElementById("league");

    leagueForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formDataLeague = new FormData(this);

        fetch("championship_table.php", {
            method: "post",
            body: formDataLeague
        }).then(function (response){
            return response.text();
        }).then(function (text) {
            document.getElementById("res").innerHTML = text;
        }).catch(function (error) {
            console.error(error);
        });
    })

    const dateForm = document.getElementById("date");

    dateForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formDataDate = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "date.php");
        xhr.responseType = 'document';
        xhr.send(formDataDate);

        xhr.onload = () => {
            document.getElementById("res").innerHTML = xhr.responseXML.body.innerHTML;
        }
    })
}

var ajax = new XMLHttpRequest();

function getJSON() {
    ajax.onreadystatechange = function(){
        let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let result = "<table>";
            result = result + "<tr><th>Player</th><th>Date</th><th>Place</th><th>Score</th><th>Team1</th><th>Team2</th></tr>";
            for (var i = 0; i < rows.length; i++) {
                result += "<tr>";
                result += "<td>" + rows[i].player+ "</td>";
                result += "<td>" + rows[i].date + "</td>";
                result += "<td>" + rows[i].place + "</td>";
                result += "<td>" + rows[i].score + "</td>";
                result += "<td>" + rows[i].team1 + "</td>";
                result += "<td>" + rows[i].team2 + "</td>";
                result += "</tr>";
            }
            document.getElementById("res").innerHTML = result;
        }
    }
    };
    var player = document.getElementById("player").value;
    ajax.open("get", "player.php?player=" + player);
    ajax.send();
}