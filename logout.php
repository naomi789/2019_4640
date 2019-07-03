<?php
setcookie('loggedIn', 'false', time()+10000, '/');
setcookie('email', 'NULL', time()+10000, '/');
header('Location: http://localhost/2019_4640/index.php');

?>
