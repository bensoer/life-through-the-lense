<?php
	//Checks to ensure the view picutres per page has a valid value
	if (!array_key_exists('view', $_SESSION)){
		$_SESSION['view'] = 9;
	} else if($_SESSION['view'] != 9 && $_SESSION['view'] != 18 && $_SESSION['view'] != 36) {
		$_SESSION['view'] = 9;
	}
	//Checks to ensure that the session tags have a value. If one tag does not, the rest do not, so it sets them all.
	if (!array_key_exists('project365', $_SESSION)) {
		$_SESSION['project365'] = false;
		$_SESSION['macroLens'] = false;
		$_SESSION['iPhone'] = false;
		$_SESSION['indoors'] = false;
		$_SESSION['outdoors'] = false;
		$_SESSION['panorama'] = false;
		$_SESSION['longExposure'] = false;
		$_SESSION['architecture'] = false;
		$_SESSION['landscape'] = false;
		$_SESSION['nature'] = false;
		$_SESSION['animals'] = false;
		$_SESSION['abstract'] = false;
		$_SESSION['colour'] = false;
		$_SESSION['blackWhite'] = false;
	}
	
?>
<div id="tagform">
	<fieldset>
	<legend>Select Tags to include</legend>
	<form method="post" id="tagsearch" action="tags.php">
		<?php //check to see if Project 365 filter is on
			if ($_SESSION['project365']) {
				echo '<input type="checkbox" name="project365" id="project365" checked="checked">';
			} else {
				echo '<input type="checkbox" name="project365" id="project365">';
			}
		?>
			<label for="project365" title="Photos that were used in Project 365.">Project 365</label>
		<?php // check to see if Macro Lens filter is on
			if ($_SESSION['macroLens']) {
				echo '<input type="checkbox" name="macroLens" id="macroLens" checked="checked">';
			} else {
				echo '<input type="checkbox" name="macroLens" id="macroLens">';
			}
		?>
			<label for="macroLens" title="Photos using a lens specializing in up close shots.">Macro Lens</label>
		<?php // check to see if iPhone filter is on
			if ($_SESSION['iPhone']) {
				echo '<input type="checkbox" name="iPhone" id="iPhone" checked="checked">';
			} else {
				echo '<input type="checkbox" name="iPhone" id="iPhone">';
			}
		?>
			<label for="iPhone" title="Photos taken using an iphone camera.">IPhone</label>
		<?php // check to see if Indoors filter is on
			if ($_SESSION['indoors']) {
				echo '<input type="checkbox" name="indoors" id="indoors" checked="checked">';
			} else {
				echo '<input type="checkbox" name="indoors" id="indoors">';
			}
		?>
			<label for="indoors" title="Photos taken indoors.">Indoors</label>
		<?php // check to see if outdoors filter is on
			if ($_SESSION['outdoors']) {
				echo '<input type="checkbox" name="outdoors" id="outdoors" checked="checked">';
			} else {
				echo '<input type="checkbox" name="outdoors" id="outdoors">';
			}
		?>
			<label for="outdoors" title="Photos taken outdoors.">Outdoors</label>
		<?php // check to see if Panorama filter is on
			if ($_SESSION['panorama']) {
				echo '<input type="checkbox" name="panorama" id="panorama" checked="checked">';
			} else {
				echo '<input type="checkbox" name="panorama" id="panorama">';
			}
		?>
			<label for="panorama">Panorama</label>
		<?php // check to see if Long Exposure filter is on
			if ($_SESSION['longExposure']) {
				echo '<input type="checkbox" name="longExposure" id="longExposure" checked="checked">';
			} else {
				echo '<input type="checkbox" name="longExposure" id="longExposure">';
			}
		?>
			<label for="longExposure" title="Photos taken while extending the exposure rate.">Long Exposure</label>
		<br>
		<?php // check to see if Architecture filter is on
			if ($_SESSION['architecture']) {
				echo '<input type="checkbox" name="architecture" id="architecture" checked="checked">';
			} else {
				echo '<input type="checkbox" name="architecture" id="architecture">';
			}
		?>
			<label for="architecture" title="Photos primarily featuring buildings and other architecture.">Architecture</label>
		<?php // check to see if Landscape filter is on
			if ($_SESSION['landscape']) {
				echo '<input type="checkbox" name="landscape" id="landscape" checked="checked">';
			} else {
				echo '<input type="checkbox" name="landscape" id="landscape">';
			}
		?>
			<label for="landscape" title="Photos primarily featuring landscapes.">Landscape</label>
		<?php // check to see if Nature filter is on
			if ($_SESSION['nature']) {
				echo '<input type="checkbox" name="nature" id="nature" checked="checked">';
			} else {
				echo '<input type="checkbox" name="nature" id="nature">';
			}
		?>
			<label for="nature" title="Photos primarily featuring nature.">Nature</label>
		<?php // check to see if Animal filter is on
			if ($_SESSION['animals']) {
				echo '<input type="checkbox" name="animals" id="animals" checked="checked">';
			} else {
				echo '<input type="checkbox" name="animals" id="animals">';
			}
		?>
			<label for="animals" title="Photos primarily featuring animals.">Animals</label>
		<?php // check to see if Abstract filter is on
			if ($_SESSION['abstract']) {
				echo '<input type="checkbox" name="abstract" id="abstract" checked="checked">';
			} else {
				echo '<input type="checkbox" name="abstract" id="abstract">';
			}
		?>
			<label for="abstract" title="Photos of oddities and strange objects.">Abstract</label>
		<?php // check to see if Colour filter is on
			if ($_SESSION['colour']) {
				echo '<input type="checkbox" name="colour" id="colour" checked="checked">';
			} else {
				echo '<input type="checkbox" name="colour" id="colour">';
			}
		?>
			<label for="colour" title="Photos taken in colour.">Colour</label>
		<?php // check to see if Black and White filter is on
			if ($_SESSION['blackWhite']) {
				echo '<input type="checkbox" name="blackWhite" id="blackWhite" checked="checked">';
			} else {
				echo '<input type="checkbox" name="blackWhite" id="blackWhite">';
			}
		?>
			<label for="blackWhite" title="Photos taken in black and white.">Black and White</label>
		<br>
		<label>View per page</label>
			<?php //Determine which view button is checked
				if ($_SESSION['view'] == 9) {
					echo '<label><input type="radio" name="view" value="view9" id="view9" checked="checked">9 pictures </label>';
				} else {
					echo '<label><input type="radio" name="view" value="view9" id="view9">9 pictures </label>';
				}
				if ($_SESSION['view'] == 18) {
					echo '<label><input type="radio" name="view" value="view18" id="view18" checked="checked">18 pictures </label>';
				} else {
					echo '<label><input type="radio" name="view" value="view18" id="view18">18 pictures </label>';
				}
				if ($_SESSION['view'] == 36) {
					echo '<label><input type="radio" name="view" value="view36" id="view36" checked="checked">36 pictures </label>';
				} else {
					echo '<label><input type="radio" name="view" value="view36" id="view36">36 pictures </label>';
				}
			?>
		<input type="submit" value="Update" id="update">
	</form>
	</fieldset>
</div>