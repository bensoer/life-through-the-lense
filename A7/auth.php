<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_ID is present or not
	if(!isset($_SESSION['SESS_ID']) || (trim($_SESSION['SESS_ID']) == '')) {
		header("location: login.php");
		exit();
	}
?>
