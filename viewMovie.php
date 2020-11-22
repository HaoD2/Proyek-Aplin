<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();
    
    $tes = $_GET['title'];
    $querysearch = "SELECT * FROM movie where name_movie = '$tes'";
    $movie = $conn->query($querysearch)->fetch_all(MYSQLI_ASSOC);
    print_r($movie);
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
    }
    .pic{
        width: 30%;
        float: left;
    }
    .pic img{
        width: 90%;
        margin-top: 10%;
        margin-bottom: 10%;
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
</style>
<body>
    <!-- START PAGE SOURCE -->
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
                        <li><a href="#">HOME</a></li>
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
                    <li><a href="#">SHOW ALL</a></li>
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
                <div class="box">
                    <div class="pic">
                        <img src="images/<?=$movie[0]['image']?>" alt="">
                    </div>
                    <div class="head">
                        <h1><?= $movie[0]['name_movie']?> </h1>
                    </div>
                    <div id="movieid">
                        <p>Genre : <?= $movie[0]['genre']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>