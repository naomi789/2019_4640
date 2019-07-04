<?php

require('connect-db.php');

function makeGreeting(){
    global $email;
    global $db;

    $email = $_COOKIE['email'];

    $query = "SELECT first_name FROM user WHERE email='$email';";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closecursor();
    // echo $alt_email . 'is your email';
    $str = "Hello, " . $results[0]['first_name'];
    echo $str;


}

makeGreeting();

















?>
