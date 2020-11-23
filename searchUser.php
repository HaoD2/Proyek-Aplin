<?php
    require_once "helper.php";

    $db = new Connection;
    $conn = $db->getConnection();
    $user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);
    $username = $_GET["user"];
    $bol = false;
    foreach($user as $key){
        if($key["username"]==$username || $key["email"]==$username){
            $bol = true;
        }
    }

    if($bol){
        echo "";
    }else{
        echo "no";
    }
?>