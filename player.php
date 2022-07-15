<?php
    include "connect.php";
    header('Content-Type: application/json');
    header('Cache-Control: no-cache, must-revalidate');
    $player = $_GET['player'];
    $sql = "SELECT game.date, game.score, t1.name AS team1, t2.name AS team2, player.name AS player, game.place as place FROM player JOIN team AS t1 ON player.FID_TEAM = t1.ID_TEAM JOIN game ON t1.ID_TEAM = GAME.FID_TEAM1 JOIN team AS T2 ON game.FID_TEAM2 = t2.ID_TEAM WHERE player.name =:player";
    $sth = $dbh->prepare($sql);
    $sth->execute(array('player' => $player));
    $row = $sth->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($row);
    ?>