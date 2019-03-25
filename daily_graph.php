<?php
//setting header to json
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



//database
define('DB_HOST', 'localhost:3306');
define('DB_USERNAME', 'arundhati');
define('DB_PASSWORD', 'arundhati');
define('DB_NAME', 'user');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//echo DATE(NOW);
//echo CURDATE();

$date=date("Y-m-d");
//echo $date;

//query to get data from the table
$query = sprintf("SELECT timestamp, score FROM anomaly where DATE(timestamp)='$date'");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);