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
          </div>
        </div>
      </div>
      <div class="col-0 col-md-2"></div>
    </div>
    <!--Row 2-->
    <div class="row">
      <div class="col-0 col-md-2"></div>
      <div class="col-3 col-md-3"></div>
      <div class="col-6 col-md-4"></div>
      <div class="col-3 col-md-1" id="edit-lists-div"><button id="edit-button" onclick="editLists()">EDIT</button></div>
      <div class="col-0 col-md-2"></div>
    </div>
    <br />

    <!--New list input row (hidden by default)-->
    <div class="row" id="new-list-input-row">
      <div class="col-0 col-md-2"></div>
      <div class="col-12 col-md-8" align="center">
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
        <div id="results">
            <!-- this is where js inserts the results -->
      </div>
      <div class="col-0 col-md-2"></div> 
    </div>


    <div class="row list-row">
      <div class="col-0 col-md-2"></div>
      <div class="second-child col-11 col-md-8" align="center">
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
                echo '<div class="box">
                  <a class="list_name" href="list.php?listname=' . $result['list_name'] . '">'
                    . $result['list_name'] .
                    '</a>
                </div>';
              }
              echo '</tbody></table>';
            }


            //if ($_SERVER['REQUEST_METHOD'] === 'POST')

          }
          loadLists();
        ?>
                    <?php
              function newlist()
              {
                if ($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                  require('connect-db.php');
                  $newlistname = $_POST['newlistname'];
                  $query = "INSERT INTO list VALUES('" . $newlistname . " ','NA');";
                  $statement = $db->prepare($query);
                  $statement->execute();
                  $results = $statement->fetchAll();
                  $statement->closecursor();
                }
              }
              newlist();
            ?>
      </div>
      <div class="fourth-child col-1 col-md-2"></div>
    </div>



  </div>



  <script type="text/javascript" src="js/list-of-lists.js"></script>
  <script type="text/javascript" src="assets/data/medium_dict.json"></script>
</body>

</html>