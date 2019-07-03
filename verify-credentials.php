<?php


require('connect-db.php');

$email = $_POST['email'];

$pwd = $_POST['pwd'];
$pwd = htmlspecialchars($pwd);

global $db;



function verify(){
    global $email;
    global $pwd;
    global $db;

    $select_query = "SELECT pwd FROM user WHERE email='$email';";
    $select_statement = $db->prepare($select_query);
    $select_statement->execute();
    $select_results = $select_statement->fetchAll();
    $select_statement->closecursor();

    if(password_verify($pwd, $select_results[0]['pwd'])){
        setcookie('loggedIn', 'true', time()+604800, '/') or die('unable to create cookie');
        setcookie('email', $email, time()+604800, '/') or die('unable to create cookie');
        header('Location: http://localhost/2019_4640/index.php');
    }
    else{
        echo '<h3>Email and password do not match our records. <a href="login.php">Try again</a></h3>';
    }

}

verify();


?>
