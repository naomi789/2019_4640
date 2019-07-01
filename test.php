<?php


function doTest(){
    setcookie('loggedIn', 'true', time()+1200, '/') or die('unable to create cookie');
}

doTest();





?>