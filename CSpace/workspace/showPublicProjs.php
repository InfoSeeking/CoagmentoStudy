<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../assets/js/utilities.js"></script>
<link type="text/css" href="assets/css/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="assets/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="assets/css/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<link type="text/css" href="assets/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link type="text/css" href="assets/css/styles.css?v2" rel="stylesheet" />
<title>Coagmento - Collaborative Information Seeking, Synthesis, and Sense-making</title>

<?php
	session_start();
	include('../services/func.php');
?>
</head>

<body>

<?php include('views/header.php'); ?>

<div id="container" class="container">
<h3>Join a Project</h3>

<?php

	if (!isset($_SESSION['CSpace_userID'])) {
		echo "Sorry. Your session has expired. Please <a href=\"http://www.coagmento.org\">login again</a>.";
	}
	else {
?>

<table class="body" width=100%>
	<td><div id="sureJoin"></div><div id="sureDelete"></div></td>
<?php
	require_once('../core/Base.class.php');
	require_once("../core/Connection.class.php");
	require_once("../core/Util.class.php");

	$base = Base::getInstance();
	$connection = Connection::getInstance();
	$userID = $base->getUserID();
	echo "<tr><td><table  class=\"body\" width=100%>";
	if (isset($_GET['projectID'])) {
		$projectID = $_GET['projectID'];
		$query = "SELECT * FROM projects WHERE projectID='$projectID'";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$title = stripslashes($line['title']);
		$query = "INSERT INTO memberships VALUES('','$projectID','$userID','0')";
		$results = $connection->commit($query);
		echo "<tr><td colspan=3><font color=\"green\">You have just joined project <span style=\"font-weight:bold\">$title</span>.</font></td></tr>";
		echo "<tr><td colspan=3><br/></td></tr>\n";

		$query = "SELECT * FROM users WHERE userID='$userID'";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$firstName = $line['firstName'];
		$lastName = $line['lastName'];

		$query = "SELECT * FROM memberships WHERE projectID='$projectID' AND access=1";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$uID = $line['userID'];

		$query = "SELECT * FROM users WHERE userID='$uID'";
		$results = $connection->commit($query);
		$line = mysqli_fetch_array($results, MYSQL_ASSOC);
		$targetUserName = $line['username'];
		$targetFirstName = $line['firstName'];
		$targetLastName = $line['lastName'];
		$targetEmail = $line['email'];

		$title = addslashes($title);
		// Create an email
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Coagmento Support <support@coagmento.org>' . "\r\n";

		$subject = 'You have a new collaborator!';
		$message = "Hello, $targetFirstName $targetLastName,<br/><br/>This is to inform you that <strong>$firstName $lastName</strong> has just joined your  project <strong>$title</strong> as a collaborator.<br/><br/>Do not reply to this email. Visit your <a href=\"http://".$_SERVER['HTTP_HOST']."/CSpace\">CSpace</a> to access your projects. Your username is <strong>$targetUserName</strong>.<br/><br/><strong>The Coagmento Team</strong><br/><font color=\"gray\">'cause two (or more) heads are better than one!</font><br/><a href=\"http://www.coagmento.org\">www.Coagmento.org</a><br/>\n";
		mail ($targetEmail, $subject, $message, $headers);
		mail ('chirags@rutgers.edu', $subject, $message, $headers);
	}
	echo "<tr><th><span style=\"font-weight:bold\">Title</span></th><th>&nbsp;&nbsp;</th><th><span style=\"font-weight:bold\">Started on</span></th><th>&nbsp;&nbsp;</th><th><span style=\"font-weight:bold\">Membership</span></th></tr>\n";
	$query = "SELECT * FROM projects WHERE privacy=0";
	$results = $connection->commit($query);
	while ($line = mysqli_fetch_array($results, MYSQL_ASSOC)) {
		$projectID = $line['projectID'];
		$startDate = $line['startDate'];
		$title = stripslashes($line['title']);
		$description = stripslashes($line['description']);
		$query1 = "SELECT * FROM memberships WHERE projectID='$projectID'";
		$results1 = $connection->commit($query1);
		$members = "";
		$belongsTo = 0;
		while ($line1 = mysqli_fetch_array($results1, MYSQL_ASSOC)) {
			$uID = $line1['userID'];
			$access = $line1['access'];
			$query2 = "SELECT * FROM users WHERE userID='$uID'";
			$results2 = $connection->commit($query2);
			$line2 = mysqli_fetch_array($results2, MYSQL_ASSOC);
			$uName = $line2['username'];
			$firstName = $line2['firstName'];
			$lastName = $line2['lastName'];
			if ($userID==$uID)
				$belongsTo = 1;
			if ($access==0)
				$members = $members . $firstName . " " . $lastName . "($uName), ";
			else {
				$ownerID = $uID;
				$owner = $firstName . " " . $lastName . "($uName)";
			}
		}

		if ($belongsTo)
			echo "<tr><td><a href='projectInfo.php?projectID=$projectID'>$title</a><br/><span style=\"color:gray;\">$description</span></td><td>&nbsp;&nbsp;</td><td align=center>$startDate</td><td>&nbsp;&nbsp;</td><td align=center><a href=\"javascript:void(0);\" onClick=\"deleteProj('$projectID','$title');\">Leave</a>";
		else
			echo "<tr><td style=\"font-weight:bold\">$title<br/><span style=\"color:gray;\">$description</span></td><td>&nbsp;&nbsp;</td><td align=center>$startDate</td><td>&nbsp;&nbsp;</td><td align=center><a href=\"javascript:void(0);\" onClick=\"joinProj('$projectID','$title');\">Join</a>";
		echo "</td></tr>\n";
		echo "<tr><td colspan=5>Created by: $owner; Other members: $members<br/><hr/></td></tr>\n";
	}
	echo "</table></td></tr>\n";
	echo "</table></td></tr>\n";
	echo "</table>\n</center>\n<br/><br/><br/><br/>\n";
	}
?>
</div>

</body>
</html>