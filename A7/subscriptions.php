<?php
	session_start();

	//Check to see which tags are selected and add them to the array if they are
	//Project 365
	if(isset($_POST["Project365"])) {
		$tags[$count] = "project365";
		$count++;
		}
	//Macro Lens
	if (isset($_POST["MacroLens"])) {
		$tags[$count] = "macroLens";
		$count++;
		}
	//iPhone
	if (isset($_POST["IPhone"])) {
		$tags[$count] = "iPhone";
		$count++;
	}
	//Indoors
	if (isset($_POST["Indoors"])) {
		$tags[$count] = "indoors";
		$count++;
	}
	//Outdoors
	if (isset($_POST["Outdoors"])) {
		$tags[$count] = "outdoors";
		$count++;
	}
	//Panorama
	if (isset($_POST["Panorama"])) {
		$tags[$count] = "panorama";
		$count++;
	}
	//Long Exposure
	if (isset($_POST["LongExposure"])) {
		$tags[$count] = "longExposure";
		$count++;
	}
	//Architecture
	if (isset($_POST["Architecture"])) {
		$tags[$count] = "architecture";
		$count++;
	}
	//Landscape
	if (isset($_POST["Landscape"])) {
		$tags[$count] = "landscape";
		$count++;
	}
	//Nature
	if (isset($_POST["Nature"])) {
		$tags[$count] = "nature";
		$count++;
	}
	//Animals
	if (isset($_POST["Animals"])) {
		$tags[$count] = "animals";
		$count++;
	}
	//Abstract
	if (isset($_POST["Abstract"])) {
		$tags[$count] = "abstract";
		$count++;
	}
	//Colour
	if (isset($_POST["Colour"])) {
		$tags[$count] = "colour";
		$count++;
		}
	//Black and White
	if (isset($_POST["BlackWhite"])) {
		$tags[$count] = "blackWhite";
		$count++;
		}
	//Set the list of tags for the user
	if ($count > 0) {
		$tag = implode(",",$tags);
	} else {
		$tag = "";
	}
	//connect to database
	$con = mysqli_connect("mysql.alchemistgamestudio.com", "groupa7", "4p3rtur3!", "a7photo");
	// Check connection
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//update tags for the signed in user
	$name = $_SESSION['SESS_NAME'];
	$sql = "UPDATE users SET tags='$tag' WHERE name='$name'";
	$result = mysqli_query($con, $sql);
	//check to ensure update worked
	if ($result) {
		header("location: members.php");
		exit();
	} else {
		echo "Error".mysql_error();
	}
	
	mysqli_close($con);
?>