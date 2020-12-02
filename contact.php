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
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-func.js"></script>
    <title>Contact Us</title>
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
    .contact{
        margin-left: -200px;
    }
</style>

<body>
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
                    <li><a href="news.php">NEWS</a></li>
                    <li><a href="#">IN THEATERS</a></li>
                    <li><a href="#">COMING SOON</a></li>
                    <li><a class="active" href="#">CONTACT</a></li>
                    <li><a href="#">ADVERTISE</a></li>
                    <li><a href="history.php">HISTORY</a></li>
                    <input type="submit" name="btnlogout" value="Logout" style="background-color: black; color: white;margin-left: 50px;">
                </ul>
                <div style="border-top: 1px solid white; width:1000px;">
                    <div class="contact" style="margin-top: 100px; font-size: 25px;">
                            Email Us:<a href="#">moviehunter@gmail.com</a><br>
                            Faks:+62-835-1338-3352<br>
                            For further information check:<br>
                            <a href="#">moviehunter/contactus.com</a> <br>
                            or check our instagram page at<br>
                            <a href="#">https://www.instagram.com/moviehunter_id/</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="jquery.js"></script>
</body>

</html>