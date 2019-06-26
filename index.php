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
	<div class="container">
		<div class="row">
			<div class="col-0 col-md-2"></div>

			<div class="col-12 col-md-8">
				<!-- header -->
				<div class="header">
					<a href="/" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
					<div class="header-right">
						<a href="list-of-lists.html">My vocab lists</a>
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
								$somequery = $_POST['value'];

								echo "query currently is '" . $somequery . "'";
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

								 echo '<table><tbody>';
							   foreach ($results as $result)
							   {
									 echo '<tr class="one_word"><td class="keb"><span>' . $result['keb'] . '</span></td><td class="reb"><span>' . $result['reb'] . '</span></td><td class="gloss"><span>' . $result['gloss_def'] .
									 '</span></td><td class="add_vocab"><a href="503-service-unavailable.html"><i class="fa fa-plus-circle plus_sign"></i></a</td></tr>';
							   }
								 echo '</tbody></table>';
							}
						selectData();
						?>
					</div>
				</div>

			</div>
			<div class="col-0 col-md-2"></div>
		</div>
	</div>
</body>
<script type="text/javascript"></script>

</html>
