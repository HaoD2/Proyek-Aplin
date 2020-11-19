<?php

require_once("helper.php");
$db = new Connection;
$conn = $db->getConnection();


if($_REQUEST["action"] == "showFilm"){
    $movie = $conn->query("SELECT * FROM movie")->fetch_all(MYSQLI_ASSOC);
    $json_datas = json_encode($movie);
    echo $json_datas;
}
