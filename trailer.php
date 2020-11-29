<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();

    $query = "SELECT * FROM trailer";
    $data = mysqli_query($conn,$query) ->fetch_all(MYSQLI_ASSOC);
    // print_r($data);
    echo json_encode($data);
?>