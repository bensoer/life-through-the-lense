<?php
	
	// create mysql connection
	$con = mysqli_connect("mysql.alchemistgamestudio.com", "groupa7", "4p3rtur3!", "a7photo");
	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  
	
	
	// grab array of pictures and pick the right one
	$photoArray = glob("pictures/*.{jpg,JPG}", GLOB_BRACE);
	$exist = false;
	
	// if photoName is set, remove folder and file extension
	// else, set $photo to an empty string
	if(isset($_GET["photoName"])){
		$photo = $_GET["photoName"];
		$photoArray2 = $photoArray;
		foreach($photoArray2 as &$value){
			$value = preg_replace('/pictures\//', '', $value);
			$value = preg_replace('/\.(jpg|JPG)/', '', $value);
			if($value == $photo)
				$exist = true;
		}
		
		unset($value);
	} else {
		$photo = '';
	}

	// if photoName is random, empty or no $_GET variable exists
	// grab a random photo
	if($photo == 'random' || $photo == '' || $exist == false) {
		global $photo;
		global $photoArray;
		$landPhoto;
		$portPhoto;
		
		foreach($photoArray as &$value){
			$img = getimagesize($value);
			$value = preg_replace('/pictures\//', '', $value);
			$value = preg_replace('/\.(jpg|JPG)/', '', $value);
			if($img[0] > $img[1]){
				$landPhoto[] = $value;
			} else {
				$portPhoto[] = $value;
			}
		}
		
		unset($value);
		
		$randomPhoto = rand(0,1);
		if($randomPhoto == 0){
			$photo = $landPhoto[rand(0, count($landPhoto)-1)];
		} else {
			$photo = $portPhoto[rand(0, count($portPhoto)-1)];
		}
	}

	//Set default photo name, description, and tags
	$pName = "Blugga Blaw";
	$pDescription = "The bluggidy blawdiest.";
	$pTagData = "";
	
	// query for image name, description and tags from database
	$images = mysqli_query($con,"SELECT name, filename, description, tags FROM image");
	if(!$images){
		echo "mysqli_query didn't work.";
	}
	while($imageData = mysqli_fetch_array($images)) {
		if($imageData['filename'] == $photo) {
			$pName = $imageData['name'];
			$pDescription = $imageData['description'];
			$pTagData = $imageData['tags'];
		}
	}
	
	mysqli_close($con);
	
	// set the correct file extension so the photo displays properly
	$fileName = $photo . '.jpg';
	if(!file_exists('pictures/' . $fileName)){
		$fileName = $photo . '.JPG';
	}
	
	// create an array of tags
	$pTags = explode(",",$pTagData);
	
	// Prints tags to the HTML document
	function printTags(){
		global $pTags;
		$count = 0;
		foreach($pTags as &$tag){
			if ($tag == "longExposure"){
				$tag = "Long Exposure";
			} else if ($tag == "macroLens"){
				$tag = "Macro Lens";
			} else if ($tag == "blackWhite"){
				$tag = "Black and White";
			} else if ($tag == "iphone"){
				$tag = "iPhone";
			} else {
				$tag = ucfirst($tag);
			}
			if($count == 4) {
				echo "</ul><ul class=\"image_tags\">";
			}
			echo "<li class=\"single_tag\">$tag</li>";
			$count++;
		}
	}
	
	/* The setClass function checks which image will be displayed
		sets the appropriate CSS classname and returns it. 
	*/
	function setClass(){
		global $photo;
		//$fileinfo = pathinfo('pictures/' . $photo);
		$img = 'pictures/' . $photo . '.jpg';
		if(!file_exists($img)){
			$img = 'pictures/' . $photo . '.JPG';
		}
		$imgInfo = getimagesize($img);
		$class;
		if($imgInfo[0] > $imgInfo[1]){
			$class = 'land_image';
		} else {
			$class = 'port_image';
		}
		return $class;
	}
?>

<div class="content">
	<!-- this is the single picture structure -->
	<div id="page_title"></div>
	<div>
		<!-- this is the single image container -->
		<div id="image_container">
			<div id="single_image_container">
				<a href="pictures/<?php echo $fileName; ?>" rel="prettyPhoto" title="<?php echo $pDescription;?>">
					<img class="<?php echo setClass(); ?>" src="pictures/<?php echo $fileName; ?>" alt="<?php echo $pName;?>" >
				</a>
			</div>
			<!-- image_info contains the image title, tags and a description -->
			<div class="image_info">
				<div class="image_info_header">
					<p>
						<span class="image_title"><?php echo $pName;?></span>
					</p>
					<p>
						<span class="section_title">Tags:</span>
						<ul class="image_tags">
							<?php printTags(); ?>
						</ul>
					<!--</p>-->
				</div>
				<div class="image_description">
					<span class="section_title">Description:</span>
					<p class="description_text">
						<?php echo $pDescription;?>
					</p>
				</div>
			</div>
		</div>
		<!-- comment_container holds the comment submit form and a list of posted comments -->
		<div id="comment_container">
			<!-- comment_box contains the comment submit form -->
			<div id="comment_box">
				<?php
					// allows logged in users to comment, others cannot
					if (isLoggedIn()) {
						require 'comment_form.php';
					} else {
						require 'comment_login.php';
					}
				?>
			</div>
			<!-- comment_list contains a list of posted comments -->
			<div id="comment_list">
				<?php require 'comment.php' ?>
				<!-- comment is a class that contains all the structure for a single comment -->
			</div>
		</div>
	</div>
</div>