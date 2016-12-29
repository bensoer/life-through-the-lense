<?php
	session_start();
	$_SESSION['page'] =  1;
	header("location: ../gallery.php");
?>