<?php
	//session has already been started in tags form
	
	// create mysql connection
	$con = mysqli_connect("mysql.alchemistgamestudio.com", "groupa7", "4p3rtur3!", "a7photo");
	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// check to make sure all necessary session variables have values
	if(!array_key_exists('target',$_SESSION)) {
		$_SESSION['target'] = 0;
	}
	if(!array_key_exists('view',$_SESSION)) {
		$_SESSION['view'] = 9;
	}
	if(!array_key_exists('page',$_SESSION)) {
		$_SESSION['page'] = 1;
	}
	if(!array_key_exists('count',$_SESSION) || $_SESSION['count'] == 0 && $_SESSION['target'] == 0) {
		$_SESSION['count'] = 0;
		$value = mysqli_query($con,"SELECT * FROM image");
		while($row = mysqli_fetch_array($value)) {
			$_SESSION['count']++;
		}
	}


	//populate navigation buttons, depending on page
	echo '<div class="image_navigation">';
	echo '<ul>';
	if($_SESSION['page'] == 1) {
		echo '<li><img src="images/nofirst.png" height="40" width="40" alt="First page"></li>';
		echo '<li><img src="images/noback.png" height="40" width="40" alt="Back a page"></li>';
	} else {
		echo '<li><a href="navigation/first.php"><img src="images/first.png" height="40" width="40" alt="First page"></a></li>';
		echo '<li><a href="navigation/back.php"><img src="images/back.png" height="40" width="40" alt="Back a page"></a></li>';
	}
	echo '<li> Page '.$_SESSION['page'].' ('.($_SESSION['page']*$_SESSION['view']-$_SESSION['view']+1).'-'.$_SESSION['page']*$_SESSION['view'].')</li>';
	if($_SESSION['page'] >= ceil($_SESSION['count'] / $_SESSION['view'])) {
		echo '<li><img src="images/noforward.png" height="40" width="40" alt="First page"></li>';
		echo '<li><img src="images/nolast.png" height="40" width="40" alt="Back a page"></li>';
	} else {
		echo '<li><a href="navigation/next.php"><img src="images/forward.png" height="40" width="40" alt="Next Page"></a></li>';
		echo '<li><a href="navigation/last.php"><img src="images/last.png" height="40" width="40" alt="Last Page"></a></li>';
	}
	echo '</ul>';
	echo '</div>';
	
	 
	// Set start and end index, and beginning photo location
	$spot = 'left';
	$start = $_SESSION['view'] * ($_SESSION['page'] - 1) + 1;
	$finish = $_SESSION['view'] * $_SESSION['page'];
	 
	$photo = ""; 
	 // checks to see if any tags are set, if they are, filters photos by tag, otherwise just prints out photos straight from the database
	if ($_SESSION['target'] > 0) {
		$value = mysqli_query($con,"SELECT * FROM image");
		$timer = 0;
		while($row = mysqli_fetch_array($value)){
		// go through index of photos to see which ones are to be displayed, and display them as long as they haven't been displayed already
			for($x = 0; $x < count($_SESSION['display']); $x++){
				if ($row['index'] == $_SESSION['display'][$x]) {
					// check to see if it's time to start displaying photos
					if ($start == 1 && $timer < $_SESSION['view']) {
						$timer++;
						echo '<div class="thumb'.$spot.'">';
							echo '<a href="picture.php?photoName='.$row['filename'].'">';
								$photo = $row['filename'].'.jpg';
								if(!file_exists('thumbs/' . $photo)){
									$photo = $row['filename'].'.JPG';
								}
								echo '<img src="thumbs/'.$photo.'" height="'.(floor($row['height_thumb']*0.65)).'" width="'.(floor($row['width_thumb']*0.65)).'" alt="'.$row['description'].'">';
							echo '</a>';
						echo '</div>';
						// cycle location
						if ($spot == 'left') {
							$spot = 'mid';
						} else if ($spot == 'mid') {
							$spot = 'right';
						} else {
							$spot = 'left';
							echo '<br>';
						}
					} else if($start > 1) {
						//not time to display photo yet, but decrease start by one to get closer
						$start--;
					}
				}
			}
			
		}
		//clear the float for easy naviagtion
		if ($spot == 'mid') {
			echo '<div class="thumbmid"></div><div class="thumbright"></div><br>';
		} else if ($spot == 'right') {
			echo '<div class="thumbright"></div><br>';
		}
	} else {
		//Draw the images
		$value = mysqli_query($con,"SELECT * FROM image");
		while($row = mysqli_fetch_array($value)){
			if ($row['index'] >= $start && $row['index'] <= $finish) {
				echo '<div class="thumb'.$spot.'">';
					echo '<a href="picture.php?photoName='.$row['filename'].'">';
						$photo = $row['filename'].'.jpg';
						if(!file_exists('thumbs/' . $photo)){
							$photo = $row['filename'].'.JPG';
						}
						echo '<img src="thumbs/'.$photo.'" height="'.(floor($row['height_thumb']*0.65)).'" width="'.(floor($row['width_thumb']*0.65)).'" alt="'.$row['description'].'">';
					echo '</a>';
				echo '</div>';
				// cycle location
				if ($spot == 'left') {
					$spot = 'mid';
				} else if ($spot == 'mid') {
					$spot = 'right';
				} else {
					$spot = 'left';
					echo '<br>';
				}
			}
		}
	}
	
	//populate navigation buttons, depending on page
	
	echo '<div class="image_navigation">';
	echo '<ul>';
	if($_SESSION['page'] == 1) {
		echo '<li><img src="images/nofirst.png" height="40" width="40" alt="First page"></li>';
		echo '<li><img src="images/noback.png" height="40" width="40" alt="Back a page"></li>';
	} else {
		echo '<li><a href="navigation/first.php"><img src="images/first.png" height="40" width="40" alt="First page"></a></li>';
		echo '<li><a href="navigation/back.php"><img src="images/back.png" height="40" width="40" alt="Back a page"></a></li>';
	}
	echo '<li> Page '.$_SESSION['page'].' ('.($_SESSION['page']*$_SESSION['view']-$_SESSION['view']+1).'-'.$_SESSION['page']*$_SESSION['view'].')</li>';
	if($_SESSION['page'] >= ceil($_SESSION['count'] / $_SESSION['view'])) {
		echo '<li><img src="images/noforward.png" height="40" width="40" alt="First page"></li>';
		echo '<li><img src="images/nolast.png" height="40" width="40" alt="Back a page"></li>';
	} else {
		echo '<li><a href="navigation/next.php"><img src="images/forward.png" height="40" width="40" alt="Next Page"></a></li>';
		echo '<li><a href="navigation/last.php"><img src="images/last.png" height="40" width="40" alt="Last Page"></a></li>';
	}
	echo '</ul>';
	echo '</div>';
	
	mysqli_close($con);
?>