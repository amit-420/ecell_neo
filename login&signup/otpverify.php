<?php
session_start();
if (isset($_SESSION['mem_email'])){

    //unset($_SESSION['mem_email']);

}
if (isset($_POST['otpverifyButton1'])) {
    
    $mem_otp=$_POST["mem_otp"];
    if($mem_otp == $_SESSION["otp"]){
        //echo "u can change the password";
        header("Location:changepass.php");
    }
    else{
        $_SESSION['wrongotp1'] = 1;
        header("Location:otp.php");
    }
}else if(isset($_POST['otpverifyButton2'])){
    $mem_otp=$_POST["mem_otp"];
    if($mem_otp == $_SESSION["otp"]){
        //echo "u can change the password";
        header("Location:setpass.php");
    }
    else{
        $_SESSION['wrongotp2'] = 1;
        header("Location:otp.php");
    }
}
?>