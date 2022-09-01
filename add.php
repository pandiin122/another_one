<?php
require_once("connection.php");

$leader = $_POST['leader'] > 0 ? $_POST['leader'] : 0;

$stmt = $conn->prepare("INSERT INTO martian (first_name,last_name,super_id,base_id) VALUES (?,?,?,?)");
$stmt->bind_param("ssii", $_POST['first_name'], $_POST['last_name'], $leader, $_POST['base']);
$stmt->execute();
