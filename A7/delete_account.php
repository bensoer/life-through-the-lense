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
	$email = clean($_POST['delete_email']);
	$password = clean($_POST['delete_pword']);
	
	//md5 for POST values
	$enc_pass = md5($password);
		
	//Create query to check if password and email match current user
	$qry = "SELECT email,password,name,id FROM users WHERE email='$email' AND password='$enc_pass' AND name='$name' AND id='$id'";
	$result = mysql_query($qry);
		
	if(mysql_num_rows($result) == 0){
		$_SESSION['MEMBERS_LOAD'] = 'loadAccountSettings()';
		$_SESSION['DMESSAGE'] = 'Email and password does not match account.';
		header("location: members.php");
	} else {
		//Email and password are valid, account is deleted
		$qry = "DELETE FROM users WHERE email='$email' AND password='$enc_pass' AND name='$name' AND id='$id'";
		$result = mysql_query($qry);
		if($result) {
			session_regenerate_id(true);
			unset($_SESSION['SESS_ID']);
			session_write_close();
			header("location: ".HOMEURL);
			exit();
		}else {
			die("Query failed");
		}
	}
		
	mysql_close($link);

?>