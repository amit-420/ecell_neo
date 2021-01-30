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

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css" />

</head>
    <?php
    if($_SESSION['payment_status'] == True and $_SESSION['exam_status'] == false and in_array($_SESSION['mem_clgname'],$allowed_schools)) {?>
    <body id="rules-body">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
          <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
        </a>

      </nav>
        <h1 class=" pt-4">Exam Rules</h1>
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
         <input class="btn btn-primary" type="submit" name="to_portal" value="Start the Exam" >
         </form>
    </body>
    <?php } else if($_SESSION['payment_status'] == false and $_SESSION['exam_status'] == false){?>
        <body>
          <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#">
              <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
            </a>

          </nav>
        <h4 class="text-center pt-4">Your payment is overdue.</h4>
        <p class="text-center">Click the button below to pay the fee and resume with exam</p>
         <form class="text-center pt-3">
           <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_FtzC22qacomokD"> </script>
         </form>
          <form action="pay.php" method="post">
            <table>
              <tbody>
                <tr>
                  <th>Name</th>
                </tr>
                <tr>
                  <td><input type="text" name="CUSTOMER_NAME" value="Yogendra Tomar"></td>
                </tr>
                <tr>
                  <th>Customer Email</th>
                </tr>
                <tr>
                  <td><input type="text" name="CUSTOMER_EMAIL" value="info@myinboxhub.co.in"></td>
                </tr>
                <tr>
                  <th>Customer Mobile</th>
                </tr>
                <tr>
                  <td><input type="text" name="CUSTOMER_MOBILE" value="Youtube"></td>
                </tr>
                <tr>
                  <th>Payment Amount in subscurrency</th>
                </tr>
                <tr>
                  <td><input type="text" name="PAY_AMT" value="10000"></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Pay Now"></td>
                </tr>
              </tbody>
            </table>
          </form>

        <div class="text-center">
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
            <h4 class="text-center pt-4">Sorry your exam is not sheduled now, Checkout the timetable below</h4>
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
