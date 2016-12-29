<?php
	require_once('config.php');

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	mysql_select_db(DB_DATABASE)or die("cannot select DB");
	$tbl_name="comments"; // Table name

	// get value of id that sent from address bar
	$photoName=$photo;

	$sql="SELECT * FROM $tbl_name WHERE photo_name='$photoName'";
	$result=mysql_query($sql);

	// if there are no comments, display text to invite users to comment
	// otherwise, display comments for the currently displayed image
	if(mysql_num_rows($result) < 1) {
?>

<div class="no_comment">
	<div class="no_comment_text">
		Be the first to comment on this picture!
	</div>
</div>

<?php
	} else {
		while($rows=mysql_fetch_array($result)){
		
			$usrName = $rows['user_name'];
			$numPosts = 0;
			
			$getPost = "SELECT * FROM users WHERE name='$usrName'";
			$postResult = mysql_query($getPost);
			while($moreRows=mysql_fetch_array($postResult)){
				$numPosts = $moreRows['posts'];
			}
?>

<div class="comment">
	<div class="post_header">
		<div class="user_info">
			<span class="username"><?php echo $usrName; ?></span><br>
			<span class="posts">Posts: <?php echo $numPosts; ?></span>
		</div>
	</div>
	<div class="comment_text_content">
		<?php echo $rows['comment']; ?>
	</div>
	<div class="post_time">
		<?php echo $rows['date_time']; ?>
	</div>
</div>

<?php
	}
}
mysql_close();
?>


