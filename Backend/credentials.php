<?php

// this file will contain the credentials for the database
$server = "mysql.jawad.se";
$username = "kassa";
$password = "cGZZ2.I2mYPE*T@p";
$dbname = "kassa";
$port = 80;


// Create connection
$conn = mysqli_connect($server, $username, $password, $dbname, $port);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
