<?php
// To find a hostname, access phpMyAdmin
// - select tob "User accounts"
// - locate the username you created, by default, the Host name is localhost

// To find a port number, access phpMyAdmin
// - use Console (bottom)
// - type     SHOW VARIABLES WHERE Variable_name = 'port';
// - execute the query    press Ctrl+Enter
// (default port to mySQL database in XAMPP is 3306)

$dbServername = "localhost";//localhost:3306??
$username = "data";
$password = "password";
$dbName = "main_db";

// DSN (Data Source Name) specifies the host computer for the MySQL database
// and the name of the database. If the MySQL database is running on the same server
// as PHP, use the localhost keyword to specify the host computer

$dsn = "mysql:host=$hostname;dbname=$dbname";

// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>
