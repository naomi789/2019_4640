<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

$postdata = file_get_contents("php://input");

$request = json_decode($postdata, true);

//$request->pwd = password_hash($request->pwd, md5);

$request['pwd'] = password_hash($request['pwd'], PASSWORD_DEFAULT);
echo json_encode($request);

// foreach ($request as $k => $v)
// {
//   $data[0][$k] = $v;
// }

// echo json_encode(['content'=>$data]);




?>