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
						function OpenCon()
 						{
							$dbhost = "127.0.0.1";
							$dbuser = "root";
							$dbpass = "password";
							$db = "main_db";

							$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
							// echo "did we just connect??";
							$query = 'hi';
							echo "SELECT * FROM brief_result WHERE keb LIKE '" + $query + "%' OR reb LIKE '" + $query + "%'";
						  return $conn;
					  }

					 function CloseCon($conn)
					  {
					  	$conn -> close();
					  }

					$conn = OpenCon();
					 CloseCon($conn);

					 <?php
/*************************/
/** get data **/
// function selectData()
// {
//    require('connect-db.php');

   // To prepare a SQL statement, use the prepare() method of the PDO object
   //    syntax:   prepare(sql_statement)

   // To execute a SQL statement, use the bindValue() method of the PDO statement object
   // to bind the specified value to the specified param in the prepared statement
   //    syntax:   bindValue(param, value)
   // then use the execute() method to execute the prepared statement

//    // Excute a SQL statement that doesn't have params
//    $query = "SELECT * FROM courses";
//    $statement = $db->prepare($query);
//    $statement->execute();
//
//    // fetchAll() returns an array for all of the rows in the result set
//    $results = $statement->fetchAll();
//
//    // closes the cursor and frees the connection to the server so other SQL statements may be issued
//    $statement->closecursor();
//
//    foreach ($results as $result)
//    {
//       echo $result['courseID'] . ":" . $result['course_desc'] . "<br/>";
//    }
//
//
//    // Execute a SQL statement that has a param, use a colon followed by a param name
//    $someid = "id1";
//    $query = "SELECT * FROM courses WHERE test_id = :someid";
//    $statement = $db->prepare($query);
//    $statement->bindValue(':someid', $someid);
//    $statement->execute();
//
//    // fetchAll() returns an array for all of the rows in the result set
//    $results = $statement->fetchAll();
//
//    // closes the cursor and frees the connection to the server so other SQL statements may be issued
//    $statement->closecursor();
//
//    foreach ($results as $result)
//    {
//       echo "select a row where courseID=id1 --->" . $result['courseID'] . ":" . $result['course_desc'] . "<br/>";
//    }
//
// // a SELECT statement returns a result set in the PDOStatement object
// }
// ?>

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
