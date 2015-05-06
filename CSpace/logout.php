<?php
    session_start();
    require_once('./core/Base.class.php');
  	require_once("./core/Connection.class.php");
  	require_once("./core/Util.class.php");
  	$base = Base::getInstance();
  	$connection = Connection::getInstance();

    require_once("connect.php");
		$userID = $_SESSION['CSpace_userID'];
    date_default_timezone_set('America/New_York');
    $timestamp = time();
    $datetime = getdate();
    $date = date('Y-m-d', $datetime[0]);
    $time = date('H:i:s', $datetime[0]);
    $ip=$_SERVER['REMOTE_ADDR'];
		$projectID = $_SESSION['CSpace_projectID'];
		Util::getInstance()->saveAction('logout','from_toolbar',$base);
		session_destroy();
		setcookie("CSpace_userID");
?>