



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
			
			$_SESSION['userdata'] = array($_POST['mem_name'],$_POST['mem_email'],$_POST['mem_number'],$_POST['mem_clgname'],$_POST['mem_par_number'],$_POST['class'],$_POST['other_school_name'],$_POST['mem_dob'],$_POST['mem_address']);

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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS  -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- eXTERNAL css  -->
	<link rel="stylesheet" href="assets/css/login.css">
	<!-- favicon  -->
    <link rel="shortcut icon" href="../public/img/2.png" type="image/x-icon">
	<!-- font styles  -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	  <style>
	  	.dropbtn {
		background-color: white;
		color: black;;
		padding: 5px;
		font-size: 14px;
		border-radius: 5px;
		/* cursor: pointer; */
		}
	  </style>
</head>
<script>      
  function checkIfYes() {
      if (document.getElementById('mem_clgname').value == 'others') {
        document.getElementById('extra').style.display = '';
        document.getElementById('auth_by').disabled = false;
        document.getElementById('desc').disabled = false;
      } else {
        document.getElementById('extra').style.display = 'none';
  }
}

$(function() {
		$( "#datepicker-12" ).datepicker();
		$( "#datepicker-12" ).datepicker("setDate", "10w+1");
		$( "#datepicker-12" ).datepicker("show");
		});
</script>
				

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="https://neo.ecellvnit.org/">
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
					<label>Date of Birth</label><br>
					<input type = "date" name="mem_dob" id = "datepicker-12" required>
				</div>
				<div class="form-group">
					<label>Mobile Number</label>
					<input type="numbers" name="mem_number" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Parents Number</label>
					<input type="numbers" name="mem_par_number" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="mem_address" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="class"></label>
					<select class="dropbtn" type="button" data-toggle="dropdown" name="class" id="class" required>
						<option value="">Select your Class</option>
						<option value="7"> 7 th</option>
						<option value="8"> 8 th</option>
						<option value="9"> 9 th</option>
						<option value="10"> 10 th </option>
					</select>

				</div>
				<div class="form-group dropdown">
					<label for="mem_clgname"></label>
					<select onchange='checkIfYes()' class="dropbtn" type="button" data-toggle="dropdown" name="mem_clgname" id="mem_clgname" required>
						<option value="">Select your School</option>
						<option value="achievers_school"> Achievers School </option>
						<option value="adarsh_sanskar_vidya_nagpur"> Adarsh Sanskar Vidyalaya, Nagpur</option>
						<option value="adarsh_vidya_mandir_nagpur"> Adarsh Vidya Mandir, Nagpur </option>
						<option value="allen_nagpur"> Allen, Nagpur</option>
						<option value="dps_lava"> D.P.S, lava </option>
						<option value="hadas_cbse_school"> Hadas CBSE School </option>
						<option value="icad_amravati"> ICAD, Amravati </option>
						<option value="icad_nagpur"> ICAD, Nagpur </option>
						<option value="icad_pune"> ICAD, Pune </option>
						<option value="jawahar_navodaya_gondia"> Jawahar Navodaya, Gondia </option>
						<option value="jnv_ahmednagar"> JNV, Ahmednagar </option>
						<option value="l_n_soni"> L.N.Soni </option>
						<option value="mordern_school_koradi"> Mordern School, Koradi Road </option>
						<option value="r_s_mundle"> R S Mundle </option>
						<option value="ryan_international_kandivali"> Ryan International, Kandivali </option>
						<option value="sfs_high_school"> SFS High School </option>
						<option value="gg_sharda_higher_school"> Smt. G.G Sharda Higher English School </option>
						<option value="somalwar_school"> Somalwar School </option>
						<option value="sos_beltarodi_nagur"> SOS (Beltarodi), Nagpur </option>
						<option value="st_xaviers"> St.Xaviers </option>
						<option value="star_point_school"> Star Point School </option>
						<option value="tejaswini_vidyamandir"> Tejaswini Vidyamandir </option>
						<option value="wardha_wardha"> Wardha School, Wardha </option>
                        <option value="others"> OTHERS </option>
					</select>
				</div>
				<!--
				<div class="form-group">
					<label class="control-label">Is your school not in the list ?</label>
					<select onchange='checkIfYes()' class="select form-control" id="defect" name="defect">
					<option id="No" value="No">No</option>
					<option id="Yes" value="Yes">Yes</option>
					</select>
				</div>
				-->
				<div id="extra" name="other_school_name" style="display: none">

					<!-- <label class="control-label" for="desc">Description</label>
					<input class="form-control" type="text" id="desc" name="desc" required disabled> -->
					<label>School Name</label>
					<input type="numbers" name="other_school_name" class="form-control" placeholder="If your school is not in the above list" default="null">

				</div>
				<!-- <div class="form-group">
					<label>school name</label>
					<input type="numbers" name="other_school_name" class="form-control" placeholder="If your school is not in the above list" default="null">
				</div> -->

				<div class="form-group">
					<button type="submit" name="signupButton" class="btn btn-block login-btn mb-4" >Sign Up!</button>
				</div>



			</form>
                <p class="login-card-footer-text">Already have an account? <a href="login.php" name="loginButton" class="text-reset"><b>Sign into your account</b></a></p>
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
