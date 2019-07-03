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
<?php
  session_start();
  $_SESSION['starttime'] = date("H:i:s");
 ?>
 <body onload="startMyTimer()">
  <div class="container">
    <div class="row">
      <div class="col-0 col-md-2"></div>


      <div class="col-12 col-md-8">
        <!-- header -->
        <div class="header">
          <a href="index.php" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
          <div class="header-right">
            <a href="list-of-lists.php">My vocab lists</a>
            <?php
            if($_COOKIE['loggedIn'] == 'true')
							{
								if($_COOKIE['loggedIn'] == 'true')
								{
									echo '<a href="logout.php">Log out</a>';
								}
							}
              else
              {
                echo '<a href="http://localhost:4200/">Sign up</a>';
                echo '<a href="http://localhost/2019_4640/login.php">Log in</a>';
              }
						 ?>         </div>
        </div>

        <div align="center">
          <!-- INDEX CARD -->
          <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
            <div class="card" id="flashcard" onclick="clickCard()">
            <!-- front content -->
            <?php
             // in the future it'd be nice if people could change the direction of FC
             echo $_SESSION['current_word']['gloss_def'];
             ?>
           </div>
          </div>
          <!-- DIRECTIONS -->
          <div class="directions">Tap card to see back<i class="fa fa-arrow-right"></i></div>
          <!-- BUTTONS ( action="")-->
          <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            <div id="both_buttons">
            <button type="submit" name="correct" class="correct button" value="I knew this word">I knew this word</button>
            <button type="submit" name="incorrect" class="incorrect button" value="I didn't know this word">I didn't know this word</button>
          </div>
          </form>
        </div>
      <?php
        require('connect-db.php');
        function reportAnswer()
        {
          if ($_SERVER['REQUEST_METHOD'] == "POST")
          {
            if (isset($_POST['correct']))
            {
              $correct = True;
              storeAnswer($correct);
              // echo "stored correct";
            }
            if (isset($_POST['incorrect']))
            {
              $correct = False;
              storeAnswer($correct);
              // echo "stored WRONG";
            }
            // then bring up the next card
            $_SESSION['counter_curr_word'] = $_SESSION['counter_curr_word'] + 1;
            $_SESSION['current_word'] = $_SESSION['all_words'][$_SESSION['counter_curr_word']];
          }
        }
        function storeAnswer($correct) // this function is called in reportAnswer()
        {
          global $db;
          // i know this is cheating:
          $_COOKIE['email'] = 'test@test.com';
          echo 'set cookie to: '. $_COOKIE['email'];
          if(isset( $_COOKIE['email']))
          {
            $email = $_COOKIE['email'];
            $listname = $_SESSION['listname'];
            $all_words = $_SESSION['all_words']; // I'll need to reach for the next word
            $current_word = $_SESSION['current_word']; // an array
            $mydate = date('m/d/Y');
            // TODO FIX THIS LATER
            $endtime = new DateTime(date("H:i:s"));

            $starttime = new DateTime($_SESSION['starttime']);

            $since_start = date_diff($endtime, $starttime);
            $time_thinking = $since_start->format('%s second');

            // echo $time_thinking;
            // $time_thinking = date("H:i:s");
            $ent_seq = $current_word['ent_seq'];
            // echo $email . $listname . $date . $time_thinking . $ent_seq;
            // the code that belongs here I stuck inside of temp.php
            $query = "INSERT INTO user_performance (time_date, time_thinking, list_name, correct, ent_seq, email) VALUES(:mydate, :time_thinking, :listname, :correct, :ent_seq, :email);";
            /////////'".$date."','".$time_thinking.",'".$listname.",'".$correct.",'".$ent_seq.",'".$email."
            $statement = $db->prepare($query);
            $statement->bindValue(':mydate',$mydate);
            $statement->bindValue(':time_thinking',$time_thinking);
            $statement->bindValue(':listname',$listname);
            $statement->bindValue(':correct',$correct);
            $statement->bindValue(':ent_seq',$ent_seq);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $statement->closecursor();
          }
        }
        reportAnswer();
      ?>
      <footer>
       <p>Designed and Maintained by: Naomi Johnson and Luke Wolpert
       Copyright ©2019 <a href="index.php">JDict Flashcards.</a> All rights reserved</p>
       <!-- <p>JWorld Flashcards is a free online
         Japanese-English dictionary and Flashcard application.
         It first went online in May 2019; this is version "2.0".
       </p> -->
       <p>JDict Flashcards uses the <a href="http://edrdg.org/jmdict/edict.html">
         EDICT</a> files from the
         Electronic Dictionary Research and Development Group at Monash University.
         This project was started by Dr. Jim Breen.
       </p>
       <p> Please contact us at <a href="jdictflashcards@gmail.com">jdictflashcards@gmail.com</a> if you have any feature requests! If you find
         JDict Flashcards helpful, please tell your friends!
      </footer>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>
  </div>
</body>

</html>
