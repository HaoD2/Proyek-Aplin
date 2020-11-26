<?php

require_once("helper.php");
$db = new Connection;
$conn = $db->getConnection();
// $queryratingfilm = "SELECT d.detail, m.name_movie,m.genre,m.image,SUM(r.rating) / COUNT(r.rating) FROM detailmovie as d, movie as m, review as r WHERE m.id_movie = d.id_movie and r.id_movie = d.id_movie";

if($_REQUEST["action"] == "showFilm"){
    $querydesc = "SELECT d.detail, m.name_movie,m.genre,m.image FROM detailmovie as d, movie as m WHERE m.id_movie = d.id_movie";
    $movie = $conn->query($querydesc)->fetch_all(MYSQLI_ASSOC);
    $json_datas = json_encode($movie);
    echo $json_datas;
}

if($_REQUEST["action"] == "sortfilm"){
    //$nameMV = $_POST['nameMV'];
    $querydesc = "SELECT d.detail, m.name_movie,m.genre,m.image FROM detailmovie as d, movie as m WHERE m.id_movie = d.id_movie and m.nama_movie LIKE '%$nameMV%'";
    $movie = $conn->query($querydesc)->fetch_all(MYSQLI_ASSOC);
    $json_datas = json_encode($movie);
    echo $json_datas;
}