<?php
session_start();
include("config/db.php");
include("config/confirmmail.php");
include("funs.php");
$random_verification_code = rand(1000,9999);
$_SESSION["otp"]=$random_verification_code;
echo $random_verification_code;
 
$sub="OTPverify";
$name="user";




//htmlMail($email,$sub,$name,"",$_SESSION["otp"]);
?>
<?php $html1 =
'<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recover password</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
	
	<div class="jumbotron">
		<h1>Recover Password</h1>
	</div>

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4">
        <p>Check your Email for OTP</p>
			
        <form action="otpverify.php" method="POST">
            <div class="form-group">
					<label>Enter OTP:</label>
					<input type="integer" id="otp" name="mem_otp" class="form-control" required>
			</div>
            <div class="form-group">
					<button type="Submit" name="otpverifyButton1" class="btn btn-primary btn-block" >Verify</button>
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
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">

	
	<div class="jumbotron">
		<h1>Set Password</h1>
	</div>

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4">
        <p>Check your Email for OTP</p>
			

        <form action="otpverify.php" method="POST">
            <div class="form-group">
					<label>Enter OTP:</label>
					<input type="integer" id="otp" name="mem_otp" class="form-control" required>
			</div>
            <div class="form-group">
					<button type="Submit" name="otpverifyButton2" class="btn btn-primary btn-block" >Verify</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>'; ?>

<?php 
if(isset($_SESSION['mem_otp_email'])){
	//htmlMail($email,$sub,$name,"",$_SESSION["otp"]); Make active after server is online 
	echo $_SESSION['mem_otp_email'];
	$email = $_SESSION['mem_otp_email'];
	echo $html1;
}else if (isset($_SESSION['mem_email'])){
	//htmlMail($email,$sub,$name,"",$_SESSION["otp"]);  Make active after server is online
	echo $_SESSION['mem_email'];
	$email = $_SESSION['mem_email'];
	echo $html2;
}

?>