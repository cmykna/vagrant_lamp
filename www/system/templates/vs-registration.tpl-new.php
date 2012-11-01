<?php 
include __DATA__."/form-options.php";
if (!empty($_POST)) {
	var_dump($_POST);
}
?>
<script type="text/javascript">
/* <![CDATA[ */
	var stateBrowsingFrom = "<?php echo $stateBrowsingFrom; ?>";
	var campaignCode = "<?php echo $campaignCode; ?>";
	
	function setupUS() {
		jQuery('.supplementalField').removeClass('notVisible');
		var us = "United States";
		jQuery('#state').css('display','block');
		jQuery('#zipCode').css('display','block');
		jQuery('#country').addClass('notVisible');
		jQuery('#country').val(us);
		jQuery('#country').css('display','none');
		var emptyOut = "";
		jQuery('#C_Company').val(emptyOut);
		jQuery('#zipCodeEntry').val(emptyOut);
		jQuery('#school-district').html('<label for="C_Company">School or District</label><select name="C_Company" id="C_Company" tabindex="10" disabled="disabled"></select>');
		jQuery("select#C_Company").parent().closest('li').removeClass("valid");
		jQuery('#C_Company').attr('disabled', 'disabled');
		jQuery('#school-district').css('display','none');
		//reset global vars for school or district dropdown and calculated hidden fields from Sales Force
		window.schoolDistrictOptions = '';
		sfdcCustomerId = new Array();
		mdrPid = new Array();
		//remove the sfdcCustomerId and mdrPid hidden fields from the form to reset their values (may not exist)
		jQuery("#sfdcCustomerId").remove();
		jQuery("#mdrPid").remove();
	}
	//
	function setupInternational() {
		jQuery('.supplementalField').removeClass('notVisible');
		jQuery('#state').addClass('notVisible');
		var international = "INTERNATIONAL";
		jQuery('#state').val(international);
		jQuery('#state').css('display','none');
		jQuery('#zipCode').addClass('notVisible');
		jQuery('#zipCode').val(international);
		jQuery('#zipCode').css('display','none');
		jQuery('#country').css('display','block');
		var emptyOut = "";
		jQuery('#C_Company').val(emptyOut);
		jQuery('#school-district').html('<label for="C_Company">School or District</label><input type="text" name="C_Company" id="C_Company" size="31" tabindex="10" />');
		jQuery("input#C_Company").parent().closest('li').removeClass("valid");
		jQuery("input#zipCodeEntry").parent().closest('li').removeClass("valid");
		jQuery('#C_Company').removeAttr('disabled');
		jQuery('#school-district').css('display','block');
		//reset global vars for school or district dropdown and calculated hidden fields from Sales Force
		window.schoolDistrictOptions = '';
		sfdcCustomerId = new Array();
		mdrPid = new Array();
		//remove the sfdcCustomerId and mdrPid hidden fields from the form to reset their values (may not exist)
		jQuery("#sfdcCustomerId").remove();
		jQuery("#mdrPid").remove();
	}

	$(document).ready(function() {

		$('.submit-button').css('float','right');
		$('button').css({
			"top":"20px",
			"right":"70px"
		});
		$('#olWrapper ol').height(function() {
			var dynHeight = 0;
			$('#olWrapper li').each(function(){
  				dynHeight += $(this).outerHeight();
			});
			return dynHeight/2+25;
		});
		
		<?php 
		// if (isset($countryBrowsingFrom) && $countryBrowsingFrom != "") {
		// 	if ($countryBrowsingFrom == "US") {
		?>
		// jQuery("#location_select").prop("selectedIndex", 2);
		// setupUS();
		<?php
			// } else {
		?>
		// jQuery("#location_select").prop("selectedIndex", 1);
		// setupInternational();
		<?php
		// 	}
		// }
		?>
		document.Vs_registration.C_FirstName.focus();
	});
