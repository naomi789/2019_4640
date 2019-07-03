<?php

require('connect-db.php');

$email = $_GET['email'];



function makeGreeting(){
    global $email;
    global $db;

    $query = "SELECT first_name FROM user WHERE email='$email';";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closecursor();
    $str = "Hello, " . $results[0]['first_name'];
    echo $str;


}

makeGreeting();

















?>