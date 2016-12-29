<div id="form">
	<!-- The picture order fieldset -->
	<fieldset>
		<legend>Order Form</legend>
		  <p>Fill out  and submit the form below if you would like to order prints of any of the photos displayed on Life Through The Lense. Be aware of the max print size varies on resolution of the photo. The mandatory fields are marked with an asterix. </p>				
		  <div id="order_limits">
			<!-- A table of options for print orders -->
			<table id="limits_table" border="1">
				<caption>Min Resolution for Prints</caption>
				<tr>
					<th>Size</th>
					<th>Min. Resolution (pixels)</th>
				</tr>
				<tr>
					<td>Wallet Prints</td>
					<td>270x180</td>
				</tr>
				<tr>
					<td>4x6"</td>
					<td>540x360</td>
				</tr>
				<tr>
					<td>5x7"</td>
					<td>630x450</td>
				</tr>
				<tr>
					<td>8x10"</td>
					<td>900x720</td>
				</tr>
				<tr>
					<td>11x14" Poster</td>
					<td>1260x990</td>
				</tr>
				<tr>
					<td>12x18"</td>
					<td>1620x10180</td>
				</tr>
				<tr>
					<td>16x20" Poster</td>
					<td>1620x1440</td>
				</tr>
				<tr>
					<td>20x30" Poster</td>
					<td>27000x1800</td>
				</tr>
			</table>
			<span class="subtext">* Orders available only in Canada</span>
		  </div>
		<!-- The picture order form -->
		<form method="post" action="order_mailer.php" onsubmit="return formValidate()"> <!--form starts here-->			
			<div id="form_right">
				<label id="labelname" for="txtName">Your Name *</label><br>
				<input type="text" name="name" id="txtName" ><br>
				<div id="txtName_error"></div>
				<label id="labelemail" for="txtEmail">Email Address *</label><br>
				<input type="email" name="email1" id="txtEmail" ><br>
				<div id="txtEmail_error"></div>
				<label id="labeltel" for="txtPhone">Telephone *</label><br><span class="subtext">No spaces, or dashes</span><br>
				<input type="tel" name="tel" id="txtPhone" ><br>
				<div id="txtPhone_error"></div>
				<label id="labeladdress" for="txtAddress">House Address *</label><br>
				<input type="text" name="address" id="txtAddress" size="30" ><br>
				<div id="txtAddress_error"></div>
				<label id="labelcity" for="txtCity">City *</label><br>
				<input type="text" name="city" id="txtCity" ><br>
				<div id="txtCity_error"></div>
				<label id="labelprovince" for="selProvince">Province *</label><br>
				<select size="1" name="province" id="selProvince" >
					<option>--</option>
					<option>BC</option>
					<option>AB</option>
					<option>SK</option>
					<option>MB</option>
					<option>ON</option>
					<option>QC</option>
					<option>NL</option>
					<option>PE</option>
					<option>NS</option>
					<option>YU</option>
					<option>NWT</option>
					<option>NU</option>
				</select><br>
				<div id="selProvince_error"></div>
				<label id="labelpcode" for="txtPCode">Postal Code *</label><br>
				<input type="text" name="postalcode" id="txtPCode" ><br>
				<div id="txtPCode_error"></div>
			</div>
			<br class="clear">
				<label id="labelpicdescript" for="txtDescription">Picture Description *</label><br>
				<textarea cols="50" rows="5" name="pic_descript" id="txtDescription"  onclick="document.getElementById('txtDescription').innerHTML=''">Give the name of photo, resolution and a description of the photo so that we can verify we have picked the right one. Maybe even throw in a link to where you found it on our website!</textarea>
				<div id="txtDescription_error"></div>
				<br><input type="submit"><input type="reset">
			
		</form>
	</fieldset>
</div>