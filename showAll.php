<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();
    
    $querysearch = "SELECT * FROM movie";
    $queryratingfilm = "SELECT m.id_movie,COUNT(r.rating) as totals,cast(SUM(r.rating) / COUNT(r.rating) as decimal(10,2)) as rate FROM detailmovie as d, movie as m, review as r WHERE m.id_movie = d.id_movie and r.id_movie = d.id_movie";
    $movie = $conn->query($querysearch)->fetch_all(MYSQLI_ASSOC);
    $rating = $conn->query($queryratingfilm)->fetch_all(MYSQLI_ASSOC);
    echo "<pre>";
    print_r($rating);
    echo "</pre>";
    echo "<pre>";
    print_r($movie);
    echo "</pre>";
    foreach ($movie as $key => $value) {
        //trakir sampe sini
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-func.js"></script>
    <!-- [if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif] -->
</head>
<script src="jquery.js"></script>
<style>

    #shell{
        width: 100%;
        background-color: black;
    }
    #header{
        width: 90%;
        margin: auto;
    }
    #main{
        width: 90%;
        margin: auto;
    }

    .box{
        margin-top: 5px;
        margin-bottom: 5px;
        width: 100%;
        color: rgb(245, 246, 255);
        border: 1px solid rgba(128, 128, 128, 0.5);
        border-radius: 3px;
        overflow: hidden;
        padding-bottom: 0.5%;
    }
    .pic{
        width: 30%;
        float: left;
    }
    .pic img{
        width: 90%;
        margin-top: 10%;
        margin-bottom: 5%;
        margin-left: 5%;
    }
    .desc{
        width: 70%;
        margin-left: 7%;
        float: left;
    }
    .head{
        font-size: 16px;
        color: lightcyan;
    }
    #movieid{
        font-size: 16px;
        color: lightcyan;
    }
    .rating{
        margin: 0%;
        width: 100%;
        margin-left: 1.5%;
        font-size: 16px;
        color:  rgb(243, 243, 71);
    }
    footer{
        width: 100%;
        padding-top: 2.5%;
        padding-bottom: 2.5%;
        margin: auto;
        border: 1px solid rgba(211, 211, 211, 0.5);
    }

    .poster{
        width: 10%;
        background-color: black;
        height: 175px;
        color: rgb(245, 246, 255);
        border-radius: 5px;
        box-shadow: 0px 0px 10px 1px black;
        overflow: hidden;
    }
    .poster :hover{
        transition: 500ms;
        opacity: 0.8;
    }
    .pic{
        position: relative;
        float: left;
        width: 100%;
    }
    .pic img{
        position: absolute;
        width: 100%;
        height: 175px;
    }
    #tes{
        visibility: hidden;
        position: relative;
        margin-top: 5px;
        margin-bottom: 5px;
        color: mintcream;
        text-align: center;
        z-index: 1;

    }
    .poster:hover #tes{
        visibility: visible;
    }
</style>
<body>
<div id="shell">
        <div id="header">
            <h1 id="logo"><img src="images/logo.gif" alt=""></h1>
            <h2>hello, <?= $_SESSION['auth']['username'] ?></h2>
            <div class="social"> <span>FOLLOW US ON:</span>
                <ul>
                    <li><a class="twitter" href="#">twitter</a></li>
                    <li><a class="facebook" href="#">facebook</a></li>
                    <li><a class="vimeo" href="#">vimeo</a></li>
                    <li><a class="rss" href="#">rss</a></li>
                </ul>
            </div>
            <div id="navigation">
                <form method="post">
                    <ul>
                        <li><a href="homepage.php">HOME</a></li>
                        <li><a href="#">NEWS</a></li>
                        <li><a href="#">IN THEATERS</a></li>
                        <li><a href="#">COMING SOON</a></li>
                        <li><a href="#">CONTACT</a></li>
                        <li><a href="#">ADVERTISE</a></li>
                        <!-- belum berfungsi -->
                        <li><a href="login.php">LOGOUT</a></li>
                    </ul>
                </form>
            </div>
            <div id="sub-navigation">
                <ul>
                    <li><a href="showAll.php">SHOW ALL</a></li>
                    <li><a href="#">LATEST TRAILERS</a></li>
                    <li><a href="#">TOP RATED</a></li>
                    <li><a href="#">MOST COMMENTED</a></li>
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
        <div id="main">
            <div id="content">

            </div>
        </div>
        <footer>
            <p style="text-align: center;">&copy;Pemrograman Web</p>
        </footer>
    </div>
</body>
</html>