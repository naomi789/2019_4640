<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Japanese dictionary & flashcard app">
	<meta name="keywords" content="japan, japanese, foreign langauge, study, dictionary, learning, quiz">
	<script type="text/javascript" src="js/search.js" charset="utf-8"></script>
	<script type="text/javascript" src="assets/data/medium_dict.json"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>J Dict Flashcards</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/search.css" />
</head>

<body>
	<?php
	// setcookie('loggedIn', 'true', time()-1, '/');
	// unset($_COOKIE['loggedIn']);
	// if(!isset($_COOKIE['loggedIn'])){
	// 	setcookie('loggedIn', 'false', time()+604800, '/');		
	// }
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if (isset($_GET['loggedIn'])){
				setcookie('loggedIn', 'true', time()+10000, '/');
				header('Location: http://localhost/2019_4640/index.php');
			}
		}
	?>
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
							if(isset( $_COOKIE['loggedIn']))
							{
								if($_COOKIE['loggedIn'] == 'true')
								{
									echo '<a href="logout.php">Log out</a>';
								}
							
								else
								{
									echo '<a href="http://localhost:4200/">Sign up/login</a>';
								}
							}
						 ?>
					</div>
				</div>

				<!-- search bar and button -->
				<div align="center">
					<form method="post" action="">
						<input type="search" name="value" id="search_box" placeholder="Type a word in English or Japanese.." autofocus="autofocus">
						<button type="submit" onclick="search()"><i class="fa fa-search"></i></button>
					</form>
					<!-- show list of previous queries here OR -->
					<!-- show search results -->
					<div id="results">
						<!-- this is where js inserts the results -->
						<?php
							require('connect-db.php');
							function selectData()
							{
								if ($_SERVER['REQUEST_METHOD'] === 'POST')
								{
									$somequery = $_POST['value'];

									// echo "query currently is '" . $somequery . "'";
								  	require('connect-db.php');

									$query = "SELECT * FROM brief_result WHERE keb LIKE '$somequery%' OR reb LIKE '$somequery%'";
									$query = "SELECT * FROM brief_result WHERE gloss_def LIKE '$somequery%'";

								  	$statement = $db->prepare($query);
									// $statement->bindValue(':somequery', $somequery);
								  	$statement->execute();

									// fetchAll() returns an array for all of the rows in the result set
									$results = $statement->fetchAll();
									// closes the cursor and frees the connection to the server so other SQL statements may be issued
									$statement->closecursor();

									if (count($results) == 0)
									{
										echo 'We didn\'t find "' . $somequery . '" in our dictionary. Please check your spelling or try a synonym!!';
									}
									else
									{
										echo '<table><tbody>';
										foreach ($results as $result)
										{
											echo '<tr class="one_word"><td class="keb"><span>' . $result['keb'] . '</span></td><td class="reb"><span>' . $result['reb'] . '</span></td><td class="gloss"><span>' . $result['gloss_def'] .
											'</span></td><td class="add_vocab"><a href="503-service-unavailable.html"><i class="fa fa-plus-circle plus_sign"></i></a</td></tr>';
											// TODO LUKE HELP PLEASE
											// where our href links to a 503 page
											// we instead should follow that tutorial with the button to a small modal
											// this one shouldn't be too bad, there's just a heck ton of stuff
											// that only works halfway rn
										}
										echo '</tbody></table>';
									}

							 	}
							}
							selectData();
						?>
					</div>
				</div>
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
<script type="text/javascript"></script>

</html>
