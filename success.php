<?php 

require_once 'db.php';
if(isset($_POST['login'])){
    header('Location: login&signup/login.php');
}
?>
<!Doctype html>
<html>
    <head>
      <meta charset="utf-8" />

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css" />

      <Script>
          localStorage.clear();
      </Script>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
          <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
        </a>

      </nav>
        <h4 class="text-center">Your payment is succesfull , you can now login.</h4>
        <form action="success.php" method="POST" class="text-center pt-4">
            <input type="submit" class="btn btn-primary" name="login" value="Login Again" >
        </form>
    </body>
</html>