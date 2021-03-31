<?php
    include('config/db_connect.php');
    include('Questionarray.php');
    include('config/session_verification.php');
    require('functions.php');
    #echo "start " . $_SESSION['selected_q_no'];
    $error_message = " ";
    if(!isset($_SESSION['selected_q_no'])){
        //will Create the intial variable and fetch the question from questions array
        $_SESSION['selected_q_no'] = 1;
        $_SESSION['selected_question_details'] = question_selection_frompallete($questions);
        // echo " variable not available made available";
    }else{
        // echo 'variable available' . $_SESSION['selected_q_no'];
        $_SESSION['selected_question_details'] = question_selection_frompallete($questions);
    }
    /////////////////////////
    if(isset($_POST['logout'])){
        //will submit marks and redirect it to thnqu.php
        $marks = calculate_and_submit_marks($conn,$total_noof_questions,$marks_of_each_qn);
        setcookie("marks", $marks, 0, "/");
        header('Location: thnqu.php');
    }
    if(isset($_POST[$_SESSION['selected_q_no']])){
        $selected_question_no = $_SESSION['selected_q_no'];
        // echo " in from if submitqution   " . $selected_question_no; #good we are getting the output
        // echo $_POST['answer'];
        if(isset($_POST['answer'])){
            //$_SESSION['answer_of_question'][$selected_question_no] = $_POST['answer'];
            //print_r($_SESSION['answer_of_question']);
            //print_r($_SESSION['no_of_submited_qn']);
            cheacking_answer($conn,$answer_key);     // will check the submited answer and increase the no of right answer
            if($selected_question_no >= $total_noof_questions){
                $selected_question_no = 1;
                $_SESSION['selected_q_no'] = 1;
                $_SESSION['selected_question_details'] = question_selection_frompallete($questions);
            }else{
                $_SESSION['selected_question_details'] = question_selection_bynextbtn($questions,$selected_question_no);
                $_SESSION['selected_q_no'] += 1;
            }
        }else{
            $error_message = "Please select any one option to record";
            $_SESSION['selected_question_details'] = question_selection_frompallete($questions);
        }
    }elseif(isset($_POST['question_no_frompallete'])){
        $_SESSION['selected_q_no'] = $_POST['question_no_frompallete'];
        $_SESSION['selected_question_details'] = question_selection_frompallete($questions);
        // echo "in elseif statement";
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instructions</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css" />
  <!-- favicon  -->
  <link rel="shortcut icon" href="../public/img/2.png" type="image/x-icon">

</head>


<section>

  <script>
    "use strict";

    var nowa = new Date().getTime();

   if(localStorage.getItem('deadline') == null){
        var deadline =  nowa + (1000 * 60 * 40);
        localStorage.setItem('deadline',deadline)
        // deadline is written only if localstorage is empty
    }

    //document.write(localStorage.getItem('deadline'));

    function setTimer() {
        var deadline = localStorage.getItem('deadline');
        var now = new Date().getTime();
        //var t = deadline - now;
        var t = deadline - now;
        var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((t % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML = hours;
        document.getElementById("demo1").innerHTML = minutes;
        document.getElementById("demo3").innerHTML = seconds;

        if (t <= 0) {
                clearInterval(x);
                document.getElementById("done").innerHTML = "TIME IS UP!";
                window.location.replace("thnqu.php");
                localStorage.clear();
                }
        }
    var x = setInterval(function() { setTimer(); },1);

    </script>

</section>


<body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="images/log.png" alt="NEO logo" style="height: 70px;"/>
    </a>

  </nav>
  <div class="row timer mt-2 ml-3 text-right">
    <div class="col-7">

    </div>
      <div class="col-md-3">
        <span class="text-muted timer-text">Time Remaining</span>
      </div>
      <div class="col-md-2">
        <span id="demo"></span> :
        <span id="demo1"></span> :
        <span id="demo3"></span>
        <span id="done"></span>
      </div>

  </div>


  <section class="container grey-text pt-4">

      <?php
          $Q_no = $_SESSION['selected_question_details'][0];
          $question = $_SESSION['selected_question_details'][1];
          $option1 = $_SESSION['selected_question_details'][2];
          $option2 = $_SESSION['selected_question_details'][3];
          $option3 = $_SESSION['selected_question_details'][4];
          $option4 = $_SESSION['selected_question_details'][5];
          $checked1 = "";$checked2 = "";$checked3 = "";$checked4 = "";
          // echo "Q" . $Q_no;
          if(isset($_SESSION['answer_of_question'][$Q_no])){
              $previous_answer = $_SESSION['answer_of_question'][$Q_no];
              switch($previous_answer){
                  case "1":
                      $checked1 = "checked";
                  break;
                  case "2":
                      $checked2 = "checked";
                  break;
                  case "3":
                      $checked3 = "checked";
                  break;
                  case "4":
                    $checked4 = "checked";
                break;
                  default:
                      $checked1 = "";$checked2 = "";$checked3 = "";$checked4 = "";
                  break;
                  }
          }
      ?>
    </section>


      <!-- Bootstrap grid for layout of question palette and options -->
    <section class="desktop-only">
      <div class="container">
        <div class="row">

          <div class="col-md-8">

            <!-- Display question number and the question -->
            <p class="question-text" style="font-size: 1.3rem;">
              <strong><?php echo "Q. ". $Q_no . " " ?></strong><?php echo $question ?>
              <?php
                // if($image_url != "")
                //   { ?>
                   <!-- <div class="row">
                     <img height="400px" width="700px" src=<?php //echo $image_url ?> alt="Stickman"> 
                    </div>-->

              <?php //}else{ } ?>
            </p>

            <form class="white" action="portal.php" method="POST">

                <input type="radio" id="option1" name="answer" value="1" <?php echo $checked1?>>
                <label for="option1"><?php echo $option1?></label><br>

                <input type="radio" id="option2" name="answer" value="2" <?php echo $checked2?>>
                <label for="option2"><?php echo $option2 ?></label><br>

                <input type="radio" id="option3" name="answer" value="3" <?php echo $checked3?>>
                <label for="option3"><?php echo $option3 ?></label><br>
                
                <input type="radio" id="option4" name="answer" value="4" <?php echo $checked4?>>
                <label for="option4"><?php echo $option4 ?></label>

                <div class="col-md-6 pl-0">
                  <input type="submit" name="<?php echo $Q_no ?>" value="Save and Next Question" onclick="updateCookie(<?php echo $Q_no ?>)" class="btn btn-dark">
                </div>

            <h5><?php echo $error_message;?></h5>
            </form>
          </div>

          <div class="col-md-4 text-right pr-0">
            <h6 class="text-center">Question palette</h6>
            <div class="row text-center">

            <form action="portal.php" method="post">
                <?php for($i=1; $i <= $total_noof_questions; $i++)
                {?>
                <input type="submit" class="col-md-2 col-sm-2 col-xs-2 mb-1 ml-1 btn btn-outline-secondary <?php echo $i ?>" name="question_no_frompallete" value="<?php echo $i ?>" />
                <?php
                }?>
            </form>
            </div>
          </div>

        </div>


        <div class="row justify-content-end">
          <div class="col-md-6 text-right">
            <form action="portal.php" method="POST">
              <input type="submit" onclick="return confirm('Are you sure you want to submit and end the test? You can perform this action only once!')" class="btn btn-primary" name="logout" value="End Test">
            </form>
          </div>

        </div>


      </section>
  </section>



  <!-- Page for mobile view -->

  <section class="mobile-only">

      <div class="container">
        <div class="row">

          <div class="col-12">

            <!-- Display question number and the question -->
            <p class="question-text" style="font-size: 1.3rem;">
              <strong><?php echo "Q. ". $Q_no . " " ?></strong><?php echo $question ?>
              <?php
                //if($image_url != "")
                  //{ ?>
                    <!-- <div class="row">
                      <img height="300px" width="300px" src=<?php echo $image_url ?> alt="Stickman">
                    </div> -->

              <?php //}else{ } ?>
            </p>

            <form class="white" action="portal.php" method="POST">

                <input type="radio" id="option1" name="answer" value="1" <?php echo $checked1?>>
                <label for="option1"><?php echo $option1?></label><br>

                <input type="radio" id="option2" name="answer" value="2" <?php echo $checked2?>>
                <label for="option2"><?php echo $option2 ?></label><br>

                <input type="radio" id="option3" name="answer" value="3" <?php echo $checked3?>>
                <label for="option3"><?php echo $option3 ?></label><br>

                <input type="radio" id="option4" name="answer" value="3" <?php echo $checked4?>>
                <label for="option4"><?php echo $option4 ?></label>

                <div class="col-md-6 pl-0">
                  <input type="submit" name="<?php echo $Q_no ?>" value="Save and Next Question" onclick="updateCookie(<?php echo $Q_no ?>)" class="btn btn-dark">
                </div>

            <h5><?php echo $error_message;?></h5>
            </form>
          </div>

          <div class="col-md-4">
            <h6 class="text-center">Question palette</h6>
            <div class="row">

            <form action="portal.php" method="post">
                <?php for($i=1;$i <= $total_noof_questions; $i++)
                {?>
                <input type="submit" class="col-2 mb-1 ml-1 btn btn-outline-secondary <?php echo $i ?>" name="question_no_frompallete" value="<?php echo $i ?>"/>
                <?php
                }?>
            </form>
            </div>
          </div>

        </div>


        <div class="row justify-content-end">
          <div class="col-md-6 text-right">
            <form action="portal.php" method="POST">
              <input type="submit" onclick="return confirm('Are you sure you want to submit and end the test? You can perform this action only once!')" class="btn btn-primary" name="logout" value="Submit">
            </form>
          </div>

        </div>


      </section>
  </section>




    <script type="text/javascript">
      var visitedQuestions = <?php echo json_encode($_SESSION['visited_q']); ?>;
      visitedQuestions = visitedQuestions.map(String);



      for (var i = 0; i < visitedQuestions.length; i++)
      {
        var visitedQuestionButtons = document.getElementsByClassName(visitedQuestions[i]);
        for (var j = 0; j < visitedQuestionButtons.length; j++)
        {
          visitedQuestionButtons[j].classList.remove("btn-outline-secondary");
          visitedQuestionButtons[j].classList.add("btn-danger");
        }
      }


      var attemptedQuestions = <?php echo json_encode($_SESSION['no_of_submited_qn']); ?>;
      attemptedQuestions = attemptedQuestions.map(String);



      for (var i = 0; i < attemptedQuestions.length; i++)
      {
        var attemptedQuestionButtons = document.getElementsByClassName(attemptedQuestions[i]);
        for (var j = 0; j < attemptedQuestionButtons.length; j++)
        {
          attemptedQuestionButtons[j].classList.remove("btn-danger");
          attemptedQuestionButtons[j].classList.add("btn-success");
        }
      }

    </script>
    </body>

</html>
