
<?php 
define('DB_SERVER', 'localhost:3306'); //database server url and port
define('DB_USERNAME', 'arundhati');  //database server username
define('DB_PASSWORD', 'arundhati'); //database server password
define('DB_DATABASE', 'user'); //where profile is the database 
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error());


?>