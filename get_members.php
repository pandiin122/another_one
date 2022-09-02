<?php
$select_members = function ($id) {
	include("connection.php");
	$stmt = "SELECT COUNT(*) FROM martian WHERE base_id = $id";
	$result = mysqli_query($conn, $stmt);

	echo mysqli_fetch_array($result)[0];
};
