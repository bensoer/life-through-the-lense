<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//SESSION Values
	$name = $_SESSION['SESS_NAME'];
	$id = $_SESSION['SESS_ID'];
	
	//Sanitize the POST values
	$oldEmail = clean($_POST['oldEmail']);
	$newEmail = clean($_POST['newEmail']);
		
	//Create query to check if old password and user name match
	$qry = "SELECT email,name,id FROM users WHERE email='$oldEmail' AND name='$name' AND id='$id'";
	$result = mysql_query($qry);
	
	if(mysql_num_rows($result) == 0){
		$_SESSION['MEMBERS_LOAD'] = 'loadAccountSettings()';
		header("location: members.php");
		$_SESSION['EMESSAGE'] = 'Old email entered is not correct.';
		exit();
	}else{
		//Old email and session user matches a result in table, email is changed
		$qry = "UPDATE users SET email='$newEmail' WHERE email='$oldEmail' AND name='$name' AND id='$id'";
		$result = mysql_query($qry);
		if($result) {
			$_SESSION['MEMBERS_LOAD'] = 'loadAccountSettings()';
			header("location: members.php");
			$_SESSION['EMESSAGE'] = 'Email change successful.';
			exit();
		}else {
			die("Query failed");
		}
	}
	
	mysql_close($link);
?>