<?php
    require_once "helper.php";

    $db = new Connection;
    $conn = $db->getConnection();
    if(isset($_POST["next"])){
        $username = $_POST["user"];
        $user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);
    }

    if(isset($_POST["changeps"])){
        //$password = $_POST["npass"];
        if($_POST["npass"]!="" && $_POST["cpass"]!=""){
            if($_POST["npass"]==$_POST["cpass"]){
                $password = password_hash($_REQUEST["npass"], PASSWORD_DEFAULT);
                $syarat = md5($_REQUEST["npass"]);
                $temp = $_POST["user"];
                $query = "UPDATE user SET password='$syarat' WHERE (username = '$temp' OR email = '$temp')";
                $res = $conn->query($query);
                $query = "UPDATE user SET password='$password' WHERE (username = '$temp' OR email = '$temp')";
                $res = $conn->query($query);

                if($res){
                    // confirm("Password changed\nDo you want change password again?");
                    alert("Password changed");
                }else{
                    alert("Gagal ganti password");
                }
            }else{
                alert("Password tidka sama");
            }
        }else{
            alert("Fill blank");
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
                        Forgot Password
					</span>

                    <div id="changed">
                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Input your username/email
                            </span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="user" placeholder="Username/Email" id="user">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="next" id="next">
                                Next
                            </button>
                        </div>
                    </div>

                    <div id="password">
                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Input your new password
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="This fill can't blank">
                            <input class="input100" type="password" name="npass" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="This fill can't blank">
                            <input class="input100" type="password" name="cpass" placeholder="Confirm-Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="hidden" name="temp" value="<?=$username?>">
                            <button class="login100-form-btn" name="changeps">
                                Change password
                            </button>
                        </div>
                    </div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
							Back to login
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

        $(document).ready(function(){
            $("#password").hide();

            $("#next").click(function(){
                var user = $("#user").val();
                if(user!=""){
                    
                    $.ajax({
                        method: "GET",
                        url: "searchUser.php",
                        data: {
                            user: user
                        },
                        success: function(res){
                            if(res=="no"){
                                alert("Username not found");
                            }else{
                                if(confirm("Do you want to change your password?")){
                                    $("#changed").hide();
                                    $("#password").show();
                                }else{
                                    alert("OK");
                                }
                            }
                        }
                    });
                }else{
                    alert("Fill blank");
                }
            });
        });
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>


</body>
</html>