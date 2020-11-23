<?php
require_once("helper.php");
$db = new Connection;
$conn = $db->getConnection();

$tes = $_GET['title'];
$querysearch = "SELECT * FROM movie where name_movie = '$tes'";
$querydesc = "SELECT d.detail FROM detailmovie as d,movie as m where d.id_movie = m.id_movie and m.name_movie = '$tes'";
$queryratingfilm = "SELECT COUNT(r.rating) as totals,cast(SUM(r.rating) / COUNT(r.rating) as decimal(10,2)) as rate FROM detailmovie as d, movie as m, review as r WHERE m.id_movie = d.id_movie and r.id_movie = d.id_movie";
$movie = $conn->query($querysearch)->fetch_all(MYSQLI_ASSOC);
$synopsis = $conn->query($querydesc)->fetch_all(MYSQLI_ASSOC);
$rating = $conn->query($queryratingfilm)->fetch_all(MYSQLI_ASSOC);
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
    }

    .rating {
        margin: 0%;
        width: 100%;
        margin-left: 1.5%;
        font-size: 16px;
        color: rgb(243, 243, 71);
    }

    footer {
        width: 100%;
        padding-top: 2.5%;
        padding-bottom: 2.5%;
        margin: auto;
        border: 1px solid rgba(211, 211, 211, 0.5);
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
                <div class="box">
                    <div class="pic">
                        <img src="images/<?= $movie[0]['image'] ?>" alt="">
                    </div>
                    <div class="head">
                        <h1><?= $movie[0]['name_movie'] ?> </h1>
                    </div>
                    <div id="movieid">
                        <p>Genre : <?= $movie[0]['genre'] ?></p> <br>
                        <p>Synopsis : <br> <?= $synopsis[0]['detail'] ?></p>
                    </div>
                    <div class="rating">Rating : <?= $rating[0]['rate'] ?> out of 5 From <?= $rating[0]['totals'] ?> Review</div>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="content">
                <div class="box">
                    <!-- nyetel film disini -->
                </div>
            </div>
        </div>
        <div id="main">
            <div id="content">
                <div class="box">
                    <!-- Comment Disini -->
                    <div class="container pb-cmnt-container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                                        <form class="form-inline">
                                            <div class="btn-group">
                                                <button class="btn" type="button"><span class="fa fa-picture-o fa-lg"></span></button>
                                                <button class="btn" type="button"><span class="fa fa-video-camera fa-lg"></span></button>
                                                <button class="btn" type="button"><span class="fa fa-microphone fa-lg"></span></button>
                                                <button class="btn" type="button"><span class="fa fa-music fa-lg"></span></button>
                                            </div>
                                            <button class="btn btn-primary pull-right" type="button">Share</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .pb-cmnt-container {
                            font-family: Lato;
                            margin-top: 100px;
                        }

                        .pb-cmnt-textarea {
                            resize: none;
                            padding: 20px;
                            height: 130px;
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
                    </style>
                </div>
            </div>
        </div>
        <footer>
            <p style="text-align: center;">&copy;Pemrograman Web</p>
        </footer>
    </div>
</body>

</html>