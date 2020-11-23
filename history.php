<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();
    
    $data = $_SESSION['auth']['username'];
    $query = "SELECT m.name_movie as movie, m.genre as genre,m.image as pic,d.detail FROM history as h, movie as m,detailmovie as d where username = '$data' AND h.id_movie = m.id_movie and d.id_movie = h.id_movie";
    $history = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($history);
    // echo"</pre>";
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
    body{
        background-color: black;
    }

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

    .modal{
        width: 49%;
        margin-right: 1%;
        height: 150px;
        background-color: rgba(34, 34, 34, 0.856);
        color: rgb(245, 246, 255);
        border-radius: 3px;
        box-shadow: 0px 0px 10px 1px black;
        overflow: hidden;
        float: left;   
        margin-bottom: 10px;
    }
    .pic{
        width: 20%;
        float: left;
    }
    .pic img{
        width: 120%;
        height: 140px;
        margin-top: 5%;
        margin-left: 5%;
    }
    .desc{
        width: 70%;
        margin-left: 7%;
        float: left;
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
                        <!-- <li><a href="#">NEWS</a></li> -->
                        <!-- <li><a href="#">IN THEATERS</a></li> -->
                        <!-- <li><a href="#">COMING SOON</a></li> -->
                        <!-- <li><a href="#">CONTACT</a></li> -->
                        <!-- <li><a href="#">ADVERTISE</a></li> -->
                        <li><a class="active" href="#">HISTORY</a></li>
                        <!-- belum berfungsi -->
                        <li><a href="login.php">LOGOUT</a></li>
                    </ul>
                </form>
            </div>
            <div id="sub-navigation">
                <H1>HISTORY</H1>
            </div>
        </div>
        <div id="main" style="border-bottom: none;">
            <div id="content">
                <div class="box" style="border-bottom: none;">
                    <div class="head">
                        <h2 style="margin-right: 5px;">Order By : </h2>
                        <select name="order" id="order">
                            <option value="desc">Latest upload</option>
                            <option value="asc">Older upload</option>
                        </select>
                    </div>
                    <br>
                    <div id="movieid">
                        <?php foreach ($history as $key => $val) { ?>
                            <div class="modal">
                                    <div class="pic">
                                        <span class="play"><span class="name">
                                            <?=$val[$key]['movie']?>
                                        </span></span>
                                        <a href="viewMovie.php?title=<?=$val['movie']?>">
                                            <img src="images/<?=$val['pic']?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="desc">
                                        <h1 style="font-size: 18px;margin-top: 10px;"><?= $val['movie'] ?></h1>
                                        <p>Genre : <?= $val['genre']?></p>
                                        <br>
                                        <p style="margin-bottom: 10px"><?=$val['detail']?></p>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE SOURCE -->
        <script src="jquery.js"></script>
    </div>
</body>

</html>