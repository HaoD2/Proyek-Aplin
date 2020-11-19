<?php
require_once("helper.php");

$db = new Connection;
$conn = $db->getConnection();

if (!isset($_SESSION['auth'])) {
    header("Location:login.php");
}
if (isset($_POST['movie'])) {
    header("location:adminmovie.php");
}
if (isset($_POST['user'])) {
    header("location:adminuser.php");
}
if (isset($_POST['logout'])) {
    header("Location:login.php");
}


if (isset($_POST["accept"]) && !empty($_FILES["myfile"]["name"])) {
    $targetDir = "images/";
    $fileName = basename($_FILES["myfile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $namaMovie = $_POST['namemovie'];
    $genre = $_POST['genre'];
    $image = $_FILES['myfile'];
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
            alert("This Movie already Avaiable");
        } else {


            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $insert = $conn->query("INSERT into movie VALUES (null,'$namaMovie','$genre','" . $fileName . "', 0)");
                    if ($insert) {
                        alert("The file " . $fileName . " has been uploaded successfully.");
                    } else {
                        alert("File upload failed, please try again.");
                    }
                } else {
                    alert("Sorry, there was an error uploading your file.");
                }
            } else {
                alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.');
            }
        }
    } else {
        alert("Fill Blank");
    }
} else {
    alert('Please select a file to upload.');
}

function showImgfromDB()
{
    $db = new Connection;
    $conn = $db->getConnection();
    $movie = $conn->query("select image from movie")->fetch_all(MYSQLI_ASSOC);
    foreach ($movie as $value) {
        $imageUrl = 'images/'.$value['image'];
    }
    //<img src="<?= echo $imageUrl"> buat Nampilin nya rencananya mau pake ajax
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--===============================================================================================-->
    <link rel="icon" type="login/image/png" href="login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->


</head>

<body>

    <div class="limiter">
        <form method="post">
            <div class="menuBar" style="display: flex;background-color: black;">
                <button class="login100-form-btn" name="user" style="width: 200px; background-color:black ;">
                    User
                </button>
                <button class="login100-form-btn" name="movie" style="width: 200px; background-color:black">
                    Movie
                </button>
                <button class="login100-form-btn" name="logout" style="width: 200px; background-color:black"">
                    Logout
            </button>
            </form>


        </div>
        <div class=" container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="POST" style="float: left;" enctype="multipart/form-data">
                            <h1 style="margin-top: -150px;margin-bottom: 100px;">New Movie</h1>
                            <div class="wrap-input100 ">
                                <input class="input100" type="text" name="namemovie" placeholder="Nama Movie">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 ">
                                <input class="input100" type="text" name="genre" placeholder="Genre">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="wrap-input100 ">
                                <label for="myfile">Select a file:</label>
                                <input type="file" id="myfile" name="myfile"><br><br>
                            </div>
                            <button class="login100-form-btn" name="accept" style="width: 200px; background-color:black"">
                             Submit
                            </button>
                        </form>
                    </div>
            </div>
    </div>





</body>

</html>