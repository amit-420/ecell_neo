<?php 


	function account_creation($db_connect,$mem_pass){
		include('config/confirmmail.php');
		$mem_name = $_SESSION['userdata'][0];
		$mem_email = $_SESSION['userdata'][1];
		$mem_number = $_SESSION['userdata'][2];
		$mem_pass = sha1($mem_pass);
		$mem_clgname = $_SESSION['userdata'][3];
		$parents_no = $_SESSION['userdata'][4];
		$class = $_SESSION['userdata'][5];
		$other_school_name = $_SESSION['userdata'][6];
		$mem_dob = $_SESSION['userdata'][7];
		$mem_address = $_SESSION['userdata'][8];

		$query3 = "CREATE TABLE IF NOT EXISTS `$mem_clgname`(
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			mem_name VARCHAR(255) NOT NULL,
			mem_email VARCHAR(255) NOT NULL,
			mem_number VARCHAR(20) NOT NULL,
			mem_class VARCHAR(10) NOT NULL,
			parents_no VARCHAR(15) NOT NULL,
			mem_dob DATE,
			mem_address VARCHAR(255) NOT NULL,
			marks INT(10) NOT NULL
			)";
		$query2 = "INSERT INTO user_login_data
				(`id`,`mem_name`, `mem_email`, `mem_pass`, `mem_number`, `mem_clgname`, `payment_status`, `exam_status`, `marks`,`class`,`parents_no`,`optional_school_name`,`mem_dob`,`mem_address`) 
				VALUES ('NULL', '$mem_name', '$mem_email', '$mem_pass', '$mem_number', '$mem_clgname', '0', '0', '0','$class','$parents_no','$other_school_name','$mem_dob','$mem_address') ;";
		$query1 = "INSERT INTO `$mem_clgname` (`id`,`mem_name`, `mem_email`,`mem_number`,`mem_class`,`parents_no`,`mem_dob`,`mem_address`,`marks`) VALUES ('NULL', '$mem_name','$mem_email','$mem_number','$class','$parents_no','$mem_dob','$mem_address','0') ";
		
		$result1 = mysqli_multi_query($db_connect,$query1);

		
		
		$sub="Confirmemail";
		$event="Welcome aboard your email is confirmed";
		htmlMail($mem_email,$sub,$mem_name,"",$event); //Uncomment after server is online
		
		if($result1){
			$result2 = mysqli_multi_query($db_connect,$query2);
			if($result2){
			header("Location:login.php");
			echo "Data stored succesfully by updating existing data" . mysqli_error($db_connect);
			}else{
				echo  "Error: " . "<br>" . mysqli_error($db_connect);
			}
		}else{
			$result3 = mysqli_multi_query($db_connect,$query3);
			if($result3){
				$result1 = mysqli_multi_query($db_connect,$query1);
				$result2 = mysqli_multi_query($db_connect,$query2);
				if($result2 and $result1){
					header("Location:login.php");
					echo "Data stored succesfully by updating existing data" . mysqli_error($db_connect);
				}else{
					echo  "Error: " . "<br>" . mysqli_error($db_connect);
				}
			echo  "Error: " . "<br>" . mysqli_error($db_connect);
		}
		}
			
	}


	function login_func($db_connect){
		include("../Questionarray.php");

		// username and password sent from form 
		
		$myusername = mysqli_real_escape_string($db_connect,$_POST['mem_email']);
		$mypassword = sha1(mysqli_real_escape_string($db_connect,$_POST['mem_pass'])); 
		
		$sql = "SELECT * FROM user_login_data WHERE mem_email = '$myusername' and mem_pass = '$mypassword'";
		$result = mysqli_query($db_connect,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//$active = $row['active'];
		
		$count = mysqli_num_rows($result);
		
		// If result matched $myusername and $mypassword, table row must be 1 row
			
		if($count == 1) {
			
			// Here we will check if student has logged in in designeted time;
			
			
			//if(!in_array($row['mem_clgname'],$allowed_schools)){
				//echo "exam not started yet";
				//header("Location: ../timetable.php");
			
			//}else{
				session_start();
				$_SESSION['mem_email'] = $row['mem_email'];
				$_SESSION['selected_q_np'];
				
				$_SESSION['no_of_submited_qn'] = array();
				$_SESSION['mem_clgname'] = $row['mem_clgname']; 
				
				$_SESSION['payment_status'] = $row['payment_status'];
				$_SESSION['exam_status'] = $row['exam_status'];
				header("location:../rules.php");
				echo " U are Logged in";
			//}
		
		
		}else{
			$error =  "Wrong password";
		}
	}

	
 ?>
