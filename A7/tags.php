<?PHP
	//Start the session
	session_start();
	
	//reset target tag count
	$_SESSION['target'] = 0;
	$_SESSION['count'] = 0;
	$_SESSION['display'] = null;
	//Check each tag to see if it is selected, and if it is, set session value to true, if not selected set to false
	//Project 365
	if(isset($_POST["project365"])) {
		$_SESSION['project365'] = true;
		$target_tags[$_SESSION['target']] = 'project365';
		$_SESSION['target']++;
	} else {
		$_SESSION['project365'] = false;
	}
	//Macro Lens
	if (isset($_POST["macroLens"])) {
		$_SESSION['macroLens'] = true;
		$target_tags[$_SESSION['target']] = 'macroLens';
		$_SESSION['target']++;
	} else {
		$_SESSION['macroLens'] = false;
	}
	//iPhone
	if (isset($_POST["iPhone"])) {
		$_SESSION['iPhone'] = true;
		$target_tags[$_SESSION['target']] = 'iPhone';
		$_SESSION['target']++;
	} else {
		$_SESSION['iPhone'] = false;
	}
	//Indoors
	if (isset($_POST["indoors"])) {
		$_SESSION['indoors'] = true;
		$target_tags[$_SESSION['target']] = 'indoors';
		$_SESSION['target']++;
	} else {
		$_SESSION['indoors'] = false;
	}
	//Outdoors
	if (isset($_POST["outdoors"])) {
		$_SESSION['outdoors'] = true;
		$target_tags[$_SESSION['target']] = 'outdoors';
		$_SESSION['target']++;
	} else {
		$_SESSION['outdoors'] = false;
	}
	//Panorama
	if (isset($_POST["panorama"])) {
		$_SESSION['panorama'] = true;
		$target_tags[$_SESSION['target']] = 'panorama';
		$_SESSION['target']++;
	} else {
		$_SESSION['panorama'] = false;
	}
	//Long Exposure
	if (isset($_POST["longExposure"])) {
		$_SESSION['longExposure'] = true;
		$target_tags[$_SESSION['target']] = 'longExposure';
		$_SESSION['target']++;
	} else {
		$_SESSION['longExposure'] = false;
	}
	//Architecture
	if (isset($_POST["architecture"])) {
		$_SESSION['architecture'] = true;
		$target_tags[$_SESSION['target']] = 'architecture';
		$_SESSION['target']++;
	} else {
		$_SESSION['architecture'] = false;
	}
	//Landscape
	if (isset($_POST["landscape"])) {
		$_SESSION['landscape'] = true;
		$target_tags[$_SESSION['target']] = 'landscape';
		$_SESSION['target']++;
	} else {
		$_SESSION['landscape'] = false;
	}
	//Nature
	if (isset($_POST["nature"])) {
		$_SESSION['nature'] = true;
		$target_tags[$_SESSION['target']] = 'nature';
		$_SESSION['target']++;
	} else {
		$_SESSION['nature'] = false;
	}
	//Animals
	if (isset($_POST["animals"])) {
		$_SESSION['animals'] = true;
		$target_tags[$_SESSION['target']] = 'animals';
		$_SESSION['target']++;
	} else {
		$_SESSION['animals'] = false;
	}
	//Abstract
	if (isset($_POST["abstract"])) {
		$_SESSION['abstract'] = true;
		$target_tags[$_SESSION['target']] = 'abstract';
		$_SESSION['target']++;
	} else {
		$_SESSION['abstract'] = false;
	}
	//Colour
	if (isset($_POST["colour"])) {
		$_SESSION['colour'] = true;
		$target_tags[$_SESSION['target']] = 'colour';
		$_SESSION['target']++;
	} else {
		$_SESSION['colour'] = false;
	}
	//Black and White
	if (isset($_POST["blackWhite"])) {
		$_SESSION['blackWhite'] = true;
		$target_tags[$_SESSION['target']] = 'blackWhite';
		$_SESSION['target']++;
	} else {
		$_SESSION['blackWhite'] = false;
	}
	//Checks to see how many pictures per page is selected, and sets the Session value to that
	if ($_POST['view'] == "view9") {
		$_SESSION['view'] = 9;
		$_SESSION['page'] = 1;
	} else if ($_POST['view'] == "view18") {
		$_SESSION['view'] = 18;
		$_SESSION['page'] = 1;
	} else if ($_POST['view'] == "view36") {
		$_SESSION['view'] = 36;
		$_SESSION['page'] = 1;
	}
	
	
	
	//if any tags are selected, set up the array of photos to be displayed
	if ($_SESSION['target'] > 0) {
		//connect to database
		$con = mysqli_connect("mysql.alchemistgamestudio.com", "groupa7", "4p3rtur3!", "a7photo");
		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$value = mysqli_query($con,"SELECT * FROM image");
		while($row = mysqli_fetch_array($value)){
			$matches = 0;
			//set up picture's tag array
			$tags = explode(",",$row['tags']);
			//compare picture's tags with target tags
			for($x = 0; $x < count($target_tags); $x++) {
				for($y = 0; $y < count($tags); $y++) {
					//if tags match, increase number of matches
					if(rtrim($tags[$y]) == $target_tags[$x]){
						$matches++;
					}
				}
			}
			// if all selected tags matched, then add photo index to the display array
			if($matches == $_SESSION['target']){
				$_SESSION['display'][$_SESSION['count']] = $row['index'];
				//echo $_SESSION['display'][$_SESSION['count']].'<br>';
				$_SESSION['count']++;
			}
		}
		mysqli_close($con);
	}


	//Return to the gallery page
	header('location: gallery.php');
	exit();

?>