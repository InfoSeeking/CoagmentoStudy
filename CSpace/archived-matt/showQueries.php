<?php
	require_once("connect.php");
	if(isset($_POST['getResults']))
	{
		$returnArray = array();

	  	$query = 'SELECT * FROM queries';
	  	$result = mysql_query($query);

	  	while($row = mysqli_fetch_assoc($result))
	  	{
			array_push($returnArray, $row);
	  	}

	  	
	  	echo json_encode($returnArray);
	}
?>
