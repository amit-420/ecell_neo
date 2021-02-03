<?php
session_start();
include("config/db.php");
include("funs.php");

$error="";
if (isset($_POST['changepassButton'])) {
    $mem_new_pass=$_POST["mem_new_pass"];
    $mem_conf_pass=$_POST["mem_conf_pass"];
    if($mem_new_pass == $mem_conf_pass){
		$mem_pass = $mem_conf_pass;
        account_creation($db_connect,$mem_pass);
        // header("location:login.php");    
        
  
    
    }else{
        $error = "Passwords did not match";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Set PASSWORD</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- external css  -->
	<link rel="stylesheet" href="css/forgetCSS.css">
    <!-- Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <!-- favicon  -->
    <link rel="shortcut icon" href="../public/img/2.png" type="image/x-icon">
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
                <h1 style="color:white;">Set password</h1>
            </div>
            <div class="form-group">
                <label style="color:white;">Enter Password:</label>
                <input placeholder="********" type="password" id="mem_new_pass" name="mem_new_pass" class="form-control rounded-pill" required>
            </div>
            <div class="form-group">
					<label style="color:white;">Confirm Password</label>
					<input placeholder="********" type="password" id="mem_conf_pass" name="mem_conf_pass" class="form-control rounded-pill" required>
			</div>
            <div class="form-group">
            <button type="login" name="changepassButton" class="btn btn-danger btn-block rounded-pill" >Set Password</button>
            </div>    
        </form>
    </div>  
</div>

</body>
</html>


