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
if (isset($_POST['Trailer'])) {
    header("location:admintrailer.php");
}
if (isset($_POST['user'])) {
    header("location:adminuser.php");
}

if (isset($_POST['logout'])) {
    header("Location:login.php");
    unset($_SESSION['auth']);
}
$user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);
foreach ($user as $value) {
    # code...
    $username[] = $value['username'];
    for ($i = 0; $i < count($username); $i++) {
        # code...
        if (isset($_POST["ban$i"])) {
            $q = "UPDATE `user` SET status = 0 WHERE `user`.`username` = '$username[$i]'";
            $conn->query($q);
        }
    }
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
                <button class="login100-form-btn" name="Trailer" style="width: 200px; background-color:black">
                    Trailer
                </button>
                <button class="login100-form-btn" name="logout" style="width: 200px; background-color:black"">
                    Logout
            </button>
            </form>


        </div>
        <div class=" container-login100">

                    <div class="wrap-login100">
                        <form class="login100-form validate-form" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ctr = 1;
                                    $user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);
                                    foreach ($user as $value) {
                                        # code...
                                        if ($value['role'] == 2 || $value['role'] == 3) {
                                    ?>

                                            <tr>
                                                <th scope="row"><?= $ctr ?></th>
                                                <td><?= $value['username'] ?></td>
                                                <td><?= $value['password'] ?></td>
                                                <td><button name='ban<?= $ctr ?>'>Ban</button></td>
                                            </tr>



                                    <?php
                                            $ctr++;
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>

                        </form>
                    </div>
            </div>
    </div>





</body>

</html>