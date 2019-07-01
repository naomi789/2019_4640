<?php


require('connect-db.php');

// $postdata = file_get_contents("php://input");



// $request = json_decode($postdata, true);

// $request['pwd'] = htmlspecialchars($request['pwd']);
// $request['email'] = htmlspecialchars($request['email']);

// $request['pwd'] = password_hash($request['pwd'], PASSWORD_DEFAULT);
// $request['pwd'] = htmlspecialchars($request['pwd']);

// $email = $request['email'];
// $pwd = $request['pwd'];

$email = $_POST['email'];

$pwd = $_POST['pwd'];
$pwd = htmlspecialchars($pwd);
// $pwd = password_hash($pwd, PASSWORD_DEFAULT);
// $pwd = htmlspecialchars($pwd);

global $db;

// function newUser(){
        
//     global $email;
//     global $name;
//     global $pwd;
//     global $db;
//     global $request;

//     $select_query = "SELECT * FROM user WHERE email='$email';";
//     $select_statement = $db->prepare($select_query);
//     $select_statement->execute();
//     $select_results = $select_statement->fetchAll();
//     $select_statement->closecursor();

//     if(count($select_results) == 0){
//         $query = "INSERT INTO user VALUES('$name', '$email', '$pwd');";
//         $statement = $db->prepare($query);
//         $statement->execute();
//         $results = $statement->fetchAll();
//         $statement->closeCursor();
        

//         echo json_encode($request);
//     }
//     else{
//         $request['name'] = 'userAlreadyExists';
//         echo json_encode($request);
//     }

// }

// newUser();

function verify(){
    global $email;
    global $pwd;
    global $db;

    $select_query = "SELECT * FROM user WHERE email='$email' AND pwd='$pwd';";
    $select_statement = $db->prepare($select_query);
    $select_statement->execute();
    $select_results = $select_statement->fetchAll();
    $select_statement->closecursor();

    if(count($select_results) == 0){
        echo '<h3>Email and password do not match our records. <a href="login.php">Try again</a></h3>';
    }    
    else{
        setcookie('loggedIn', 'true', time()+604800, '/') or die('unable to create cookie');
        header('Location: index.php');
    }

}

verify();


?>
