<?php
    require_once("helper.php");

    $db = new Connection;
    $conn = $db->getConnection();

    if (!empty($_FILES["myfile"]["name"])) {
        $targetDir = "images/";
        $fileName = basename($_FILES["myfile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $namaMovie = $_POST['namemovie'];
        $genre = $_POST['genre'];
        $image = $_FILES['myfile'];
        $desc = $_POST['description'];
        $isCheck = false;

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        $movie = $conn->query("select * from movie")->fetch_all(MYSQLI_ASSOC);
        if ($namaMovie != "" && $genre != "" && $image != "") {
            foreach ($movie as $value) {
                # code...
                if ($value['name_movie'] == $namaMovie) {
                    $isCheck = true;
                }
            }
            if ($isCheck) {
                header("Location: adminmovie.php?err=1"); //MOVIE SUDAH ADA
            } else {
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into database
                        
                        if ($conn -> query("INSERT into movie VALUES(0,'$namaMovie','$genre','" . $fileName . "',0)") == true) {
                            $insert2 = $conn->query("INSERT into detailmovie VALUES (0,'$desc')");
                            header("Location: adminmovie.php?err=no"); //UPLOAD SUKSES
                        } else {
                            header("Location: adminmovie.php?err=2"); //UPLOAD FILE GAGAL
                        }
                    } else {
                        header("Location: adminmovie.php?err=2"); //UPLOAD FILE GAGAL
                    }
                } else {
                    header("Location: adminmovie.php?err=2"); //UPLOAD FILE DENGAN TIPE YANG BERBEDA
                }
            }
        } else {
            header("Location: adminmovie.php?err=4"); //ADA DATA KOSONG
        }
    } else {
        header("Location: adminmovie.php?err=5"); //TIDAK ADA FILE YANG DI UPLOAD
    }
?>