/* ]]> */
</script>
<div class="buffer">
	<h1>Experience Virtual Sampling</h1>
	<p>Fill out this form and we'll send you an email with login information.</p>
	<form id="Vs_registration" name="Vs_registration" class="contact-form" action="http://now.eloqua.com/e/f2.aspx" method="post">
		<fieldset>
			<div id="olWrapper">
				<input type="hidden" name="elqFormName" value="Vs_registration">
				<input type="hidden" name="elqSiteID" value="1145">
				<input type="hidden" name="elqCustomerGUID" value="">
				<input type="hidden" id="C_Campaign11" name="C_Campaign11" value="<?php print $settings->campaignCode; ?>">
				<?php
					$campaignCode = addslashes($settings->campaignCode);
					$campaignsSfdcMap = dirname($_SERVER['DOCUMENT_ROOT']) . "/sqliteDb/campaigns-sfdc-map.sqlite";
					if (file_exists($campaignsSfdcMap)) {
						try
						{
							$campaignSfdcidDb = new PDO("sqlite:$campaignsSfdcMap");
							$campaignSfdcidDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$result = $campaignSfdcidDb->query("SELECT * FROM 'campaigns-sfdc' WHERE campaigns='$campaignCode' LIMIT 1");
							$campaignsSfdcMapCount = 0;
							foreach($result as $resultRowReturn) {
								echo "<input type=\"hidden\" id=\"sfdccampaignid\" name=\"sfdccampaignid\" value=\"" . addslashes($resultRowReturn['sfdc']) . "\" />";
								$campaignsSfdcMapCount++;
								break;
							}
							// close the database connection
							$campaignSfdcidDb = NULL;
							if ($campaignsSfdcMapCount == 0) {
								echo "<input type=\"hidden\" id=\"sfdccampaignid\" name=\"sfdccampaignid\" value=\"NO VALUE FOUND FOR CAMPAIGN CODE $campaignCode\" />";
							}
						}
						catch(PDOException $e)
						{
							echo "<!--PDO Exception : " . htmlspecialchars($e->getMessage()) . "-->";
							echo "<input type=\"hidden\" id=\"sfdccampaignid\" name=\"sfdccampaignid\" value=\"EXCEPTION: " . addslashes($e->getMessage()) . " OCCURRED IN LOOKUP FOR CAMPAIGN CODE $campaignCode\" />";
						}
					}
					$queryString = (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") ? "?" . addslashes($_SERVER['QUERY_STRING']) : "";
					echo "\r\n\t\t\t\t<input type=\"hidden\" id=\"scriptLocation\" name=\"scriptLocation\" value=\"" . addslashes($_SERVER['PHP_SELF']) . $queryString . "\" />\r\n";
					echo "\t\t\t\t<input type=\"hidden\" id=\"templateVersion\" name=\"templateVersion\" value=\"honeybadger\" />\r\n";
				?>
				<ol>
					<li id="first-name">
						<label for="C_FirstName">First Name <span class="req">required</span></label>
						<input type="text" name="C_FirstName" id="C_FirstName" size="31" tabindex="1" autofocus>
					</li>
					<li id="last-name">
						<label for="C_LastName">Last Name <span class="req">required</span></label>
						<input type="text" name="C_LastName" id="C_LastName" size="31" tabindex="2">
					</li>
					<li id="email-address">
						<label for="C_EmailAddress">Email <span class="req">required</span></label>
						<input type="text" name="C_EmailAddress" id="C_EmailAddress" size="31" tabindex="3">
					</li>
					<li id="phone-number">
						<label for="C_BusPhone">Phone <span class="req">required</span></label>
						<input type="text" name="C_BusPhone" id="C_BusPhone" size="31" tabindex="4">
					</li>
					<li id="zip">
						<label for="C_Zip">Zip Code <span class="req">required</span></label>
						<input type="text" name="C_Zip" id="C_Zip" size="31" tabindex="5">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
					<li id="city">
						<label for="C_Mailing_City11">City <span class="req">required</span></label>
						<input type="text" name="C_Mailing_City11" id="C_Mailing_City11" size="31" tabindex="6">
					</li>
					<li id="state">
						<label for="C_State_Prov">State <span class="req">required</span></label>
						<select name="C_State_Prov" id="C_State_Prov" size="1" tabindex="7">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formStateArray as $key => $value) {
								echo "<option value=\"{$key}\">{$value}</option>";	
							} ?>
						</select>
					</li>
					<li id="country">
						<label for="C_Country">Country <span class="req">required</span></label>
						<select name="C_Country" id="C_Country" size="1" tabindex="8">
							<option value="">-Select-</option>
							<?php foreach ($formCountryArray as $key => $value): ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>	
						<?php endforeach ?>
					</select></li>
					<li id="job-role">
						<label for="C_Job_Role1">Role <span class="req">required</span></label>
						<select name="C_Job_Role1" id="C_Job_Role1" size="1" tabindex="9">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formTitleArray as $key => $value) {
								echo "<option value=\"{$key}\">{$value}</option>";	
							} ?>
						</select>
					</li>
					<li id="school-district" class="disabled">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<select name="C_SchoolDistrict" id="C_SchoolDistrict" size="1" tabindex="10" disabled>
							<option value="" selected="selected">-Select-</option>
						</select>		
						<!-- <input type="text" name="C_Company" id="C_Company" size="31" tabindex="10" disabled="true"> -->
					</li>
					<li id="submit" class="submit-button"><button type="submit" class="button disabled" name="contact" alt="Sample Now" title="Sample Now" disabled>Sample Now</button></li>
					<!-- <li><input type="image" src="<?php //print __S_BUTTONS__; ?>/btn-contact-us.jpg" alt="Sample Now" title="Sample Now"></li> -->
				</ol>
			</div>
		</fieldset>
	</form>
</div>
<hr />