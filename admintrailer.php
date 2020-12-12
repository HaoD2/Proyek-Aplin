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
if (isset($_POST['Trailer'])) {
    header("location:admintrailer.php");
}
if(isset($_POST['News'])){
    header("Location:adminnews.php");
}

if (isset($_POST['logout'])) {
    header("Location:login.php");
    unset($_SESSION['auth']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trailer admin</title>
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
                <button class="login100-form-btn" name="Trailer" style="width: 200px; background-color:black">
                    Trailer
                </button>
                <button class="login100-form-btn" name="News" style="width: 200px; background-color:black">
                    News
                </button>
                <button class="login100-form-btn" name="logout" style="width: 200px; background-color:black"">
                    Logout
                </button>
            </div>
        </form>      
        <div class=" container-login100">
                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="POST" style="float: left;" enctype="multipart/form-data">
                            <h1 style="margin-top: -150px;margin-bottom: 100px;">New Trailer</h1>
                            <div class="wrap-input100 ">
                                <input class="input100" type="text" name="nama_trailer" placeholder="Nama trailer">
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
                                <input class="input100" type="text" name="description" placeholder="Description">
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
<?php
    if (isset($_GET['err'])) {
        if ($_GET['err'] == "no") {
?>
            <script>
                Swal.fire(
                    'Berhasil!',
                    'Berhasil Menambah Trailer!',
                    'success'
                )
            </script>
        <?php
        } else if ($_GET['err'] == "1") {
        ?>
            <script>
                Swal.fire(
                    'Gagal!',
                    'Trailer sudah terdaftar!',
                    'error'
                )
            </script>
        <?php
        } else if ($_GET['err'] == "4") {
        ?>
            <script>
                Swal.fire(
                    'Gagal!',
                    'Terdapat Field kosong!!',
                    'error'
                )
            </script>
        <?php
        } else { 
        ?>
            <script>
                swal.fire(
                    'Gagal!',
                    'Gagal Menambah Trailer!',
                    'error'
                )
            </script>
    <?php
        }
    }
    ?>