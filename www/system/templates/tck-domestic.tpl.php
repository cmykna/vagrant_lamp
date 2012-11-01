<?php 
include __DATA__."/form-options.php";
?>
<script type="text/javascript">
/* <![CDATA[ */
	var GEOIP = <?php echo json_encode($record); ?>;
	var stateBrowsingFrom = "<?php echo $stateBrowsingFrom; ?>";
	var campaignCode = "<?php echo $campaignCode; ?>";
	
	$(document).ready(function() {
	});
/* ]]> */
</script>
<div class="buffer">
<?php echo $form_presets['header']; ?>
<?php echo $form_presets['prefix']; ?>
	<form id="<?php echo $form_presets['form_id']; ?>" name="" class="contact-form" action="http://now.eloqua.com/e/f2.aspx" method="post">
		<fieldset>

			<div id="olWrapper">
				<input type="hidden" name="elqFormName" value="">
				<input type="hidden" name="elqSiteID" value="1145">
				<input type="hidden" name="elqCustomerGUID" value="">
				<input type="hidden" id="C_Campaign11" name="C_Campaign11" value="<?php print $settings->campaignCode; ?>">
				<input type="hidden" name="TCK_AccessWord" value="<?php echo $form_presets['access_word']; ?>">
				<input type="hidden" id="sfdccampaignid" name="sfdccampaignid" value="<?php echo $sf_campaign_id; ?>">
				<input type="hidden" id="SFDCAccountID" name="SFDCAccountID" value="">
				<input type="hidden" id="mdrPid" name="mdrPid" value="">
				<?php $queryString = (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") ? "?" . addslashes($_SERVER['QUERY_STRING']) : ""; ?>
				<input type="hidden" id="scriptLocation" name="scriptLocation" value="<?php echo addslashes($_SERVER['PHP_SELF']).$queryString?>" />
				<input type="hidden" id="templateVersion" name="templateVersion" value="honeybadger" />
				<ol id="vs-form">
					<!-- email, location, fname, lname, and city are static -->
					<li id="prefix" class="twelve columns" style="display:none;"></li>
					<li id="email-address" class="six columns alpha">
						<label for="C_EmailAddress">Email address <span class="req">required</span></label>
						<input type="text" class="required email" name="C_EmailAddress" id="C_EmailAddress" size="31">
					</li>
					<li id="location" class="six columns omega">
						<label for="C_Location">Location <span class="req">required</span></label>
						<select name="C_Location" class="required" id="C_Location" size="1">
							<option value="" selected="selected">-Select-</option>
						<?php foreach ($formLocationArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
						<?php endforeach ?>
						</select>
					</li>
					<br class="clear"/>
					<li id="first-name">
						<label for="C_FirstName">First Name <span class="req">required</span></label>
						<input type="text" class="required" name="C_FirstName" id="C_FirstName" size="31">
					</li>
					<li id="last-name">
						<label for="C_LastName">Last Name <span class="req">required</span></label>
						<input type="text" class="required" name="C_LastName" id="C_LastName" size="31">
					</li>
					<li id="city">
						<label for="C_Mailing_City11">City <span class="req">required</span></label>
						<input type="text" class="required" name="C_Mailing_City11" id="C_Mailing_City11" size="31">
					</li>
					<?php /* =======================================================================
						country, state, zip, and school district swap depending on US or INTL layout
						@data-loc 'us' and 'intl' chunks are detached from the dom when the form
						is initialized and reattached accordingly based on the value of the 
						location dropdown. This works better than just showing/hiding certain
						inputs, because we don't have to conditionally switch validation rules
						on and off: they're either there and validated, or not.
					    ======================================================================== */ ?>
					<!-- INTL MARKUP -->
					<li id="country" data-loc="intl">
						<label for="C_State_Prov">Country <span class="req">required</span></label>
						<select name="C_Country" class="required" id="C_Country" size="1">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formCountryArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
							<?php endforeach ?>
						</select>
					</li>
					<li id="school-district-intl" data-loc="intl">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<input type="text" class="required" name="C_SchoolDistrict" id="C_SchoolDistrict" size="31">
					</li>
					<!-- DOMESTIC MARKUP -->
					<li id="state" data-loc="us">
						<label for="C_State_Prov">State <span class="req">required</span></label>
							<select name="C_State_Prov" class="required" id="C_State_Prov" size="1">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formStateArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
							<?php endforeach ?>
						</select>
					</li>
					<li id="zip" data-loc="us">
						<label for="C_Zip">School Zip Code <span class="req">required</span></label>
						<input type="text" class="required" name="C_Zip" id="C_Zip" size="31">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
					<li id="school-district" class="disabled" data-loc="us">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<select name="C_SchoolDistrict" class="required" id="C_SchoolDistrict" size="1" disabled>
							<option value="" selected="selected">-Select-</option>
						</select>	
					</li>
					<!-- phone number and role are static -->
					<li id="phone-number">
						<label for="C_BusPhone">Phone <span class="req">required</span></label>
						<input type="text" name="C_BusPhone" class="required phone" id="C_BusPhone" size="31">
					</li>
					<li id="job-role">
						<label for="C_Job_Role1">Role <span class="req">required</span></label>
						<select name="C_Job_Role1" class="required" id="C_Job_Role1" size="1">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formTitleArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
							<?php endforeach ?>
						</select>
					</li>
					<!-- <li><input type="image" src="<?php //print __S_BUTTONS__; ?>/btn-contact-us.jpg" alt="Sample Now" title="Sample Now"></li> -->
				</ol>
				<div id="postfix"></div>
				<button form="<?php echo $form_presets['form_id']; ?>" type="submit" class="button" name="contact" alt="Sample Now" title="Sample Now">Sample Now</button>

			</div>
		</fieldset>
	</form>

</div>
<hr />