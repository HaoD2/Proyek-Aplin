<?php
    require_once("helper.php");

    $db = new Connection;
    $conn = $db->getConnection();

    if (!empty($_FILES["myfile"]["name"])) {
        $targetDir = "images/";
        $fileName = basename($_FILES["myfile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $namatrailer = $_POST['nama_trailer'];
        $genre = $_POST['genre'];
        $image = $_FILES['myfile'];
        $desc = $_POST['description'];
        $isCheck = false;
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        $trailer = $conn->query("select * from trailer")->fetch_all(MYSQLI_ASSOC);
        if ($namatrailer != "" && $genre != "" && $image != "") {
            foreach ($trailer as $value) {
                # code...
                if ($value['nama_trailer'] == $namatrailer) {
                    $isCheck = true;
                }
            }
            if ($isCheck) {
                header("Location: admintrailer.php?err=1"); //TRAILER SUDAH ADA
            } else {
    
    
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into database
                        $insert = $conn->query("INSERT into trailer VALUES (0,'$namatrailer','$desc','". $fileName ."')");
                        if ($insert) {
                            alert("The file " . $fileName . " has been uploaded successfully.");
                            header("Location: admintrailer.php?err=no"); //BERHASIL INSERT TRAILER
                        } else {
                            header("Location: admintrailer.php?err=2"); //GAGAL UPLOAD GAMBAR
                        }
                    } else {
                        header("Location: admintrailer.php?err=2"); //GAGAL UPLOAD GAMBAR
                    }
                } else {
                    header("Location: admintrailer.php?err=2"); //TYPE FILE UPLOADAN SALAH
                }
            }
        } else {
            header("Location: admintrailer.php?err=4"); //ADA FIELD KOSONG
        }
    } else {
        header("Location: admintrailer.php?err=2"); //TYPE FILE UPLOADAN SALAH
    }
    
?>