'<?php 
include('config/db_connect.php');
include('Questionarray.php');
//include('config/session_verification.php');
#require('functions.php');
if(isset($_POST['change_payment_status'])){
    $e = $_POST['change_payment_status'];
    $changed_value = 1 - $e;
    //echo $changed_value;
    $mem_email = $_POST['mem_email'];
    $sql3 = "UPDATE `user_login_data` SET `payment_status`= '$changed_value' WHERE `user_login_data`.`mem_email` = '$mem_email';";
    
    $result = mysqli_multi_query($conn,$sql3);
    session_start();
    
    $_SESSION['is_admin_logged_in'] = "started_session";
    if($result){
        //echo "Data stored succesfully by updating existing data";
    }else{
         echo  "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
}
elseif(isset($_POST['change_exam_status'])){
    $e = $_POST['change_exam_status'];
    $changed_value = 1 - $e;
    
    $mem_email = $_POST['mem_email'];
    $sql3 = "UPDATE `user_login_data` SET `exam_status`= '$changed_value' WHERE `user_login_data`.`mem_email` = '$mem_email';";
    $result = mysqli_multi_query($conn,$sql3);
    
    session_start();
	$_SESSION['is_admin_logged_in'] = "started_session";
   
    if($result){
        //echo "Data stored succesfully by updating existing data";
    }else{
        echo  "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
}elseif(isset($_POST['submit'])){
    if($_POST['username'] == "ecell" and $_POST['password'] == "password"){
        session_start();
        $_SESSION['is_admin_logged_in'] = "started_session";
        $_SESSION['selected_school'] = $_POST['mem_clgname'];
    }else{
        echo "Password or username is incorrect";
    }
}elseif(isset($_POST['logout'])){
    session_unset();
}

?>
<?php if(!isset($_SESSION['is_admin_logged_in'])){?>
    <!Doctype html>
    <html lang="en">
        <form action="admin.php" method="post">
            <label>Username</label>
            <input type="text" name="username" > <br> <br>
            <label>Password</label>
            <input type="password" name="password"> <br><br> <br>
            <div class="form-group">
					<label for="mem_clgname">Select your College:</label>
					<select class="dropdown-toggle" name="mem_clgname" id="mem_clgname" required>
						<option value="achievers_school"> Achievers School </option>
						<option value="adarsh_sanskar_vidya_nagpur"> Adarsh Sanskar Vidyalaya, Nagpur</option>
						<option value="adarsh_vidya_mandir_nagpur"> Adarsh Vidya Mandir, Nagpur </option>
						<option value="agarval_coaching_classes" >Agarwal Coaching classes, Nagpur</option>
						<option value="allen_nagpur"> Allen, Nagpur</option>
						<option value="Bal_shivaji_akola"> Bal Shivaji School Akola </option>
						<option value="bharat_vidyalay_akola"> Bharat Vidyalaya, Akola </option>
						<option value="dps_lava"> D.P.S, lava </option>
						<option value="hadas_cbse_school"> Hadas CBSE School </option>
						<option value="icad_amravati"> ICAD, Amravati </option>
						<option value="icad_nagpur"> ICAD, Nagpur </option>
						<option value="icad_pune"> ICAD, Pune </option>
						<option value="jawahar_navodaya_gondia"> Jawahar Navodaya, Gondia </option>
						<option value="jnv_ahmednagar"> JNV, Ahmednagar </option>
						<option value="jubilee_english_high_school_akola"> Jubilee English High School Akola </option>
						<option value="lifeline_higher_secondary_school_manawar"> Lifeline Higher Secondary School Manawar </option>
						<option value="lions_junior_college_manawar"> Lions Junior College Manawar </option>
						<option value="l_n_soni"> L.N.Soni </option>
						<option value="mordern_school_koradi"> Mordern School, Koradi Road </option>
						<option value="myboli_coaching_classes"> Myboli Coaching Classes </option>
						<option value="podar_international_akola"> Podar International, Akola </option>
						<option value="r_s_mundle"> R S Mundle </option>
						<option value="ryan_international_kandivali"> Ryan International, Kandivali </option>
						<option value="samarth_public_school_akola"> Samarth Public School, Akola </option>
						<option value="sfs_high_school"> SFS High School </option>
						<option value="gg_sharda_higher_school"> Smt. G.G Sharda Higher English School </option>
						<option value="somalwar_school"> Somalwar School </option>
						<option value="sos_beltarodi_nagur"> SOS (Beltarodi), Nagpur </option>
						<option value="st_xaviers"> St.Xaviers </option>
						<option value="star_point_school"> Star Point School </option>
						<option value="pyramid_tutorials">Pyramid tutorials Nagpur </option>
						<option value="tejaswini_vidyamandir"> Tejaswini Vidyamandir </option>
						<option value="vedant_school_manawar"> Vedant School Manawar </option>
						<option value="vivekanand_akola"> Vivekanand Akola </option>
						<option value="wardha_wardha"> Wardha School, Wardha </option>
                        <option value="others"> OTHERS </option>
                        <option value="full_database"> Full Database </option>
					</select>
			</div>
            <input type="submit" name="submit" value="login">
        </form>
    </html>
<?php } elseif($_SESSION["selected_school"] == "full_database"){ // for Displaying Full Database.
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/ajax.js"></script>
</head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Manage Users</b></h2>
                    </div >
                    
                </div>
            </div> <br>
            <div class="col-sm-6"> <form method="post" action="admin.php"><input type="submit" name="logout" value= "Logout"></form></div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>SL NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
						<th>PHONE</th>
                        <th>School Name</th>
                        <th>Others School</th>
                        <th>Payment Status</th>
                        <th>Exam Status</th>
                        <th>Marks</th>
                        <th>Class</th>
                        <th>Razor payment id</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
                $mem_clgname = $_SESSION['selected_school'];
				$result = mysqli_query($conn,"SELECT * FROM user_login_data ORDER BY payment_status,exam_status ASC");
					$i=1;
					while($row = mysqli_fetch_array($result)){
				?>
				<tr id="<?php echo $row["id"]; ?>">
				
					<td><?php echo $i; ?></td>
					<td><?php echo $row["mem_name"]; ?></td>
					<td><?php echo $row["mem_email"]; ?></td>
					<td><?php echo $row["mem_number"]; ?></td>
					<td><?php echo $row["mem_clgname"]; ?></td>
                    <td><?php echo $row["optional_school_name"]; ?></td>
                    <td>
                    <form action="admin.php" method="post"> 
                    <input type="hidden" name="mem_email" value="<?php echo $row["mem_email"]?>">
                    <input type="submit" class="col-md-2" name="change_payment_status" value="<?php echo $row['payment_status'] ?>"/>
                    </form> 
                    </td>
                    <td>
                    <!-- <form action="admin.php" method="post">  -->
                    <input type="hidden" name="mem_email" value="<?php echo $row["mem_email"]?>">
                    <input type="submit" class="col-md-2" name="change_exam_status" value="<?php echo $row['exam_status'] ?>"/>
                        <!-- </form> -->
                    </td>
                    <td><?php echo $row["marks"]; ?></td>
                    <td><?php echo $row["class"]; ?></td>
                    <td><?php echo $row["razor_payment_id"]; ?></td>
                </td>
                    
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->



</body>
</html>  <?php }



else {?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/ajax.js"></script>
</head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Manage Users</b></h2>
                    </div >
                    
                </div>
            </div> <br>
            <div class="col-sm-6"> <form method="post" action="admin.php"><input type="submit" name="logout" value= "Logout"></form></div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>SL NO</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
						<th>PHONE</th>
                        <th>School Name</th>
                        <th>Others School</th>
                        <th>Payment Status</th>
                        <th>Exam Status</th>
                        <th>Marks</th>
                        <th>Class</th>
                        <th>Razor payment id</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
                $mem_clgname = $_SESSION['selected_school'];
				$result = mysqli_query($conn,"SELECT * FROM user_login_data WHERE mem_clgname = '$mem_clgname' ORDER BY payment_status,exam_status ASC");
					$i=1;
					while($row = mysqli_fetch_array($result)){
				?>
				<tr id="<?php echo $row["id"]; ?>">
				
					<td><?php echo $i; ?></td>
					<td><?php echo $row["mem_name"]; ?></td>
					<td><?php echo $row["mem_email"]; ?></td>
					<td><?php echo $row["mem_number"]; ?></td>
					<td><?php echo $row["mem_clgname"]; ?></td>
                    <td><?php echo $row["optional_school_name"]; ?></td>
                    <td>
                    <form action="admin.php" method="post"> 
                    <input type="hidden" name="mem_email" value="<?php echo $row["mem_email"]?>">
                    <input type="submit" class="col-md-2" name="change_payment_status" value="<?php echo $row['payment_status'] ?>"/>
                    </form>
                    </td>
                    <td>
                    <!-- <form action="admin.php" method="post">  -->
                    <input type="hidden" name="mem_email" value="<?php echo $row["mem_email"]?>">
                    <input type="submit" class="col-md-2" name="change_exam_status" value="<?php echo $row['exam_status'] ?>"/>
                        <!-- </form> -->
                    </td>
                    <td><?php echo $row["marks"]; ?></td>
                    <td><?php echo $row["class"]; ?></td>
                    <td><?php echo $row["razor_payment_id"]; ?></td>
                </td>
                    
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->



</body>
</html>  <?php } ?>  