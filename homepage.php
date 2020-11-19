<?php
require_once("helper.php");

$db = new Connection;
$conn = $db->getConnection();
if (!isset($_SESSION['auth'])) {
    header("Location:login.php");
}
if (isset($_POST["btnlogout"])) {
    unset($_SESSION['auth']);
    header("location:login.php");
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
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>

<body>
    <!-- START PAGE SOURCE -->
    <div id="shell">
        <div id="header">
            <h1 id="logo"><a href="#">MovieHunter</a></h1>
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
                        <li><a class="active" href="#">HOME</a></li>
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
                    <div class="head">
                        <h2>LATEST TRAILERS</h2>
                        <p class="text-right"><a href="#">See all</a></p>
                    </div>
                    <div id="movieid">

                    </div>
                </div>

            </div>
            <div id="footer">
                <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
                <p class="rf">Design by <a href="http://chocotemplates.com/">ChocoTemplates.com</a></p>
                <div style="clear:both;"></div>
            </div>
        </div>
        <!-- END PAGE SOURCE -->
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function() {
                listmovie();
                setInterval(listmovie, 3000);
            })

            function listmovie() {

                $.ajax({
                        url: "controller.php",
                        method: "get",
                        data: {
                            action: "showFilm"
                        }
                    })
                    .done((data) => {
                        const dv = $("#movieid");
                        dv.html("");
                        arr_movie = JSON.parse(data);
                        arr_movie.forEach(movie => {
                            dv.append(`
                            <div class="movie">
                            <div class="movie-image">
                                <span class="play"><span class="name">${movie['nama_movie']}</span></span>
                                <a href="#"><img src="images/${movie['image']}" alt="" /></a>
                            </div>
                        <div class="rating">
                                <p>RATING</p>
                                <div class="stars">
                            <div class="stars-in"> </div>
                            </div>
                            <span class="comments">12</span>
                        </div>
                            </div>

                            `)
                        })
                    })
            }
        </script>
</body>

</html>