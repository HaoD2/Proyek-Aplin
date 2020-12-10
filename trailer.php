<?php
require_once("helper.php");
$db = new Connection;
$conn = $db->getConnection();

$query = "SELECT * FROM trailer";
$data = mysqli_query($conn, $query)->fetch_all(MYSQLI_ASSOC);
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
    <title>Trailer</title>
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
        height: 20%;
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

    #subhead {
        border: 0px solid black;
        background-color: black;
        color: white;
        font-weight: bold;
        padding-top: 3px;
    }

    #subhead:hover {
        color: red;
    }

    #logout {
        background-color: black;
        color: white;
        margin-left: 29px;
        border: 1px solid black;
        font-size: 14px;
        font-weight: bolder;
    }

    #logout:hover {
        cursor: pointer;
        color: red;
    }

    #search123:hover {
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
                        <li><a href="homepage.php">HOME</a></li>
                        <li><a class="active" href="#">TRAILER</a></li>
                        <li><a href="news.php">NEWS</a></li>
                        <li><a href="history.php">HISTORY</a></li>
                        <input type="submit" id="logout" name="btnlogout" value="LOGOUT">
                    </ul>
                </form>
            </div>
            <div id="sub-navigation" style="border-bottom: 0px solid black;">
            </div>
        </div>
        <div id="main">
            <div id="content">
                <div class="box">
                    <div class="head">

                    </div>
                    <div id="trailerid">
                        <!-- KONTEN DISINI -->
                    </div>
                </div>
            </div>
        </div>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function() {
                listrailer();
            });
            function listrailer() {
                $.ajax({
                        url: "controller.php",
                        method: "get",
                        data: {
                            action: "showtrailer"
                        }
                    })
                    .done((data) => {

                        const dv = $("#trailerid");
                        dv.html("");
                        arr_trailer = JSON.parse(data);
                        arr_trailer.forEach(trailer => {

                            dv.append(`
                                <div class="modal">
                                    <div class="pic">
                                        <span class="play"><span class="name">${trailer.nama_trailer}</span></span>
                                        <a href="viewTrailer.php?title=${trailer.nama_trailer}"> <img src="images/${trailer['images']}" alt="" /></a>
                                    </div>
                                    <div class="desc">
                                        <h1 style="font-size: 18px;margin-top: 10px;">${trailer.nama_trailer}</h1>
                                        <p>Genre : ${trailer.genre}</p>
                                        <p>Description : ${trailer.desc_trailer}</p>
                                        <p>Status:Coming Soon</p>
                                        <br>
                                    </div>
                                </div>

                            `)
                        })
                    })
            }
        </script>
    </div>
</body>

</html>