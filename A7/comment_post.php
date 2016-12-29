<?php
	require_once('auth.php');
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tbl_name="comments"; // Table name

	// Get value of id that sent from hidden field
	$photoName=$_POST['photoName'];

	// get values that sent from form
	$comment=$_POST['comment'];
	$safeComment=mysql_real_escape_string($comment);
	$user_name=$_SESSION['SESS_NAME'];
	
	$getPosts="SELECT * FROM users WHERE name='$user_name'";
	$postResult=mysql_query($getPosts);
	$numPosts = 0;

	while($rows=mysql_fetch_array($postResult)){
		$numPosts = $rows['posts'];
	}
	
	$numPosts++;

	date_default_timezone_set('Canada/Pacific');
	$date_time=date("Y/m/d H:i:s"); // create date and time

	// Insert answer
	$sql="INSERT INTO $tbl_name(photo_name, user_name, comment, date_time)VALUES('$photoName', '$user_name','$safeComment', '$date_time')";
	$sql2="UPDATE users SET posts='$numPosts' WHERE name='$user_name'";
	$result=mysql_query($sql);
	$result2=mysql_query($sql2);

	if($result && $result2)
		header('Location: picture.php?photoName='.$photoName);
	else {
		echo "ERROR".mysql_error();
	}

	mysql_close();
?>

