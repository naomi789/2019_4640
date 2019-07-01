<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lists</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="assets/css/list-of-lists.css">
</head>

<body>
  <div class="container">
    <!--Row 1-->
    <div class="row">
      <div class="col-0 col-md-2"></div>
      <div class="col-12 col-md-8">
        <div class="header">
          <a href="index.php" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
          <div class="header-right">
            <a href="index.php">Dictionary</a>
            <?php
              setcookie('loggedIn', 'true', time()-10000);
              unset($_COOKIE['loggedIn']);
              // if(!isset($_COOKIE['loggedIn'])){
              //   setcookie('loggedIn', 'true', time()+10000);
              //   header('Location: list-of-lists.php');
              // }
              if(isset( $_COOKIE['loggedIn']))
              {
                if($_COOKIE['loggedIn'] == 'true')
                {
                  echo '<a href="503-service-unavailable.html">Log out</a>';
                }
              }
              else
              {
                echo '<a href="http://localhost:4200/">Sign up/login</a>';
              }
             ?>          </div>
        </div>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>
    <!--Row 2
            <input type="text" class="line" placeholder="Type to filter">
    -->
    <div class="row">
      <div class="col-0 col-md-2"></div>
      <div class="col-3 col-md-3">
      </div>
      <div class="col-6 col-md-4"></div>
      <div class="col-3 col-md-1" id="edit-lists-div"><button id="edit-button" onclick="editLists()">EDIT</button></div>
      <div class="col-0 col-md-2"></div>
    </div>
    <br />

    <!--New list input row (hidden by default)-->
    <div class="row" id="new-list-input-row">
      <div class="col-0 col-md-2"></div>
      <div class="col-12 col-md-8" align="center">
        <!-- <div class="box" id="new-list-input-box"><label>Enter list name:  </label><input class="box-txt name-input-box" id="list-name-input"></input>
         <button onclick="submitNewList()">Create</button></div> -->
      <form method="post" action="">
        <div class="box" id="new-list-input-box"><label>Enter list name:  </label><input name="newlistname" class="box-txt name-input-box" id="list-name-input"></input>
        </div>
        <!-- <input type="search" name="value" id="search_box" placeholder="Type a word in English or Japanese.." autofocus="autofocus"> -->
        <button type="submit" onclick="submitNewList()">Create</button>
      </form>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>

    <!--New list button row (hidden by default) -->
    <div class="row" id="new-list-button-row">
      <div class="col-0 col-md-2"></div>
      <div class="col-12 col-md-8" align="center">
        <button onclick="newList()" class="box" id="new-list-box">Create new list</button>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>
    <!--List rows-->
    <div class="row">
      <div class="col-0 col-md-2"></div>
      <div class="col-12 col-md-8" align="center">
      <?php
      function loadLists()
      {
        require('connect-db.php');
        $query = "SELECT * FROM list";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closecursor();
        if (count($results) == 0)
        {
          echo 'Oh no! We didn\'t find any vocabulary lists!!';
        }
        else
        {
          echo '<table><tbody>';
          foreach ($results as $result)
          {
            echo '
            <div class="row">
              <div class="box">
                <a class="list_name" href="list.php?listname=' . $result['list_name'] . '">'
                  . $result['list_name'] .
                  '</a>
              </div>
              <button class="delete-button">
                <i style="vertical-align: middle;" class="fa fa-minus-circle"></i>
              </button>
            </div>';
          }
          echo '</tbody></table>';
        }

      }
      loadLists();
      ?>
      <?php
        function newlist()
        {
          if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {
            global $db;
            if(isset($_POST['newlistname']))
            {
              //add new list
              $newlistname = $_POST['newlistname'];
              $query = "INSERT INTO list VALUES('" . $newlistname . " ','NA');";
              $statement = $db->prepare($query);
              $statement->execute();
              $results = $statement->fetchAll();
              $statement->closecursor();
              //display new list
              echo '
            <div class="row">
              <div class="box">
                <a class="list_name" href="list.php?listname=' . $newlistname . '">'
                  . $newlistname .
                  '</a>
              </div>
              <form method="get">
                <button class="delete-button" name="delete">
                  <i style="vertical-align: middle;" class="fa fa-minus-circle"></i>
                </button>
              </form>
            </div>';
            }

          }
        }
        newlist();
        function deleteList()
        {
          if ($_SERVER['REQUEST_METHOD'] == 'GET')
          {
            global $db;
            // TODO LUKE HELP PLEASE
            if(isset($_GET['delete'])) // this line of code won't work.
            {
              // I used name="delete-newlistname" above, so I'd need to do a substring, maybe?
              // if I name ALL the delete buttons "delete",
              // then I'd need to also add a field that says what list needs to be deleted
              $deleting = $_POST['delete'];

              $query = "DELETE FROM list_word WHERE list_name = " . "'" . $deleting . "';";
              $statement = $db->prepare($query);
              $statement->execute();
              $statement->closecursor();

              $query2 = "DELETE FROM list WHERE list_name = " . "'" . $deleting . "';";
              $statement = $db->prepare($query2);
              $statement->execute();
              $statement->closecursor();
            }
          }
        }
        deleteList();
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



  <script type="text/javascript" src="js/list-of-lists.js"></script>
  <script type="text/javascript" src="assets/data/medium_dict.json"></script>
</body>

</html>
