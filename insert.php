<?php
include("connection.php");

$title= $_POST['titlecol'];
$desc=$_POST['desccol'];
$adddate=date('Y-m-d');


$sql ="insert into martian(first_name,last_name,base_id,super_id) values ('".$title."','".$desc."','".$adddate."')";

mysqli_query($conn,$sql);


?>