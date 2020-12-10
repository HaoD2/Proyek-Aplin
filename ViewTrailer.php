<?php
require_once("helper.php");
$db = new Connection;
$conn = $db->getConnection();

if (isset($_POST["btnlogout"])) {
    unset($_SESSION['auth']);
    header("location:login.php");
}
if(!isset($_SESSION['auth'])){
    header("location:login.php");
}

$tes = $_GET['title'];
$user = $_SESSION['auth']['username'];

$querysearch        = "SELECT * FROM trailer where nama_trailer = '$tes'";
$querydesc          = "SELECT d.detail FROM detailmovie as d,movie as m where d.id_movie = m.id_movie and m.name_movie = '$tes'";
$queryratingfilm    = "SELECT COUNT(r.rating) as totals,cast(SUM(r.rating) / COUNT(r.rating) as decimal(10,2)) as rate FROM detailmovie as d, movie as m, review as r WHERE m.id_movie = d.id_movie and r.id_movie = d.id_movie";
$querycomment       = "SELECT COUNT(*) as jml FROM comment";
$querycomment2      = "SELECT * FROM comment ORDER BY id desc";


$movie = $conn->query($querysearch)->fetch_all(MYSQLI_ASSOC);
$synopsis = $conn->query($querydesc)->fetch_all(MYSQLI_ASSOC);
$rating = $conn->query($queryratingfilm)->fetch_all(MYSQLI_ASSOC);
$comment = $conn->query($querycomment)->fetch_all(MYSQLI_ASSOC);
$comment2 = $conn->query($querycomment2)->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-func.js"></script>
    <!-- [if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif] -->
</head>
<style>
    body{
        margin: 0%;
    }
    #shell {
        width: 100%;
        background-color: black;
    }

    #header {
        width: 90%;
        margin: auto;
    }

    #main {
        width: 90%;
        margin: auto;
    }

    .box {
        margin-top: 5px;
        margin-bottom: 5px;
        width: 100%;
        color: rgb(245, 246, 255);
        border: 1px solid rgba(128, 128, 128, 0.5);
        border-radius: 3px;
        overflow: hidden;
        padding-bottom: 0.5%;
    }

    .pic {
        width: 30%;
        float: left;
    }

    .pic img {
        width: 90%;
        margin-top: 10%;
        margin-bottom: 5%;
        margin-left: 5%;
    }

    .desc {
        width: 70%;
        margin-left: 7%;
        float: left;
    }

    .head {
        font-size: 16px;
        color: lightcyan;
    }

    #movieid {
        font-size: 16px;
        color: lightcyan;
        text-align: left;
    }

    .ratin {
        margin: 0%;
        width: 100%;
        margin-left: 1%;
        font-size: 16px;
        color: rgb(243, 243, 71);
        text-align: left;
    }

    footer {
        width: 100%;
        padding-top: 2.5%;
        padding-bottom: 2.5%;
        margin: auto;
        border: 1px solid rgba(211, 211, 211, 0.5);
    }
    h2{
        font-size: 10px;
        color: #f2a223;
        font-weight: bold;
        text-align: left;
    }
    #titel{
        font-size: 24px;
        text-align: left;
        color: lightcyan;
        padding: 0%;
        margin-top: 3%;
    }
    .pb-cmnt-container{
        font-family: Lato;
        margin: 0%;
        width: 100%;
        margin-top: 15px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 90px;
        width: 100%;
        border: 1px solid #F2F2F2;
        color: black;
    }

    .btn {
        color: black;
    }

    .btn:hover {
        color: white;
    }

    em {
        display: block;
        margin: .5em auto 2em;
        color: #bbb;
    }
    
    .detail {
        position: absolute;
        text-align: right;
        right: 5px;
        bottom: 5px;
        width: 50%;
    }
    a[href*="intent"] {
        display: inline-block;
        margin-top: 0.4em;
    }

    .rating {
        padding: 0%;
        width: 200px;
        height: 60px;
        margin: 0%;
        font-size: 45px;
        overflow: hidden;
    }

    .rating input {
        float: left;
        opacity: 0;
        position: absolute;
    }

    .rating a,
    .rating label {
        float: right;
        color: #aaa;
        text-decoration: none;
        -webkit-transition: color .4s;
        -moz-transition: color .4s;
        -o-transition: color .4s;
        transition: color .4s;
    }

    .rating label:hover~label,
    .rating input:focus~label,
    .rating label:hover,
    .rating a:hover,
    .rating a:hover~a,
    .rating a:focus,
    .rating a:focus~a {
        color: orange;
        cursor: pointer;
    }

    .rating2 {
        direction: rtl;
    }

    .rating2 a {
        float: none
    }

    .comm{
    width: 80%;
    height: 100px;
    background-color: black;
  }
  .comm img{
    margin-left: 20px;
    margin-top: 20px;
    width: 60px;
    height: 60px;
    float: left;
  }
  #logout{
    background-color: black;
    color: white;
    margin-left: 29px;
    border: 1px solid black;
    font-size: 14px;
    font-weight: bolder;
  }

  #logout:hover{
    cursor: pointer;
    color: red;
  }
