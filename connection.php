<?php
$servername = "us-cdbr-east-06.cleardb.net";
$username = "b79c0e5ef2f44c";
$password = "988326d0";
$db="heroku_79e761ab428f3d3";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
