<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - Website Shell</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="signup_style.css" type="text/css">
		<link rel="shortcut icon" href="images/favico.png" type="image/x-icon" />
		<script>
			function $(id){
				var element = document.getElementById(id);
				if( element == null )
					alert( 'Programmer error: ' + id + ' does not exist.' );
				return element;
			}
			//Checks email suffix and @ symbol
			function testEmailValid(id) {
				if ($(id).value == '') {
					$(id + '_error').innerHTML = "Please enter an email address.";
					return true;
				}
				else {
					if($(id).value.match(/.com|.ca|.org$/) != null && $(id).value.match(/@/) != null) {
						$(id + '_error').innerHTML = "";
						return true;
					}
				}
			}
			function warnEmailInvalid(id) {
				if(!testEmailValid(id)) {
					$(id + '_error').innerHTML = "Email is invalid. Please make sure it contains an @ symbol and a proper suffix.";
				}
			}
			//Checks if name uses only digits, characters and underscores
			function testNameValid(id) {
				if ($(id).value == '') {
					$(id + '_error').innerHTML = "Please enter a login name.";
					return true;
				}
				else {
					if($(id).value.match(/^[\w]+$/) != null) {
						$(id + '_error').innerHTML = "";
						return true;
					}
				}
			}
			function warnNameInvalid(id) {
				if(!testNameValid(id)) {
					$(id + '_error').innerHTML = "Login name is invalid. Please make sure it contains only digits, characters or underscores.";
				}
			}
			//Check to see if passwords are at least 8 characters and checks to see if they match
			function testPasswordValid(id) {
				if ($(id + '_0').value == '' || $(id + '_1').value == '') {
					$(id + '_error').innerHTML = "Please enter a password for both fields.";
					return true;
				}
				else {
					if ($(id + '_0').value.length >= 8 || $(id + '_1').value.length >= 8) {
						if ($(id + '_0').value == $(id + '_1').value) {
							$(id + '_error').innerHTML = "";
							return true;
						}
					}
				}
			}
			function warnPasswordInvalid(id) {
				if(!testPasswordValid(id)) {
					$(id + '_error').innerHTML = "Passwords must be at least 8 characters and they must match.";
				}
			}
		</script>
	</head>
	<body>

		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php require 'signup_form.php' ?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>