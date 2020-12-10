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
    <title>News</title>
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
        width: 80%;
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
                        <li><a href="homepage.php">HOME</a></li>
                        <li><a href="trailer.php">TRAILER</a></li>
                        <li><a class="active" href="#">NEWS</a></li>
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
                <div class="box" style="width: 90%;margin: auto;">
                    <div class="head">
                        
                    </div>
                    <div id="newsid" style="width: 100%;">
                        <!-- KONTEN DISINI -->
                    </div>
                </div>
            </div>
        </div>
        <script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
                listNews();
            });

            function listNews(){
                $.ajax({
                    url: "controller.php",
                    method: "get",
                    data: {
                        action: "showNews"
                    }
                })
                .done((data) => {
                    const dv = $("#newsid");
                    dv.html("");
                    arr_news = JSON.parse(data);
                    arr_news.forEach(news => {
                        
                        dv.append(`
                            <div class="modal" style="width:80%;margin: auto;margin-bottom:5px">
                                <h1 style="font-size: 32px;margin-top: 10px;margin-left: 7%;margin-right:10%;">${news.head_news} <b style="font-size:11px;font-weight:normal;color:lightgray;"><br> Posted on : ${news.timestamp} </b></h1>
                                <div class="desc">
                                    
                                    <br>
                                    <p style="margin-bottom: 10px;text-align: justify;font-size: 14px"> ${news.detail_news}</p>
                                </div>
                            </div>
                        `)
                    })
                })
            }
        </script>
    </div>
</body>