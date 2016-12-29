<div class="register">
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
	<fieldset>
	<legend>Create An Account</legend>
	<!-- The sign-up form, sent to signup_post.php -->
	<form action="signup_post.php" method="post">
		<div class="left">
			<label for="txtEmail">Your email address:</label>
		</div>
		<div class="right">
			<input type="email" name="email" id="txtEmail" size="40" required="required" onblur="warnEmailInvalid('txtEmail')">
			<div id="txtEmail_error"></div>
			<div class="sub">e.g. myname@example.com.</div>
		</div>
		<br class="clear">
		
		<div class="left">
			<label for="txtName">Your login name:</label>
		</div>
		<div class="right">
			<input type="text" name="name" id="txtName" size="40" onblur="warnNameInvalid('txtName')">
			<div id="txtName_error"></div>
			<div class="sub">This will be used to sign-in to your account. Use only digits, characters or underscores.</div>
		</div>
		<br class="clear">
		
		<div class="left">
			<label for="txtPassword_0">Choose a password:</label>
		</div>
		<div class="right">
			<input type="password" name="password" id="txtPassword_0" size="40" required="required" onblur="warnPasswordInvalid('txtPassword')">
			<div class="sub">Minimum of 8 characters in length.</div>
		</div>
		<br class="clear">
		<div class="left">
			<label for="txtPassword_1">Re-enter password:</label>
		</div>
		<div class="right">
			<input type="password" name="cpassword" id="txtPassword_1" size="40" required="required" onblur="warnPasswordInvalid('txtPassword')">
			<div id="txtPassword_error"></div>
		</div>
		<br class="clear">
		<input type="submit" value="Create my account">
	</form>
	</fieldset>
</div>