<?php
session_start();
include("config/db.php");
include("config/confirmmail.php");
include("funs.php");
$random_verification_code = rand(1000,9999);
$_SESSION["otp"]=$random_verification_code;
#echo $random_verification_code;
 
$sub="OTPverify";
$name="user";


?>
<?php $html1 =
'<!DOCTYPE html>
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
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100 pt-5 p-3 rounded">
	<div class="row">
		<form action="otpverify.php" method="POST">
			<div class="title pb-4">
				<h1 style="color:white;">Recover password</h1>
			</div>
			<div>
				<p style="color:red;">Kindly check your Email for OTP.</p>
			</div>
			<div class="form-group">
				<label style="color:white;">Enter OTP:</label>
				<input placeholder="Enter OTP" type="integer" id="otp" name="mem_otp" class="form-control rounded-pill" required>
			</div>
			<div class="form-group">
				<button type="Submit" name="otpverifyButton1" class="btn btn-danger btn-block rounded-pill" >Verify</button>
			</div>    
		</form>
	</div>
</div>
</body>
</html>'; ?>

<?php $html2 =
'<!DOCTYPE html>
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
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100 pt-5 p-3 rounded">
	<div class="row">
		<form action="otpverify.php" method="POST">
			<div class="title pb-4">
				<h1 style="color:white;">Set password</h1>
			</div>
			<div>
				<p style="color:red;">Kindly check your Email for OTP.</p>
			</div>
			<div class="form-group">
				<label style="color:white;">Enter OTP:</label>
				<input placeholder="Enter OTP" type="integer" id="otp" name="mem_otp" class="form-control rounded-pill" required>
			</div>
			<div class="form-group">
				<button type="Submit" name="otpverifyButton2" class="btn btn-danger btn-block rounded-pill" >Verify</button>
			</div>    
		</form>
	</div>
</div>
</body>
</html>'; ?>

<?php 
if(isset($_SESSION['mem_otp_email'])){
	htmlMail($email,$sub,$name,"",$_SESSION["otp"]); #Make active after server is online 
	echo $_SESSION['mem_otp_email'];
	$email = $_SESSION['mem_otp_email'];
	echo $html1;
}else if (isset($_SESSION['mem_email'])){
	htmlMail($email,$sub,$name,"",$_SESSION["otp"]);  #Make active after server is online
	echo $_SESSION['mem_email'];
	$email = $_SESSION['mem_email'];
	echo $html2;
}

?>