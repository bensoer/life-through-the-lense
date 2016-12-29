<!-- member page subscriptions tab -->
<?php
	// create mysql connection
	$con = mysqli_connect("mysql.alchemistgamestudio.com", "groupa7", "4p3rtur3!", "a7photo");
	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  
	$name = $_SESSION['SESS_NAME'];
	
	$tagInfo = mysqli_query($con,"SELECT * FROM users WHERE name='$name'");
	if(!$tagInfo){
		echo "mysqli_query didn't work.";
	}
	$tags = 0;
	while($tagData = mysqli_fetch_array($tagInfo)) {
		$tags = $tagData['tags'];
	}
	
	$project365 = false;
	$macroLens = false;
	$iPhone = false;
	$indoors = false;
	$outdoors = false;
	$panorama = false;
	$longExposure = false;
	$architecture = false;
	$landscape = false;
	$nature = false;
	$animals = false;
	$abstract = false;
	$colour = false;
	$blackWhite = false;
	
	$tagArray = explode(",", $tags);
	foreach($tagArray as $tag) {
		if ($tag == "project365") {
			$project365 = true;
		}
		if ($tag == "macroLens") {
			$macroLens = true;
		}
		if ($tag == "iPhone") {
			$iPhone = true;
		}
		if ($tag == "indoors") {
			$indoors = true;
		}
		if ($tag == "outdoors") {
			$outdoors = true;
		}
		if ($tag == "panorama") {
			$panorama = true;
		}
		if ($tag == "longExposure") {
			$longExposure = true;
		}
		if ($tag == "architecture") {
			$architecture = true;
		}
		if ($tag == "landscape") {
			$landscape = true;
		}
		if ($tag == "nature") {
			$nature = true;
		}
		if ($tag == "animals") {
			$animals = true;
		}
		if ($tag == "abstract") {
			$abstract = true;
		}
		if ($tag == "colour") {
			$colour = true;
		}
		if ($tag == "blackWhite") {
			$blackWhite = true;
		}
	}
	mysqli_close($con);
?>

<div id="subscriptions">
	<fieldset>
		<legend>Subscriptions</legend>
		<p>Select the tags you would like to subscribe to. Hitting "Update Subscriptions" will save your changes and allow you to receive notifications for any tags you have slected.</p>
		<form method = "post" id="subscription_form" action="subscriptions.php">
			<div id="subscription_left">
				<input type="checkbox" name="Project365" id="Project365"
				<?php
					if($project365) { echo 'checked="checked"'; }
				?>	>
					<label for="Project365" title="Photos that were used in Project 365.">Project 365</label><br>
				<input type="checkbox" name="MacroLens" id="MacroLens"
				<?php
					if($macroLens) { echo 'checked="checked"'; }
				?>	>
					<label for="MacroLens" title="Photos using a lens specializing in up close shots.">Macro Lens</label><br>
				<input type="checkbox" name="IPhone" id="IPhone"
				<?php
					if($iPhone) { echo 'checked="checked"'; }
				?>	>
					<label for="IPhone" title="Photos taken using an iphone camera.">IPhone</label><br>
				<input type="checkbox" name="Indoors" id="Indoors"
				<?php
					if($indoors) { echo 'checked="checked"'; }
				?>	>
					<label for="Indoors" title="Photos taken indoors.">Indoors</label><br>
				<input type="checkbox" name="Outdoors" id="Outdoors"
				<?php
					if($outdoors) { echo 'checked="checked"'; }
				?>	>
					<label for="Outdoors" title="Photos taken outdoors.">Outdoors</label><br>
				<input type="checkbox" name="Panorama" id="Panorama"
				<?php
					if($panorama) { echo 'checked="checked"'; }
				?>	>
					<label for="Panoama">Panorama</label><br>
				<input type="checkbox" name="LongExposure" id="LongExposure"
				<?php
					if($longExposure) { echo 'checked="checked"'; }
				?>	>
					<label for="LongExposure" title="Photos taken while extending the exposure rate.">Long Exposure</label><br>
				<br><br>
				<input type="submit" value="Update Subscriptions">
			</div>
			<div id="subscription_right">
				<input type="checkbox" name="Architecture" id="Architecture"
				<?php
					if($architecture) { echo 'checked="checked"'; }
				?>	>
					<label for="Architecture" title="Photos primarily featuring buildings and other architecture.">Architecture</label><br>
				<input type="checkbox" name="Landscape" id="Landscape"
				<?php
					if($landscape) { echo 'checked="checked"'; }
				?>	>
					<label for="Landscape" title="Photos primarily featuring landscapes.">Landscape</label><br>
				<input type="checkbox" name="Nature" id="Nature"
				<?php
					if($nature) { echo 'checked="checked"'; }
				?>	>
					<label for="Nature" title="Photos primarily featuring nature.">Nature</label><br>
				<input type="checkbox" name="Animals" id="Animals"
				<?php
					if($animals) { echo 'checked="checked"'; }
				?>	>
					<label for="Animals" title="Photos primarily featuring animals.">Animals</label><br>
				<input type="checkbox" name="Abstract" id="Abstract"
				<?php
					if($abstract) { echo 'checked="checked"'; }
				?>	>
					<label for="Abstract" title="Photos of oddities and strange objects.">Abstract</label><br>
				<input type="checkbox" name="Colour" id="Colour"
				<?php
					if($colour) { echo 'checked="checked"'; }
				?>	>
					<label for="Colour" title="Photos taken in colour.">Colour</label><br>
				<input type="checkbox" name="BlackWhite" id="BlackWhite"
				<?php
					if($blackWhite) { echo 'checked="checked"'; }
				?>	>
					<label for="BlackWhite" title="Photos taken in black and white.">Black and White</label><br>
			</div>
			
		</form>
	</fieldset>
</div>