<?php
require_once('helper.php');
$db = new Connection;
$conn = $db->getConnection();
    date_default_timezone_set("Asia/Bangkok");
    $timestamp = date("d M y") . " at " . date("h:i");
    $name = $_POST['namemovie'];
    $desc = $_POST['description'];

    if($conn->query("INSERT INTO News VALUES(null,'$name','$desc','$timestamp')") == true){
        header("Location:adminnews.php?err=no");
    }else{
        header("Location:adminnews.php?err=1");
    }



?>