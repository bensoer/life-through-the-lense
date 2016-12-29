var picture = new Array();
var picturepage = new Array();

//Takes random images of either portrait or landscape orientations
//and writes the appropriate HTML tags to the document

function randomPort2(pName){

	var imgTag = '<img src="thumbs/' + pName + '" height="300px" width="200px" alt="An alt">';
	var phpVar = pName.replace(/\.(jpg|JPG)/,"");
	document.write('<a href="picture.php?photoName=' + phpVar + '">' + imgTag + '</a>');
}

function randomLand2(pName){

	var imgTag = '<img src="thumbs/' + pName + '" height="200px" width="300px" alt="An alt">';
	var phpVar = pName.replace(/\.(jpg|JPG)/,"");
	document.write('<a href="picture.php?photoName=' + phpVar + '">' + imgTag + '</a>');
}