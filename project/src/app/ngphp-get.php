<?php

if(isset($_GET['str'])){
    $getdata = $_GET['str'];

}

$request = json_decode($getdata);

$data = [];
foreach($request as $k => $v){
    $data[0]['get'.$k] = $v;
}

echo json_encode(['content'=>$data]);









?>