<?php
	
	/*picks a random photo from an array, checks for a duplicate on the
	page and finds a new one if there is*/
	function randomPhoto($pName){
		global $pagePhotos;
		$newPic = false;
		$duplicate = false;
		while($newPic == false){
			$output = $pName[rand(0, count($pName)-1)];
			if(count($pagePhotos) == 0){
				$newPic = true;
				$pagePhotos[] = $output;
			} else {
				foreach($pagePhotos as &$pic){
					if($pic == $output){
						$duplicate = true;
					}
				}
				if(!$duplicate){
					$newPic = true;
					$pagePhotos[] = $output;
				}
			}
		}
		return $output;
	}
	
	//grabs all photos in the pictures folder and places them in an array
	$photoArray = glob("pictures/*.{jpg,JPG}", GLOB_BRACE);
	
	//initialize landscape, portrait and page photo arrays
	$landPhoto;
	$portPhoto;
	$pagePhotos;
	
	/*checks each photo to see if they are landscape or portrait,
	checks for 'pictures/' and removes it, and places the photo name
	in the appropriate array */
	foreach($photoArray as &$value){
		$img = getimagesize($value);
		$value = preg_replace('/pictures\//', '', $value);
		if($img[0] > $img[1]){
			$landPhoto[] = $value;
		} else {
			$portPhoto[] = $value;
		}
	}
	
	//removes last array item from $value
	unset($value);
?>

<div class="content">
<div id="page_title">HOME</div>
	<!-- The images div contains structure for random photos-->
	<div id="images">
		<div id="topleftimage">
			<script>
				randomPort2("<?php echo randomPhoto($portPhoto) ?>");
			</script>
		</div>
		<div id="topmiddleimage">
			<script>
				randomLand2("<?php echo randomPhoto($landPhoto) ?>");
			</script>
		</div>
		<div id="toprightimage">
			<script>
				randomPort2("<?php echo randomPhoto($portPhoto) ?>");
			</script>
		</div>
		<div id="bottomleftimage">
			<script>
				randomPort2("<?php echo randomPhoto($portPhoto) ?>");
			</script>
		</div>
		<div id="bottommiddleimage">
			<script>
				randomLand2("<?php echo randomPhoto($landPhoto) ?>");
			</script>
		</div>
		<div id="bottomrightimage">
			<script>
				randomPort2("<?php echo randomPhoto($portPhoto) ?>");
			</script>
		</div>
		<div id="centerimage">
			<script>
				randomLand2("<?php echo randomPhoto($landPhoto) ?>");
			</script>
		</div>
	</div>
</div>
