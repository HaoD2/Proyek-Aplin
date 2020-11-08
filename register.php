<?php
require_once('helper.php');


$db = new Connection;
$conn = $db->getConnection();


if (isset($_POST['asRegister'])) {
	$isCheck = false;
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$fullname = $_POST['fullname'];
	$cpassword = $_POST['cpass'];
	$email = $_POST['email'];
	if ($username == "" && $password == "" && $email == "" && $username == "") {
		alert("Fill Blank !!!");
	} else {
		$user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);
		foreach ($user as $value) {
			# code...
			if ($value['email'] == $email || $value['username'] == $username) {
				$isCheck = true;
			}
		}
		if ($isCheck) {
			alert("Email/Username sudah Digunakan");
		} else {
			if ($password == $cpassword) {
				$password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
				$q = "INSERT INTO user VALUES('$username','$fullname','$email','$password')";
				$conn->query($q);
				alert("Berhasil");
			} else {
				alert("Password Tidak Sama");
			}
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
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Member Register
					</span>
					<div class="wrap-input100 ">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="text" name="fullname" placeholder="fullname">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-users" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<input class="input100" type="password" name="cpass" placeholder="Confirm-Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>



					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="asRegister">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.5
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>

</html>