<?php
	session_start();
	if ($_SESSION['page'] !=1) {
		$_SESSION['page'] = $_SESSION['page'] - 1;
	}
	header("location: ../gallery.php");
?>