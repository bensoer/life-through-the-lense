<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - Single Picture</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="picture_style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="picture_print_style.css" type="text/css" media="print">
		<link rel="stylesheet" href="prettyPhoto/css/prettyPhoto.css" type="text/css">
		<link rel="shortcut icon" href="images/favico.png" type="image/x-icon" />
		<script type="text/javascript" src="prettyPhoto/js/jquery-1.6.1.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="prettyPhoto/js/jquery.prettyPhoto.js" charset="utf-8"></script>
	</head>
	<body>
		<script type="text/javascript">
			$(document).ready(function(){
				$("a[rel^='prettyPhoto']").prettyPhoto();
			});
		</script>
		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php require 'single_picture.php' ?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>