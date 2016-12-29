<!-- This is the form to accept new comments for an image -->
<div class="section_title"><label for="comment_text_input">Enter a comment!</label></div>
<form method="post" action="comment_post.php">
	<textarea id="comment_text_input" name="comment"></textarea>
	<input name="photoName" type="hidden" value="<?php echo $photo; ?>">
	<input id="comment_submit" type="submit" value="Submit Comment">
</form>