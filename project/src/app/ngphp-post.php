<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

$postdata = file_get_contents("php://input");

$request = json_decode($postdata, true);

$request['pwd'] = htmlspecialchars($request['pwd']);
$request['pwd'] = $request['confirmPwd'] = password_hash($request['pwd'], PASSWORD_DEFAULT);

$name = $request['name'];
$email = $request['email'];
$pwd = $request['pwd'];

echo json_encode($request);

// function newUser(){
//     require('../../../connect-db.php');
    
//     $select_query = "SELECT * FROM user WHERE email='$email';";
//     $select_statement = $db->prepare($select_query);
//     $select_statement.execute();
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


?>