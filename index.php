<?php
    include('connect.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>LB3</title>
    <script src = "script.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<form action="" method="post" id="league">
    Получить таблицу чемпионата лиги 
    <select name="league">
        <?php
        $sql = "SELECT DISTINCT league FROM team";
        foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value='$name'>$name</option>";
        }
        ?>
    </select>
    <input type="submit" value="OK">
</form>

<br>

<form action="" method="post" id="date">
Получить список игр на указанную дату <select name="date">
        <?php
        $sql = "SELECT DISTINCT date FROM game";
        foreach ($dbh->query($sql) as $row) {
            $name = $row[0];
            print "<option value='$name'>$name</option>";
        }
        ?>
    </select>
    <button > ОК </button>
</form>

<p>Получить список игр футболиста <select name="player" id="player">
        <?php
        $sql = "SELECT DISTINCT * FROM player";
        foreach ($dbh->query($sql) as $row) {
            $name = $row[1];
            print "<option value='$name'>$name</option>";
        }
        ?>
    </select>
    <button onclick="getJSON()"> ОК </button></p>

<div id="res"></div>
</body>
</html>