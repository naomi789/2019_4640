<?php


require('connect-db.php');

$email = $_POST['email'];

$pwd = $_POST['pwd'];
$pwd = htmlspecialchars($pwd);
//$pwd = password_hash($pwd, PASSWORD_DEFAULT);
// $pwd = htmlspecialchars($pwd);

global $db;



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
        echo '<h3>Email and password do not match our records. <a href="login.php">Try again</a></h3> ' . $pwd;
    }    
    else{
        setcookie('loggedIn', 'true', time()+604800, '/') or die('unable to create cookie');
        header('Location: index.php');
    }

}

verify();


?>
