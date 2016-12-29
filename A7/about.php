<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - About Page </title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="member_about.css" type="text/css">
		<link rel="shortcut icon" href="images/favico.png" type="image/x-icon" />
		<script>
			// these functions swap which panel is displayed on the page
			function loadBiography() {
				document.getElementById("biography").style.visibility="visible";
				document.getElementById("equipment_bio").style.visibility="hidden";
			}
			
			function loadEquipment() {
				document.getElementById("biography").style.visibility="hidden";
				document.getElementById("equipment_bio").style.visibility="visible";
			}		
		</script>
	</head>
	<body onload="loadBiography()">
		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php require 'about_content.php' ?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>