<?php
	include 'functions.php';
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_users="users"; // Table name
?>

<div id="header">
	<div class="content">
		<!-- header_left contains the logo, title and main navigation list -->
		<div id="header_left">
			<div id="logo">
				<a href="index.php"><img src="images/a7_logo2.gif" width="50" height="50" alt="Life Through The Lens Logo"></a>
			</div>
			<div>
				<div id="title">
					Life Through The Lens
				</div>
				<div>
					<!-- The main site navigation -->
					<ul class="nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="picture.php?photoName=random">Random Photo</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="members.php">Members</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- header_right contains the search form, login and sign up links -->
		<div id="header_right">
			<span id="login_link">
			<?php
				// if the user is logged in, their name is displayed
				// and an option to log out. Otherwise a login and signup link is displayed
				if (isLoggedIn()){
					echo 'Hi ';
					echo $_SESSION['SESS_NAME'];
					echo '! ';
					echo '<span id="logout_link"><a href="logout.php">Logout</a></span>';
				} else {
					echo '<a href="login.php">Log in</a> or <a href="signup.php">Sign up</a>';
				}
			?>
			</span>
		</div>
	</div>
</div>