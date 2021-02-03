<?php
include('config/db_connect.php');
include('config/session_verification.php');
include('Questionarray.php');
if(isset($_POST['to_portal'])){

    header('Location: portal.php');
}elseif (isset($_POST['loginpage'])){
    session_unset();
    session_destroy();
    header('Location: login&signup/login.php');
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Instructions</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- external css  -->
  <link rel="stylesheet" href="css/forgetCSS.css">
  <!-- favicon  -->
  <link rel="shortcut icon" href="public/img/2.png" type="image/x-icon">

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">

  

</head>
    <?php
    if($_SESSION['payment_status'] == True and $_SESSION['exam_status'] == false and in_array($_SESSION['mem_clgname'],$allowed_schools)) {?>
    <body id="rules-body">
      <div class="container align-items-center justify-content-center min-vh-100 pt-5 p-3 rounded">
        <nav class="navbar navbar-expand-lg navbar-light ">
          <a class="navbar-brand" href="#">
            <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
          </a>

        </nav>
          <h2 class=" pt-4">Exam Rules</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Pellentesque vitae tempus velit, sit amet condimentum lacus.
          In et mi sit amet augue auctor cursus. Ut ultrices, risus
          sit amet fermentum volutpat, purus purus eleifend ex, id
          pharetra erat quam eget nibh. Ut facilisis eget felis
          condimentum imperdiet. Mauris varius, sapien eget posuere
          imperdiet, metus eros iaculis nunc, at lacinia ex augue non
          orci. Proin vitae lobortis eros, laoreet consectetur quam. Orci
          varius natoque penatibus et magnis dis parturient montes,
          nascetur ridiculus mus. In quis hendrerit mi, nec feugiat
          sem. Donec a ipsum eu nibh venenatis commodo. Sed non
          interdum diam, vel scelerisque mi.</p>

          <p>
            <strong class="semi-bold">Make sure you understand the instructions before starting the exam.</strong>
          </p>
          <form action="rules.php" method="POST">
            <div class="text-center">
            <input class="btn btn-danger text-center rounded-pill" type="submit" name="to_portal" value="Start the Exam" >
            </div>
          </form>
      </div>
    </body>
    <?php } else if($_SESSION['payment_status'] == false and $_SESSION['exam_status'] == false){?>
    <body style="background-image: url('images/signup.jpg');">
          <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="https://neo.ecellvnit.org/">
              <img src="public/img/neoLogo.png" alt="NEO logo" style="height: 170px;"/>
            </a>

          </nav>
        <h4 style="color:white;" class="text-center pt-4">Your payment is overdue.</h4>
        
        <!-- This is the payment button which will be added in case of automatic payment failure 
        <p class="text-center">Click the button below to pay the fee and resume with exam</p>
         <form class="text-center pt-3">
           <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_FtzC22qacomokD"> </script>
         </form>
        -->  

        <div class="container d-flex align-items-center justify-content-center min-vh-100 p-3 pt-2 rounded">
          <div class ="row">
            <form action="pay.php" method="POST">
              <div class="form-group">
                <label style="color:white;" for="CUSTOMER_NAME">Name</label>
                <input placeholder="Enter Name" type="text" id="CUSTOMER_NAME" name="CUSTOMER_NAME" class="form-control rounded-pill" required>
              </div>
              <div class="form-group">
                <label style="color:white;" for="CUSTOMER_EMAIL">Registered E-mail</label>
                <input placeholder="Enter Email" type="email" id="CUSTOMER_EMAIL" name="CUSTOMER_EMAIL" class="form-control rounded-pill" required>
              </div>
              <div class="form-group">
                <label style="color:white;" for="CUSTOMER_MOBILE">Contact Number</label>
                <input placeholder="Enter Contact Number" type="number" id="CUSTOMER_MOBILE" name="CUSTOMER_MOBILE" class="form-control rounded-pill" required>
              </div>
              <div class="form-group">
                <label style="color:white;" for="CUSTOMER_PAYMENT">To proceed further kindly pay Rs.100 </label>
                <!-- <?php echo $_SESSION['mem_email'] ?> -->
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-danger btn-block rounded-pill"> Pay Now </button>
              </div>
            </form>
          </div>
        </div>

        <div class="text-center pb-5">
          <img src="images/Untitled-2-02.jpg" alt="payment graphic" width="500px" />
        </div>

    </body>
    <?php } else if($_SESSION['payment_status'] == true and $_SESSION['exam_status'] == true ){?>
      <body>

        <nav class="navbar navbar-expand-lg navbar-light ">
          <a class="navbar-brand" href="#">
            <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
          </a>

        </nav>
          <h4 class="text-center pt-4">We appreciate your enthusiasm but you can give the exam only once.</h4>
          <form action="rules.php" class="text-center pt-4" method="POST">
              <input type="submit" class="btn btn-primary" name="loginpage" value="Login Again" >
          </form>

      </body>
    <?php } else if(!in_array($_SESSION['mem_clgname'],$allowed_schools) and $_SESSION['payment_status'] == true){ ?>
      <body>

          <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#">
              <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
            </a>

          </nav>
            <h4 class="text-center pt-4">
            <b>If the student will be writing exam with his own school</b><br>
            “Your time slot for the test will be initiated through your school and on your
            registered email as well”<br><br>
            <b>If the student is independently writing the exam</b><br>
            “Your exam slot will be initiated soon through your registered email id”
            </h4>
            <form action="rules.php" class="text-center pt-4" method="POST">
                <input type="submit" class="btn btn-primary" name="loginpage" value="Login Again" >
            </form>

      </body>
    <?php } ?>


  <!-- Bootstrap javascript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>
