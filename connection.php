<?php
$servername = "us-cdbr-east-06.cleardb.net";
$username = "b3254f9c1d236c";
$password = "59729ead";
$db="heroku_18276d8ed93749c";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
