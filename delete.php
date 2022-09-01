<?php
require_once("connection.php");

$stmt = $conn->prepare("DELETE FROM martian WHERE martian_id = ?");
$stmt->bind_param("i", $_GET['del_id']);
$stmt->execute();
