<?php

require_once 'db.php';
require_once 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

$keyId = 'rzp_test_NoO0kaf06jWShb';
$secretKey = 'REbcdbdFTaRYc6K8LmKNJeKj';
$api = new Api($keyId, $secretKey);

$CUSTOMER_NAME = $_POST['CUSTOMER_NAME'];
$CUSTOMER_EMAIL = $_POST['CUSTOMER_EMAIL'];
$CUSTOMER_MOBILE = $_POST['CUSTOMER_MOBILE'];
$PAY_AMT = $_POST['PAY_AMT'];



// To create order to RazorPay
$order = $api->order->create(array(
    'receipt' => rand(1000, 9999) . 'ORD',
    'amount' => $PAY_AMT,
    'payment_capture' => 1,
    'currency' => 'INR',
    )
);

?>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<form action="success.php" method="POST">

    <script 
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $keyId ?>"
        data-amount="<?php echo $order->amount ?>"
        data-currency="INR"
        data-order_id="<?php echo $order->id ?>"
        data-buttontext="Pay with Razorpay"
        data-name="Myinboxhub"
        data-description="For Donation"
        data-image="<?php echo 'https://myinboxhub.co.in/data/logo/logo.png'; ?>"
        data-prefill.name="<?php echo $CUSTOMER_NAME; ?>"
        data-prefill.email="<?php echo $CUSTOMER_EMAIL; ?>"
        data.prefill.contact="<?php echo $CUSTOMER_MOBILE; ?>"
        data-theme.color="#f0a43c"
    ></script>
    <input type="hidden" custom="Hidden Element" name="hidden">

</form>