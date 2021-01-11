<?php
session_start();
include("config/db.php");
include("funs.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Set PASSWORD</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
	
	<div class="jumbotron">
		<h1>SET Password</h1>
	</div>

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4">
			
        <form action="" method="POST">
            <div class="form-group">
					<label>Enter Password</label>
					<input type="password" id="mem_new_pass" name="mem_new_pass" class="form-control" required>
			</div>
            <div class="form-group">
					<label>Confirm Password</label>
					<input type="password" id="mem_conf_pass" name="mem_conf_pass" class="form-control" required>
			</div>

			<div class="form-group">
					<button type="login" name="changepassButton" class="btn btn-primary btn-block" >Set Password</button>
            </div>
            
			        
						
		  
            
        </form>
    </div>  
</div>
<?php


if (isset($_POST['changepassButton'])) {
    $mem_new_pass=$_POST["mem_new_pass"];
    $mem_conf_pass=$_POST["mem_conf_pass"];
    if($mem_new_pass == $mem_conf_pass){
        account_creation($db_connect);
        header("location:login.php");    
        
  
    
    }else{
        echo "Passwords did not match";
    }
}

?>
</body>
</html>


