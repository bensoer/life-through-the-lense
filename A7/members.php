<?php
	session_start();
	
	//members page is called when changes on account settings are done. runs appropriate javascript. if opening members normaly
	if(!isset($_SESSION['MEMBERS_LOAD'])){
		$_SESSION['MEMBERS_LOAD'] = 'loadSubscription()';
	}
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Team A7 - Members</title>
		<link rel="stylesheet" href="base.css" type="text/css">
		<link rel="stylesheet" href="member_about.css" type="text/css">
		<link rel="shortcut icon" href="images/favico.png" type="image/x-icon" />
		<script>
			//load the three units
			function loadSubscription(){			
				document.getElementById("subscriptions").style.visibility="visible";
				document.getElementById("form").style.visibility="hidden";
				document.getElementById("account_settings").style.visibility="hidden";
			}
			function loadAccountSettings(){			
				document.getElementById("subscriptions").style.visibility="hidden";
				document.getElementById("form").style.visibility="hidden";
				document.getElementById("account_settings").style.visibility="visible";			
			}
			function loadOrderForm() {
				document.getElementById("subscriptions").style.visibility="hidden";
				document.getElementById("form").style.visibility="visible";
				document.getElementById("account_settings").style.visibility="hidden";			
			}
			
			function $(id){
				var element = document.getElementById(id);
				if( element == null )
					alert( 'Programmer error: ' + id + ' does not exist.' );
				return element;
			}
			//--ACCOUNT SETTINGS--
			//password
			function testPasswordValid(id) {
				if ($(id).value == '') {
					$(id + '_error').innerHTML = "Please enter a new password.";
					return false;
				}
				else {
					if ($(id).value.length < 8) {
						$(id + '_error').innerHTML = "Passwords must be at least 8 characters.";
						return false;
					}
				}
			}
			function testEmailChangeValid(id) {
				if ($(id).value == '') {
					$(id + '_error').innerHTML = "Email Invalid";
					return false;
				} else {
					if($(id).value.match(/.com|.ca|.org$/) != null && $(id).value.match(/@/) != null) {
						$(id + '_error').innerHTML = "";
						return true;
					} else {
						$(id + '_error').innerHTML = "Email Invalid";
						return false;
						}
				}
			}
			function confirmDelete(){
				if(window.confirm("Are you sure you want to delete your account?")){
					return true;
				} else {
					return false;
				}
			}
			/*function warnPasswordInvalid(id) {
				if(!testPasswordValid(id)) {
					
				}
			}*/
			
			//--ORDER FORM--
			//name
			function testNameValid(id) {
				if ($(id).value == '') {
					return false;
				}
				else {
					if($(id).value.length > 3 && $(id).value.match(/\d/) == null) {
						return true;
						
					}else {
						return false;
					}
				}
			}				
			//email (used on order form and account settings <-- prob fudged up account settings, need to redo validation)
			function testEmailValid(id) {
				if ($(id).value == '') {
					return false;
				} else {
					if($(id).value.match(/.com|.ca|.org$/) != null && $(id).value.match(/@/) != null) {
						return true;
					}
				}
			}
			//telephone
			function testPhoneValid(id) {
				if ($(id).value == '') {
					return false;
				}
				else {
					if($(id).value.match(/^\d{10}/) != null) {
						return true;
					}
				}
			}
			//address
			function testAddressValid(id) {
				if ($(id).value == '') {
					return false;
				} else {
					if($(id).value.match(/^\d{2,4}\s\w/) != null) {
						return true;
					}
				}
			}
			//city
			function testCityValid(id) {
				if ($(id).value != '') {
					return true;
				} else {
					return false;
				}
			}
			//province
			function testProvinceValid(id) {
				if ($(id).selectedIndex != 0) {
					return true;
				}else {
					return false;
				}
			}
			//postal code
			function testPCodeValid(id) {
				if ($(id).value == '') {
					return false;
				}
				else {
					if($(id).value.match(/[a-zA-Z]\d[a-zA-Z]\s?\d[a-zA-Z]\d/) != null) {
						return true;
					}
				}
			}
			//text area
			function testDescriptionValid(id) {
				if ($(id).value != '') {
					return true;
				} else {
					return false;
				}
			}

			// FORM VALIDATION--
			function formValidate() {
				var status = true;
				//Enter Name
				if(!testNameValid('txtName')) {
					$('txtName_error').innerHTML = "Please enter a name.";
					status = false;
				}else{
					$('txtName_error').innerHTML = "";
				}
				//Email
				if(!testEmailValid('txtEmail')) {
					$('txtEmail_error').innerHTML = "Please enter an email address.";
					status = false;
				}else{
					$('txtEmail_error').innerHTML = "";
				}
				//Telephone
				if(!testPhoneValid('txtPhone')) {
					$('txtPhone_error').innerHTML = "Please enter a phone number.";
					status = false;
				}else {
					$('txtPhone_error').innerHTML = "";
				}
				//Address
				if(!testAddressValid('txtAddress')) {
					$('txtAddress_error').innerHTML = "Please enter an address.";
					status = false;
				}else {
					$('txtAddress_error').innerHTML = "";
				}
				//City
				if(!testCityValid('txtCity')) {
					$('txtCity_error').innerHTML = "Please enter a city.";
					status = false;
				}else {
					$('txtCity_error').innerHTML = "";
				}
				//Province
				if(!testProvinceValid('selProvince')){
					$('selProvince_error').innerHTML = "Please select a province.";
					status = false;
				}else {
					$('selProvince_error').innerHTML = "";
				}
				//Postal Code
				if(!testPCodeValid('txtPCode')) {
					$('txtPCode_error').innerHTML = "Please enter a postal code.";
					status = false;
				} else {
					$('txtPCode_error').innerHTML = "";
				}
				//Description
				if(!testDescriptionValid('txtDescription')) {
					$('txtDescription_error').innerHTML = "Please enter a description.";
					status = false;
				}else {
					$('txtDescription_error').innerHTML = "";
				}
				return status;
			}
		</script>
	</head>
	<body onload='<?php echo $_SESSION['MEMBERS_LOAD']?>'>
		<!--unset after using so that it loads default page normally-->
		<?php unset($_SESSION['MEMBERS_LOAD'])?> 
		<!-- The header section - defines structure for all header elements -->
		<?php require 'header.php' ?>
		<!-- the main content div contains structure for each particular page -->
		<div id="main">
			<?php 
				if (isLoggedIn()) {
					require 'members_content.php';
				} else {
					require 'members_login.php';
				}
			?>
		</div>
		<!-- the footer section contains the site map navigation list -->
		<?php require 'footer.php' ?>
	</body>
</html>