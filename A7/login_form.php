<!-- the signin class contains structure to let a user sign in -->
<div class="signin">
	<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	?>
	<?php
	//messages are altered if there is a problem. otherwise don't display message.
	if(!isset($_SESSION['LMESSAGE'])){
		$_SESSION['LMESSAGE'] = '';
	}
	?>
	<fieldset>
	<legend>Sign In</legend>
	<form action="login_post.php" method="post">
		<?php echo "	".$_SESSION['LMESSAGE'] ?>
		<div class="left">
			<label for="name">Login name:</label>
		</div>
		<div class="right">
			<input type="text" name="name" id="name" size="40" required="required">
		</div>
		<br class="clear">
		<div class="left">
			<label for="password">Password:</label>
		</div>
		<div class="right">
			<input type="password" name="password" id="password" size="40" required="required" onkeypress="isCapsLockOn(event)">
			<p id="capslock"></p>
		</div>
		<br class="clear">
		<!--unset so that message is reset-->
		<?php unset($_SESSION['LMESSAGE']); ?> 
		<input type="submit" value="Sign in"> or <a href="signup.php">Create an account</a>
	</form>
	</fieldset>
</div>