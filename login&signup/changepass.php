<?php
session_start();
include("config/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reset PASSWORD</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- external css  -->
	<link rel="stylesheet" href="css/forgetCSS.css">
    <!-- Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/background5-01.jpg');
        background-size: cover;
        }
        .container{
            background-image: url('../images/background5-01.jpg');
            background-size: cover;
        }
        body h1{
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
        }
    </style>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100 pt-5 p-3 rounded">
    <div class="row">
        <form action="" method="POST">
            <div class="title pb-4">
                <h1 style="color:white;">Reset password</h1>
            </div>
            <div class="form-group">
                <label style="color:white;">Enter New Password:</label>
                <input placeholder="********" type="password" id="mem_new_pass" name="mem_new_pass" class="form-control rounded-pill" required>
            </div>
            <div class="form-group">
					<label style="color:white;">Confirm Password</label>
					<input placeholder="********" type="password" id="mem_conf_pass" name="mem_conf_pass" class="form-control rounded-pill" required>
			</div>
            <div class="form-group">
            <button type="login" name="changepassButton" class="btn btn-danger btn-block rounded-pill" >Reset Password</button>
            </div>    
        </form>

    </div>
</div>
<?php


if (isset($_POST['changepassButton'])) {
    $mem_new_pass=$_POST["mem_new_pass"];
    $mem_conf_pass=$_POST["mem_conf_pass"];
    $email=$_SESSION['mem_otp_email'];
    if($mem_new_pass == $mem_conf_pass){
        $select=mysqli_query($db_connect, "SELECT  mem_email,mem_pass from user_login_data where mem_email='$email'") ;
            if(mysqli_num_rows($select)==1){
                if(isset($_SESSION['mem_otp_email'])){
    
                    unset($_SESSION['mem_otp_email']);
                
                }else if (isset($_SESSION['mem_email'])){
                
                    unset($_SESSION['mem_email']);
                
                }
                $select=mysqli_query($db_connect,"UPDATE user_login_data SET mem_pass=sha1('$mem_new_pass') where mem_email='$email'");
                header("location:login.php");    
            }
  
    
    }else{
        echo "Passwords did not match";
    }
}

?>
</body>
</html>


