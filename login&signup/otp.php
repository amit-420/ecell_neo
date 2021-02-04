<?php
session_start();
include("config/db.php");
include("config/confirmmail.php");
include("funs.php");
$random_verification_code = rand(1000,9999);
$_SESSION["otp"]=$random_verification_code;
 
$sub="OTP for Verification";
$name="Dear Participant";
$error="";
$event = "Your OTP:". $_SESSION['otp'] ;

if(isset($_SESSION['mem_otp_email'])){ //forget password
	$email = $_SESSION['mem_otp_email'];
	htmlMail($email,$sub,$name,"",$event); #Make active after server is online 
	//echo $_SESSION['mem_otp_email'];
	$email = $_SESSION['mem_otp_email'];
	//echo $html1;

	$title="Recover Password";
	$button_name = "otpverifyButton1";
	$page_title = "Recover Password";
	if(isset($_SESSION['wrongotp1'])){
		$error = "you entered wrong otp. new otp has been sent again";
		unset($_SESSION['wrongotp1']);
	}

}else if (isset($_SESSION['mem_email'])){  // Set password
	$email = $_SESSION['mem_email'];
	htmlMail($email,$sub,$name,"",$event);  #Make active after server is online
	//echo $_SESSION['mem_email'];
	$email = $_SESSION['mem_email'];
	//echo $html2;

	$title="Set Password";
	$button_name = "otpverifyButton2";
	$page_title = "Set Password";
	if(isset($_SESSION['wrongotp2'])){
		$error = "you entered wrong otp. new otp has been sent again";
		unset($_SESSION['wrongotp2']);
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- external css  -->
	<link rel="stylesheet" href="css/forgetCSS.css">
    <!-- Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
	<!-- favicon  -->
    <link rel="shortcut icon" href="../public/img/2.png" type="image/x-icon">
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100 pt-5 p-3 rounded">
	<div class="row">
		<form action="otpverify.php" method="POST">
			<div class="title pb-4">
				<h1 style="color:white;"><?php echo $page_title; ?></h1>
			</div>
			<div>
				<p style="color:red;">Kindly check your Email for OTP.</p>
			</div>
			<div class="form-group">
				<label style="color:white;">Enter OTP:</label>
				<input placeholder="Enter OTP" type="integer" id="otp" name="mem_otp" class="form-control rounded-pill" required>
				<div class="text-danger"><?php echo $error; ?></div>
			</div>
			<div class="form-group">
				<button type="Submit" name="<?php echo $button_name; ?>" class="btn btn-danger btn-block rounded-pill" >Verify</button>
			</div>    
		</form>
	</div>
</div>
</body>
</html>



