<?php
	session_start();
	$projectID = $_SESSION['CSpace_projectID'];
	require_once("../connect.php");
	$query = "SELECT * FROM projects WHERE projectID='$projectID'";
	$results = $connection->commit($query);
	$line = mysqli_fetch_array($results, MYSQL_ASSOC);
	$projectTitle = $line['title'];
	echo "Active project: <span style=\"color:green;\">$projectTitle</span>";
?>