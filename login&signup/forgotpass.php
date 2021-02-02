<?php
    session_start();
    include("config/db.php");
    include("../Questionarray.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recover password</title>
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
                <h1 style="color:white;">Forget password</h1>
            </div>
            <div class="form-group">
                <label style="color:white;">Enter your Email:</label>
                <input type="email" id="mem_otp_email" placeholder="Enter a valid Email ID" name="mem_otp_email" class="form-control rounded-pill" required>
            </div>
            <div class="form-group">
                <button type="Submit" name="forgotpassButton" class="btn btn-danger btn-block rounded-pill"  >Get OTP</button>
            </div>    
        </form>

    </div>
	
	<!-- <div class="jumbotron">
		<h1>Forgot password</h1>
	</div>

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4">
			
        
        
        
            
    </div> -->
</div>

<?php

//$mem_email = $_SESSION[]

if (isset($_POST['forgotpassButton'])) {
                                
    $_SESSION['mem_otp_email'] = $_POST['mem_otp_email'];
    $email= $_SESSION['mem_otp_email'];
    
    $query_select = mysqli_query($db_connect, "SELECT * from `$tablename` where mem_email = '$email' ");

    $checkpoint = mysqli_num_rows($query_select);

    if ($checkpoint>0) {
        $success = " Please check your inbox for OTP.";
        
        header("Location:otp.php");
                                
    }else{

        $error = "Email doesn't exist.Signup!";
                                
    }
                            

    if (isset($error)) {
                        
        echo "<div class='alert alert-danger'>" . $error . "</div>";
    }

    if (isset($success)) {
                        
        echo "<div class='alert alert-success'>" . $success . "</div>";
        
                                
                        
    }
}
?>




        	
</body>
</html>            