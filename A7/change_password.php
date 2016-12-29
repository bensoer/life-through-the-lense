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
	$oldPassword = clean($_POST['oldPassword']);
	$newPassword = clean($_POST['newPassword']);
	
	//md5 for POST values
	$enc_oldPass = md5($oldPassword);
	$enc_newPass = md5($newPassword);
	
	//Create query to check if old password and user name match
	$qry = "SELECT password,name,id FROM users WHERE password='$enc_oldPass' AND name='$name' AND id='$id'";
	$result = mysql_query($qry);
		
	if(mysql_num_rows($result) == 0){
		$_SESSION['MEMBERS_LOAD'] = 'loadAccountSettings()';
		$_SESSION['PMESSAGE'] = 'Old password is not correct.';
		header("location: members.php");
	} else {
		//Old password and session user matches a result in table, password is changed
		$qry = "UPDATE users SET password='$enc_newPass' WHERE password='$enc_oldPass' AND name='$name' AND id='$id'";
		$result = mysql_query($qry);
		if($result) {
			$_SESSION['MEMBERS_LOAD'] = 'loadAccountSettings()';
			header("location: members.php");
			$_SESSION['PMESSAGE'] = 'Password change successful.';
			exit();
		}else {
			die("Query failed");
		}
	}
	
	mysql_close($link);
?>