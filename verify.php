<?php

require('config.php');
require('config/db_connect.php');
include('login&signup/config/confirmmail.php');
session_start();

//Add db connections here


require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

$actual_cust_email = $_SESSION['mem_email'];
if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $razorpay_signature = $_POST['razorpay_signature'];


    $sql3 = "UPDATE `user_login_data` SET `order_id` = '$razorpay_order_id', `razor_payment_id`= '$razorpay_payment_id',`payment_status` = '1' WHERE `user_login_data`.`mem_email` = '$actual_cust_email';";
    $result = mysqli_multi_query($conn,$sql3);
    if($result){
        $html = "<p>Your payment was successful</p>
            <p>$razorpay_order_id</p>
            <p>$razorpay_payment_id</p>
            <p>$razorpay_signature</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p>$actual_cust_email</p>";
        header("Location: success.php");
        $sub = "Payment Successfull";
        $name = "NEO participant";
        $event = "Your payment is succesfull, your payment ID is: {$_POST['razorpay_payment_id']}\n Follow this link for study material:  https://drive.google.com/drive/folders/1TPiCePY-ij8FrYm36b3Z6ZY0VeEw0JRm ";
        htmlMail($actual_cust_email,$sub,$name,"",$event);
        session_unset();
        session_destroy();

    }else{
        $html = '<p> <?php echo  "Error: " . $sql3 . "<br>" . mysqli_error($conn);?> </p>';
        echo  "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
    
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
