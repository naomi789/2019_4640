<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Japanese dictionary & flashcard app">
  <meta name="keywords" content="japan, japanese, foreign langauge, study, dictionary, learning, quiz">
  <script type="text/javascript" src="js/card.js"></script>
  <title>J Dict Flashcards</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/cards.css" />
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-0 col-md-2"></div>


      <div class="col-12 col-md-8">
        <!-- header -->
        <div class="header">
          <a href="index.php" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
          <div class="header-right">
            <!-- <a href="#login">Login</a>
  		    <a href="#signup">Sign up</a> -->
            <a href="list-of-lists.html">My vocab lists</a>
            <!-- <a href="#" class="fa fa-bars"><span></span></a> -->
          </div>
        </div>

        <div align="center">
          <!-- INDEX CARD -->
          <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
            <form method="post">
              <div class="card" name="flipcard" id="flashcard" onclick="clickCard()">
              <!-- front content  onclick="clickCard()"-->
              難しい
            </div>
            </form>
          </div>
          <!-- DIRECTIONS -->
          <div class="directions">Tap card to see back<i class="fa fa-arrow-right"></i></div>
          <!-- BUTTONS ( action="")-->
          <form method="post">
            <div id="both_buttons">
            <input type="button" name="correct" class="correct button" value="I knew this word">
            <input type="button" name="incorrect" class="incorrect button" value="I didn't know this word">
          </div>
          </form> 
        </div>
      </div>
      <?php
        require('connect-db.php');
        // echo "hi";
        function reportAnswer()
        {
          // echo "asdf";
          if ($_SERVER['REQUEST_METHOD'] === 'POST')
          {
            echo "post";
            if (isset($_POST['correct']))
            {
              $correct = True; 
              echo "stored correct";

              storeAnswer($correct);
            }
            else
            {
              echo 'idk 1';
            }
            if (isset($_POST['incorrect']))
            {
              $correct = False; 
              echo "stored WRONG";
              storeAnswer($correct);
              
            }
            else
            {
              echo 'idk 2';
            }
            if (isset($_POST['flipcard']))
            {
              $_SESSION['starttime'] = date("H:i:s");
            }
            else
            {
              echo 'idk 3';
            }
            if (isset($_POST['flipcard']))
            {

            }
          }
        }
        function storeAnswer($correct)
        {
          if(isset( $_COOKIE['email']))
          {
            session_start();
            require('connect-db.php');
            $email = $_COOKIE['email'];
            $listname = $_SESSION['listname'];
            $all_words = $_SESSION['all_words']; 
            $current_word = $_SESSION['current_word']; // an array
            $date = date('m/d/Y');
            $endtime = date("H:i:s");
            $starttime = $_SESSION['starttime'];
            $time_thinking = $endtime - $starttime;  
            $ent_seq = $current_word['ent_seq'];

          }
        }
        reportAnswer();
      ?>

      <div class="col-0 col-md-2"></div>
    </div>
  </div>
</body>

</html>

