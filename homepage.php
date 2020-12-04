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
    <!-- [if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif] -->
</head>
<style>
    body {
        background-color: black;
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

    .modal {
        width: 80%;
        background-color: rgba(34, 34, 34, 0.856);
        color: rgb(245, 246, 255);
        border-radius: 3px;
        box-shadow: 0px 0px 10px 1px black;
        overflow: hidden;
    }

    .pic {
        width: 20%;
        float: left;
    }

    .pic img {
        width: 120%;
        margin-top: 10%;
        margin-bottom: 10%;
        margin-left: 5%;
    }

    .desc {
        width: 70%;
        margin-left: 7%;
        float: left;
    }
    #subhead{
        border: 0px solid black;
        background-color: black;
        color: white;
        font-weight: bold;
        padding-top: 3px;
    }
    #subhead:hover{
        color: red;
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
    #search123:hover{
        cursor: pointer;
        color: red;
    }
</style>

<body>
    <!-- START PAGE SOURCE -->
    <div id="shell">
        <div id="header">
            <h1 id="logo"><img src="images/logo.gif" alt=""></h1>
            <h2>hello, <?= $_SESSION['auth']['username'] ?></h2>
            <div class="social"> <span>FOLLOW US ON:</span>
                <img src="images/social.gif" alt="">
                <ul>
                    <li><a class="twitter" href="#">twitter</a></li>
                    <li><a class="facebook" href="#">facebook</a></li>
                    <li><a class="vimeo" href="#">vimeo</a></li>
                    <li><a class="rss" href="#">rss</a></li>
                </ul>
            </div>
            <div id="navigation" style="margin-right: 100px;">
                <form method="post">
                    <ul>
                        <li><a class="active" href="#">HOME</a></li>
                        <li><a href="news.php">NEWS</a></li>
                        <li><a href="history.php">HISTORY</a></li>
                        <input type="submit" id="logout" name="btnlogout" value="LOGOUT">
                    </ul>
                </form>
            </div>
            <div id="sub-navigation">
                <ul>
                    <li><button id="subhead" onclick="showAll()" >SHOW ALL</a></li>
                    <li><button id="subhead" onclick="latestTrailer()">LATEST TRAILERS</a></li>
                    <!-- <li><button id="subhead" onclick="topRated()">TOP RATED</a></li>
                    <li><button id="subhead" onclick="mostCommented()">MOST COMMENTED</a></li> -->
                </ul>
                <div id="search">
                    <form method="get" accept-charset="utf-8">
                        <label for="search-field">SEARCH</label>
                        <input type="text" name="search field" placeholder="Enter search here" id="search-field" class="blink search-field" />
                        <input type="button" value="GO!" class="search-button" id="search123" onclick="sortFilm()">
                    </form>
                </div>
            </div>
        </div>
        <div id="main">
            <div id="content">
                <div class="box">
                    <div class="head">
                        
                    </div>
                    <div id="movieid">
                        <!-- KONTEN DISINI -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE SOURCE -->
        <script src="jquery.js"></script>
        <script>
            function showAll(){
                listmovie();
            }
            function latestTrailer(){
                listTrailer();
            }
            // function topRated(){ //urutin dari rating pake ajax
            //     const dv = $("#movieid");
            //     dv.html("");
            //     $.ajax({
            //         url: "rating.php",
            //         success: function(result){
            //             arr_rating = JSON.parse(result);
            //             arr_rating.array.forEach(rating => {
            //                 dv.append(`
                                
            //                 `);
            //             });
            //         }
            //     })
            // }
            // function mostCommented(){
            
            // }
            
            $(document).ready(function() {
                sortFilm();
                // setInterval(sortFilm(), 3000);

            })

            function listTrailer(){
                const dv = $("#movieid");
                dv.html("");
                $.ajax({
                        url: "trailer.php",
                        success: function(result){
                            arr_trailer = JSON.parse(result);
                            arr_trailer.forEach(trailer => {
                                dv.append(`
                                <div class="modal">
                                    <div class="pic">
                                        <span class="play"><span class="name">${trailer.nama_trailer}</span></span>
                                        <a href="viewMovie.php?title=${trailer.nama_trailer}"><img src="" alt="" /></a>
                                    </div>
                                    <div class="desc">
                                        <h1 style="font-size: 18px;margin-top: 10px;">${trailer.nama_trailer}</h1>
                                        <br>
                                        <p style="margin-bottom: 10px">${trailer.desc_trailer}</p>
                                    </div>
                                </div>

                            `)
                            })
                        }
                });
            }

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
                                <div class="modal">
                                    <div class="pic">
                                        <span class="play"><span class="name">${movie['nama_movie']}</span></span>
                                        <a href="viewMovie.php?title=${movie.name_movie}"><img src="images/${movie['image']}" alt="" /></a>
                                    </div>
                                    <div class="desc">
                                        <h1 style="font-size: 18px;margin-top: 10px;">${movie.name_movie}</h1>
                                        <p>Genre : ${movie.genre}</p>
                                        <br>
                                        <p style="margin-bottom: 10px">
                                            ${movie.detail}
                                        </p>
                                    </div>
                                </div>

                            `)
                        })
                    })
            }


            function sortFilm() {

            $.ajax({
                    url: "controller.php",
                    method: "post",
                    data: {
                        action: "sortfilm",
                        nameMV: $("#search-field").val(),
                    }
                })
                .done((data) => {
                    const dv = $("#movieid");
                    dv.html("");
                    arr_movie = JSON.parse(data);
                    arr_movie.forEach(movie => {

                        dv.append(`
                            <div class="modal">
                                <div class="pic">
                                    <span class="play"><span class="name">${movie['nama_movie']}</span></span>
                                    <a href="viewMovie.php?title=${movie.name_movie}"><img src="images/${movie['image']}" alt="" /></a>
                                </div>
                                <div class="desc">
                                    <h1 style="font-size: 18px;margin-top: 10px;">${movie.name_movie}</h1>
                                    <p>Genre : ${movie.genre}</p>
                                    <br>
                                    <p style="margin-bottom: 10px">${movie.detail}</p>
                                </div>
                            </div>

                        `)
                    })
                    $('#search-field').val("");
                })
            }
        </script>
    </div>
</body>

</html>