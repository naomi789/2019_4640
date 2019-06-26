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
					<input type="search" id="search_box" placeholder="Type a word in English or Japanese.." autofocus="autofocus">
					<button type="submit" onclick="search()"><i class="fa fa-search"></i></button>

					<!-- show list of previous queries here OR -->
					<!-- show search results -->
					<div id="results">
						<!-- this is where js inserts the results -->
						<?php
						// echo "SELECT * FROM brief_result WHERE keb LIKE '" + $query + "%' OR reb LIKE '" + $query + "%'"; -->
						/*************************/
						/** get data **/
						function selectData()
						{
						   require('connect-db.php');
							 $db = "main_db"; //i thought that var would come in from the file

						   // Excute a SQL statement that doesn't have params
						   $query = "SELECT * FROM JMdict";
						   $statement = $db->prepare($query);
							 echo $query;

						   $statement->execute();
							 echo $query;

						   // fetchAll() returns an array for all of the rows in the result set
						   $results = $statement->fetchAll();

						   // closes the cursor and frees the connection to the server so other SQL statements may be issued
						   $statement->closecursor();

						   foreach ($results as $result)
						   {
						      echo $result['ent_seq'] . ":" . $result['keb'] . "<br/>";
						   }


						   // Execute a SQL statement that has a param, use a colon followed by a param name
						   $someid = "id1";
						   $query = "SELECT * FROM courses WHERE test_id = :someid";
						   $statement = $db->prepare($query);
						   $statement->bindValue(':someid', $someid);
						   $statement->execute();

						   // fetchAll() returns an array for all of the rows in the result set
						   $results = $statement->fetchAll();

						   // closes the cursor and frees the connection to the server so other SQL statements may be issued
						   $statement->closecursor();

						   foreach ($results as $result)
						   {
						      echo "select a row where courseID=id1 --->" . $result['courseID'] . ":" . $result['course_desc'] . "<br/>";
						   }

						// a SELECT statement returns a result set in the PDOStatement object
						}
						selectData()
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
