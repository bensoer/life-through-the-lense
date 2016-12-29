<?php
	//messages are altered if there is a problem. otherwise don't display message.
	if(!isset($_SESSION['PMESSAGE'])){
		$_SESSION['PMESSAGE'] = '';
	}
	if(!isset($_SESSION['EMESSAGE'])){
		$_SESSION['EMESSAGE'] = '';
	}
	if(!isset($_SESSION['DMESSAGE'])){
		$_SESSION['DMESSAGE'] = '';
	}
?>
<div id="account_settings">
	<fieldset>
		<legend>Change Password</legend>
		<div class="settings_table">
			<form method="post" action="change_password.php" onsubmit="return testPasswordValid('txtNewPassword')">
				<div class="left">
					<label for="old_pword">Old Password:</label>
				</div>
				<div class="right">
					<input type="password" name="oldPassword" id="old_pword">
				</div>
				<br class="clear">
				<div class="left">
					<label for="txtNewPassword">New Password:</label>
				</div>
				<div class="right">
					<input type="password" name="newPassword" id="txtNewPassword">
				</div>
				<br class="clear">
				<div id="txtNewPassword_error"><?php echo "".$_SESSION['PMESSAGE'] ?></div>
				<input type="submit" value="Submit">
				<!--unset so that message is reset-->
				<?php unset($_SESSION['PMESSAGE']); ?> 
			</form>
		</div>
	</fieldset>
	<br>	
	<fieldset>
		<legend>Change Email</legend>
		<div class="settings_table">
			
			<form method="post" action="change_email.php" onsubmit=" return testEmailChangeValid('txtNewEmail')">
				<div class="left">
					<label for="old_email">Old Email</label>
				</div>
				<div class="right">
					<input type="email" name="oldEmail" id="old_email">
				</div>
				<br class="clear">
				<div class="left">
					<label for="txtNewEmail">New Email</label>
				</div>
				<div class="right">
					<input type="email" name="newEmail" id="txtNewEmail">
				</div>
				<br class="clear">
				<div id="txtNewEmail_error"><?php echo "".$_SESSION['EMESSAGE'] ?></div>
				<input type="submit" value="Submit">
				<!--unset so that message is reset-->
				<?php unset($_SESSION['EMESSAGE']); ?>
			</form>
		</div>
	</fieldset>
	<br>
	<fieldset>
		<legend>Delete Account</legend>
		<div class="settings_table">
			
			<form method ="post" action ="delete_account.php" onsubmit="return confirmDelete()">
				<p> Please enter your email address and password to delete your account. Deleting your account will remove all preferences/information and comments made by you on the site.<p>
				<div class="left">
					<label for="delete_email"> Email</label>
				</div>
				<div class="right">
					<input type="email" name="delete_email" id="delete_email">
				</div>
				<br class="clear">
				<div class="left">
					<label for="delete_pword">Password</label>
				</div>
				<div class="right">
					<input type="password" name="delete_pword" id="delete_pword">		
				</div>
				<br class="clear">
				<div id="account_error"><?php echo "".$_SESSION['DMESSAGE'] ?></div>
				<input type="submit" value="Submit">
				<!--unset so that message is reset-->
				<?php unset($_SESSION['DMESSAGE']); ?>
			</form>
		</div>
	</fieldset>
		
</div>