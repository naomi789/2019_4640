<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lists</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/css/list.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

	<div class="container">
        <!--Row 1: Header-->
      <div class="row">
          <div class="col-0 col-md-2"></div>
          <div class="col-12 col-md-8">
            <div class="header">
                  <a href="index.php" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
                  <div class="header-right">
                    <a href="list-of-lists.php">My vocab lists</a>

                  </div>
            </div>
        </div>
        <div class="col-0 col-md-2"></div>
		</div>

		<!--Row 2: List Name-->
		<div class="row">
			<div class="col-0 col-md-2"></div>
			<div class="col-5 col-md-4" id="list-name"><?PHP $all_words ?></div>
			<div class="col-7 col-md-6"></div>
		</div>


		<!--<div class="row">
			<div class="col-0 col-md-4"></div>
			<div class="col-12 col-md-4 flip-container" ontouchstart="this.classList.toggle('hover');">
				<div align="center" class="card" id="flashcard">
				  難しい
				</div>
			</div>
			<div class="col-0 col-md-4"></div>
		</div>


		<br />
		<div class="row">
			<div class="col-4 col-md-5"></div>
      <form method="get" action="">
        <div class="col-3 col-md-1 left-arrow"><button class="mini-flash-btn" name="previous_word"><i class="fa fa-angle-left"></button></i></div>
        <div class="col-1 right-arrow"><button class="mini-flash-btn" name="next_word"><i class="fa fa-angle-right"></button></i></div>
      </form>


			<div class="col-2 col-md-2"><a href="card.html"><i class="fa fa-expand"></a></i></div>
			<div class="col-2 col-md-3"></div>
		</div>



		<div class="row">
			<div class="col-0 col-md-2"></div>
			<div class="col-12 col-md-8"><hr /></div>
			<div class="col-0 col-md-2"></div>
		</div>
    -->



		<!--Row 6: Edit button (for another day)-->
<!-- 		<div class="row">
			<div class="col-11 col-md-9"></div>
			<div class="col-1 col-md-3" id="edit-lists-div"><a class="edit-link" href="503-service-unavailable.html">EDIT</a></div>
		</div> -->
    <div class="row">
      <div class="col-0 col-md-3"></div>
      <div class="col-12 col-md-6" align="center">
        <div class="box">
          <span class="box-txt">
            <a href="card.php">GO THROUGH FLASHCARDS<a/>
          </span>
        </div>
      </div>
      <div class="col-0 col-md-3"></div>
    </div>'
		<br />

    <?php
    session_start();
    $all_words = [];
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
      require('connect-db.php');

      if (isset($_GET['listname']))
      {
        $somequery = $_GET['listname'];
        $_SESSION['listname'] = $somequery; 

        $query = "SELECT * FROM words_in_lists WHERE list_name = " . "'" . $somequery . "' ORDER BY gloss_def;";

        $statement = $db->prepare($query);
        $statement->execute();
        $all_words = $statement->fetchAll();
        $_SESSION['all_words'] = $all_words; 
        $_SESSION['current_word'] = $all_words[0];
        $statement->closecursor();
      }
      else
      {
        $all_words = $_SESSION['all_words'];
      }
      if (count($all_words) == 0)
        {
          echo '<div class="row">
                            <div class="col-0 col-md-3"></div>
                            <div class="col-12 col-md-6" align="center">
                                <p>Oh no! It seems like this vocab list is empty!!</p>
                            </div>
                            <div class="col-0 col-md-3"></div>
                    </div>';
        }
        else
        {
          echo '<table><tbody>';
          {
          foreach ($all_words as $one_word)
            echo '<div class="row">
                            <div class="col-0 col-md-3"></div>
                            <div class="col-12 col-md-6" align="center">
                                <div class="box"><span class="box-txt">'. $one_word['gloss_def'] . '</span></div>
                            </div>
                            <div class="col-0 col-md-3"></div>
                    </div>';
          }
          echo '</tbody></table>';
        }
      
    }

    // decide if we need to show next/previous card
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
    {
      echo 'test';
      if (isset($_GET['next_word']))
      {
        next_word($all_words);
      }
      if (isset($_GET['previous_word']))
      {
        previous_word($all_words);
      }
    }   

    function next_word()
    {
      echo 'NEXT';
    }
    function previous_word()
    {
      echo 'PREVIOUS';
    }
  ?>

</div>

<script type="text/javascript" src="js/card.js"></script>
</body>
</html>