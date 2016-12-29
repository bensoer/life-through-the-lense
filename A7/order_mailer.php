<?php
$name = $_POST['name'];
$email = $_POST['email1'];
$address = $_POST['tel'];
$telephone = $_POST['address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postalcode = $_POST['postalcode'];
$description = $_POST['pic_descript'];

//email with data to Life From The Lense
$to = "lifettl@hotmail.com";
$subject = "Print Order";
$message =	"Name:".
			$name . "\r".
			"Email: ".
			$email . "\r\r".
			"Address:".
			$address . "\r\r".
			"Telephone:".
			$telephone . "\r\r".
			"City:".
			$city . "\r\r".
			"Province: ".
			$province . "\r\r".
			"Postal Code:".
			$postalcode . "\r\r".
			"Photo Description: ".
			$description . "\r\r";
			
mail($to,$subject,$message, "From: ". $email);

//confirmation email data was sent
$to = $email;
$subject = "Your Order: Confirmation of Recieval";
$message = "Thank-you for ordering a print from Life Through The Lense." . "\r" . "We will contact you again when your order has been sent" . "\r\r" . "Sincerely," . "\r" . "Life Through The Lense Team";
mail($to,$subject,$message, "From:"."lifettl@hotmail.com");
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - Members</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="member_about.css" type="text/css">
	</head>
	<body>
		<!-- The header section - defines structure for all header elements -->
		<div id="header">
	<div class="content">
		<!-- header_left contains the logo, title and main navigation list -->
		<div id="header_left">
			<div id="logo">
				<a href="index.php"><img src="images/a7_logo.gif" width="50" height="50" alt="logo"></a>
			</div>
			<div>
				<div id="title">
					Life Through The Lens
				</div>
				<div>
					<ul class="nav">
						<li><a href="picture.php?photoName=random">Random Photo</a></li>
						<li><a href="project365.php">Project 365</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="members.php">Members</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- header_right contains the search form, login and sign up links -->
		<div id="header_right">
			<form id="search_form">
				<label id="search_label">Search: <input type="text" name="search"></label>
			</form>
			<span id="login_link"><a href="login.php">Log in</a> or <a href="signup.php">Sign up</a></span>
		</div>
	</div>
</div>		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<div class="content">
	<!-- the main_right section contains the written content, stats and various forms a member may want to use -->
	<div id="main_right">
	<!-- altered form page showing only message and option to return to members page -->
		<div id="form">
	<fieldset>
		<legend>Order Form</legend>
		  <p id="page_title">Thank You For Ordering.</p>
		  <p> A confirmation email has been sent</p>
		  <a href="members.php">Return To Members Page</a>
	</fieldset>
</div>	</div>
</div>		</div>
		<!-- the footer section contains the site map navigation list -->
		<div id="footer">
	<div id="sitemap">
		<ul class="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="picture.php">Random Photo</a></li>
			<li><a href="project365.php">Project 365</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="members.php">Members</a></li>
			<li><a href="signup.php">Sign Up</a></li>
		</ul>
	</div>
</div>	</body>
</html>
