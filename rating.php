<?php
    require_once("helper.php");
    $db = new Connection;
    $conn = $db->getConnection();
    $user = $_GET['user'];
    $title = $_GET['title'];
    $rating = $_GET['rate'];
    $query = "SELECT m.id_movie,m.name_movie,r.rating FROM review as r, movie as m where r.username = '$user' and m.id_movie = r.id_movie";
    $review = $conn ->query($query)->fetch_all(MYSQLI_ASSOC);
    if(isset($review[0])){
        // update data
        $query = "UPDATE review SET rating = '$rating' where username = '$user'";
        if($conn ->query($query) === true){
           echo "Thank you for updating your review!";
        }
        
    }else{
        // create baru
        $id_movie = $conn ->query("SELECT id_movie as id from movie where name_movie = '$title'") ->fetch_all(MYSQLI_ASSOC);
        $id = $id_movie[0]['id'];
        $query = "INSERT INTO review values(0,$id,$rating,'$user')";
        if($conn ->query($query) === true){
            echo "Thank you for your feedback!";
        }
    }
?>