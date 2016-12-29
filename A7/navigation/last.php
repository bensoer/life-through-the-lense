<?php
	session_start();
	$_SESSION['page'] = ceil($_SESSION['count'] / $_SESSION['view']);
	header("location: ../gallery.php");
?>