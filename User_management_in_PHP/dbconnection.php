<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_DATABASE', 'profile'); //where customers is the database
$db = mysqli_connect('localhost', 'root');
mysqli_select_db($db, 'profile');
?>
