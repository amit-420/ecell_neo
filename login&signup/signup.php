

<!-- DEEPAK please remove the image from this page as well as the login page -->

<?php
    session_start();
	include("config/db.php");
	include("config/confirmmail.php");
	include("funs.php");
	$error = '';
	if (isset($_POST['signupButton'])) {
		//if($_POST['con_mem_pass'] == $_POST['mem_pass']){

			
			$_SESSION['mem_email'] = $_POST['mem_email'];
			$email= $_SESSION['mem_email'];
			
			$_SESSION['userdata'] = array($_POST['mem_name'],$_POST['mem_email'],$_POST['mem_number'],$_POST['mem_clgname']);

			$query_select = mysqli_query($db_connect, "SELECT * from user_login_data where mem_email = '$email' ");

			$checkpoint = mysqli_num_rows($query_select);

			echo $checkpoint;
		
			if ($checkpoint==0) {
				header("Location:otp.php");
				//account_creation($db_connect);

			}else{

				$error = "Email already exists. Sign In!";

			}

		// }else{
		// 		$error = "Those passwords didn't match. Try again.";
		// }
	}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup</title>
	<!-- Bootstrap CSS  -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- eXTERNAL css  -->
	<link rel="stylesheet" href="assets/css/login.css">
	<!-- font styles  -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="../images/log.png" alt="NEO logo" style="height: 70px;"/>
    </a>

  </nav>

<!-- Signup Design start  -->
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters justify-content-center">
          <div class="col-md-5 d-md-none d-lg-block">
            <img src="../images/signup.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
			  	<img src="assets/images/logo-ecell-sm.png" alt="logo" class="logo"> <br><br><h4><b>E-Cell VNIT </b></h4>
              </div>
              <p class="login-card-description">Create Account</p>
				<form action="signup.php" method="POST">


				<div class="form-group">
					<label>Full Name</label>
					<input type="text" name="mem_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="mem_email" class="form-control" required>
					<div class="text-danger"><?php echo $error; ?></div>
				</div>
				
				<div class="form-group">
					<label>Mobile Number</label>
					<input type="numbers" name="mem_number" class="form-control" required>
				</div>
				<!-- <div class="form-group">
					<label>Password</label>
					<input type="password" name="mem_pass" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="con_mem_pass" class="form-control" required>
				</div> -->
				<div class="form-group">
					<label for="mem_clgname">Select your College:</label>
					<select class="dropdown-toggle" name="mem_clgname" id="mem_clgname" required>
						<option value="vnit"> VNIT, Nagpur</option>
						<option value="iiiit"> iiiT, Nagpur</option>
						<option value="vit"> VIT, Nagpur</option>
					</select>

				</div>
				

				<div class="form-group">
					<button type="submit" name="signupButton" class="btn btn-block login-btn mb-4" >Sign Up!</button>
				</div>



			</form>
                <p class="login-card-footer-text">Already have an account? <a href="login.php" name="loginButton" class="text-reset">Sign into your account</a></p>
                <nav class="login-card-footer-nav">
				Copyright: <a href="ecellvnit.org">E-Cell VNIT </a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

	<div><?php echo $error; ?></div>

	 <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
