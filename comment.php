<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();

    $data = $_POST;
    $title = $_GET['title'];
    $user = $_SESSION['auth']['username'];

    $querytitle = "SELECT id_movie as id from movie where name_movie = '$title'";
    $title2 = $conn ->query($querytitle) ->fetch_all(MYSQLI_ASSOC);
    $id = $title2[0]['id'];
    
    date_default_timezone_set("Asia/Bangkok");
    $timestamp = date("d M y") . " at " . date("h:i");
    echo $user;
    $query = "INSERT INTO comment values(0,$id,'$user','$data[comment]','$timestamp')";
    if($conn ->query($query) === true){
        header("Location: viewMovie.php?title=$title&err=no");
    }else{
        header("Location: viewMovie.php?title=$title&err=1");
    }
    
?>