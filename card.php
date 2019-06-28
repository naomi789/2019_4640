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
            <div class="card" id="flashcard" onclick="clickCard()">
              <!-- front content -->
              難しい
            </div>
          </div>
          <!-- DIRECTIONS -->
          <div class="directions">Tap card to see back<i class="fa fa-arrow-right"></i></div>
          <!-- BUTTONS -->
          <div id="both_buttons">
            <input type="button" class="correct button" value="I knew this word" onclick="reportAnswer(true)">
            <input type="button" class="incorrect button" value="I didn't know this word" onclick="reportAnswer(false)">
          </div>
        </div>
      </div>


      <div class="col-0 col-md-2"></div>
    </div>
  </div>
</body>

</html>
