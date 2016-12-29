<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - Website Shell</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="login_style.css" type="text/css">
		<link rel="shortcut icon" href="images/favico.png" type="image/x-icon" />
		<script>
			//checks if capslock is on (used on log in page)
			function isCapsLockOn(e) {
				var charKeyCode = e.keyCode ? e.keyCode : e.which; // To work with both MSIE & Netscape
				var shiftKey = e.shiftKey ? e.shiftKey : ((charKeyCode == 16) ? true : false);
				// Check both the condition as described above

				if (((charKeyCode >= 65 && charKeyCode <= 90) && !shiftKey) || ((charKeyCode >= 97 && charKeyCode <= 122) && shiftKey)) {
					// Caps lock is on

					document.getElementById('capslock').innerHTML = "Warning: Caps Lock is On";
				}else{
					document.getElementById('capslock').innerHTML = ""
				}
			}
			
			
		</script>
	</head>
	<body>
		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php require 'login_form.php' ?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>