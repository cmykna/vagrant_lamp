<?php 
include __DATA__."/form-options.php";
if ($record->country_code === 'US') {
	$contactFormName = "Vs_form_domestic";
} else {
	$contactFormName = "Vs_form_intl";
}
?>
<script type="text/javascript">
/* <![CDATA[ */
	var geoRecord = <?php echo json_encode($record); ?>;
	var stateBrowsingFrom = "<?php echo $stateBrowsingFrom; ?>";
	var campaignCode = "<?php echo $campaignCode; ?>";

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

	});
/* ]]> */
</script>
<div class="buffer">
	<h1>
		<?php if ($_GET['tck']) { echo "ThinkCentral Evaluation"; } else { echo "Register for Virtual Sampling"; } ?>
	</h1>
	<p>Fill out this form and we'll send you an email with login information.</p>
	<form id="Vs_registration" name="<?php echo $contactFormName; ?>" class="contact-form" action="http://now.eloqua.com/e/f2.aspx" method="post">
		<fieldset>
			<div id="olWrapper">
				<input type="hidden" name="elqFormName" value="<?php echo $contactFormName; ?>">
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
				<ol id="vs-form">
					<li id="email-address">
						<label for="C_EmailAddress">Email <span class="req">required</span></label>
						<input type="text" name="C_EmailAddress" id="C_EmailAddress" size="31">
					</li>
					<li id="location">
						<label for="C_Location">Location <span class="req">required</span></label>
						<select name="C_Location" id="C_Location" size="1">
							<option value="" selected="selected">-Select-</option>
						<?php foreach ($formLocationArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
						<?php endforeach ?>
						</select>
					</li>
					<li id="first-name">
						<label for="C_FirstName">First Name <span class="req">required</span></label>
						<input type="text" name="C_FirstName" id="C_FirstName" size="31">
					</li>
					<li id="last-name">
						<label for="C_LastName">Last Name <span class="req">required</span></label>
						<input type="text" name="C_LastName" id="C_LastName" size="31">
					</li>
					<li id="city">
						<label for="C_Mailing_City11">City <span class="req">required</span></label>
						<input type="text" name="C_Mailing_City11" id="C_Mailing_City11" size="31">
					</li>
					<li id="state">
						<label for="C_State_Prov">State <span class="req">required</span></label>
							<select name="C_State_Prov" id="C_State_Prov" size="1">
							<option value="" selected="selected">-Select-</option>
							<?php 
							foreach ($formStateArray as $k => $v) 
							{
								if ($k === $record->region) 
								{
									echo "<option value=\"{$k}\" selected>{$v}</option>";
								}
								else
								{
									echo "<option value=\"{$k}\">{$v}</option>";
								}
									
							} 
							?>
						</select>
					</li>
					<li id="country">
						<label for="C_Country">Country <span class="req">required</span></label>
						<select name="C_Country" id="C_Country" size="1">
							<option value="">-Select-</option>
							<?php 
								if ($record->country_code === 'US') 
								{
									foreach ($formCountryArray as $key => $value) 
									{
										if ($key === "United States") 
										{
											echo "<option value=\"{$key}\" selected>{$value}</option>";
										}
										else
										{
											echo "<option value=\"{$key}\">{$value}</option>";
										}
									} 								
								} 
								else 
								{
									foreach ($formCountryArray as $key => $value) 
									{
										if ($key === strtolower($record->country_code)) 
										{
											echo "<option value=\"{$key}\" selected>{$value}</option>";
										} 
										else 
										{
											echo "<option value=\"{$key}\">{$value}</option>";
										}
									}
								}
							?>
					</select></li>
		
				<?php if ($record->country_code === 'US'): ?>
					<li id="zip">
						<label for="C_Zip">School Zip Code <span class="req">required</span></label>
						<input type="text" name="C_Zip" id="C_Zip" size="31">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
				<?php else: ?>
					<li id="zip" display="none">
						<label for="C_Zip">School Zip Code <span class="req">required</span></label>
						<input type="text" name="C_Zip" id="C_Zip" size="31">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
					<li id="school-district">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<input type="text" name="C_Zip" id="C_Zip" size="31">
					</li>
				<?php endif ?>
				<?php if ($record->country_code === 'US'): ?>
					<li id="school-district" class="disabled">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<select name="C_SchoolDistrict" id="C_SchoolDistrict" size="1" disabled>
							<option value="" selected="selected">-Select-</option>
						</select>		
						<!-- <input type="text" name="C_Company" id="C_Company" size="31" tabindex="10" disabled="true"> -->
					</li>
				<?php endif ?>
					<li id="phone-number">
						<label for="C_BusPhone">Phone <span class="req">required</span></label>
						<input type="text" name="C_BusPhone" id="C_BusPhone" size="31">
					</li>
					<li id="job-role">
						<label for="C_Job_Role1">Role <span class="req">required</span></label>
						<select name="C_Job_Role1" id="C_Job_Role1" size="1">
							<option value="" selected="selected">-Select-</option>
							<?php 
							foreach ($formTitleArray as $key => $value) 
							{
								echo "<option value=\"{$key}\">{$value}</option>";	
							} 
							?>
						</select>
					</li>
				<?php if ($record->country_code !== 'US'): ?>
					<li class="spacer"></li>
				<?php else: ?>
					<li class="spacer" class="display:none;"></li>
				<?php endif ?>
					<li id="submit" class="submit-button"><button form="Vs_registration" type="submit" class="button disabled" name="contact" alt="Sample Now" title="Sample Now" disabled>Sample Now</button></li>

					<!-- <li><input type="image" src="<?php //print __S_BUTTONS__; ?>/btn-contact-us.jpg" alt="Sample Now" title="Sample Now"></li> -->
				</ol>
			</div>
		</fieldset>
	</form>
</div>
<hr />