</style>

<body>
    <!-- START PAGE SOURCE -->
    <div id="shell">
        <div id="header">
            <h1 id="logo"><img src="images/logo.gif" alt=""></h1>
            <h2 style="margin-top: 0px;padding-top: 5px;">hello, <?= $_SESSION['auth']['username'] ?></h2>
            
            <div id="navigation">
                <form method="post">
                    <ul>
                        <li><a class="active" href="#">HOME</a></li>
                        <li><a href="trailer.php">TRAILER</a></li>
                        <li><a href="news.php">NEWS</a></li>
                        <li><a href="history.php">HISTORY</a></li>
                        <input type="submit" id="logout" name="btnlogout" value="LOGOUT">
                    </ul>
                </form>
            </div>
            <div id="sub-navigation">
                <ul>
                    <li><a href="homepage.php">SHOW ALL</a></li>
                </ul>
                <div id="search">
                    <form action="#" method="get" accept-charset="utf-8">
                        <label for="search-field">SEARCH</label>
                        <input type="text" name="search field" placeholder="Enter search here" id="search-field" class="blink search-field" />
                        <input type="submit" value="GO!" class="search-button" />
                    </form>
                </div>
            </div>
        </div>
        <div id="main" style="border-bottom: 0px solid black;">
            <div id="content">
                <div class="box" style="height: 395px;">
                    <div class="pic">
                        <img src="images/<?= $movie[0]['images'] ?>" alt="">
                    </div>
                    <div class="head">
                        <h1 id="titel"><?= $movie[0]['nama_trailer'] ?> </h1>
                    </div>
                    <br>
                    <div id="movieid">
                        <p>Synopsis : <br> <?= $movie[0]['desc_trailer'] ?></p>
                    </div>
                    <br> <br> <br>
                    <div class="notice">
                        <p id="notify" style="position: relative; margin-left: 12.5px;">
                            <!-- notif kalo review masuk -->
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
        <div id="main" style="border-bottom: 0px solid black;">
            <div id="content">
                <div class="box" id="film">
                    <!-- nyetel film disini -->
                </div>
            </div>
        </div>
        
        <footer>
            <p style="text-align: center;">&copy;Pemrograman Web</p>
        </footer>
    </div>
</body>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "videoplayer.php",
            success: function(result){
                $("#film").html("");
                $("#film").append(result);
            }
        })
    });

    function rate(val){
        $.ajax({
            url: "rating.php?user=<?=$user?>&title=<?=$tes?>&rate=" + val,
            success: function(result){
                $("#notify").html("");
                $("#notify").append(result);
            }
        })
    }

</script>
</html>