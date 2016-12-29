<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Team A7 - Website Shell</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="gallery_style.css" type="text/css">
		<script type="text/javascript" src="gallery.js"></script>
	</head>
	<body>
		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php require 'gallery_content.php' ?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>