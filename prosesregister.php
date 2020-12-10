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
        $role = $_POST['role'];

        if ($username == "" && $password == "" && $email == "" && $username == "") {
            header("Location:register.php?err=1"); //field kosong
        } 
        else {
            $user = $conn->query("select * from user")->fetch_all(MYSQLI_ASSOC);

            foreach ($user as $value) {
                if ($value['email'] == $email || $value['username'] == $username) {
                    $isCheck = true;
                }
            }
    
            if ($isCheck) { 
                header("Location: register.php?err=2"); //username sudah digunakan
            } 
            else {
    
                if ($password == $cpassword) {
                    $password = password_hash($_REQUEST["pass"], PASSWORD_DEFAULT);
    
                    if ($role == "VIP") {
                        $q = "INSERT INTO user VALUES('$username','$fullname','$password','$email',2,1)";
                        if($conn->query($q) === true){
                            header("Location: register.php?err=no");
                        }
                        
                    } 
                    else if ($role == "Member") {
                        $q = "INSERT INTO user VALUES('$username','$fullname','$password','$email',3,1)";
    
                        if($conn->query($q) === true){
                            header("Location: register.php?err=no");
                        }
                        
                    }
                } else {
                    header("Location: register.php?err=3"); //password tidak sama
                }
            }
        }
    }
?>