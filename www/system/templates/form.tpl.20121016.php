<?php 
include __DATA__."/form-options.php";
$fp = $form_presets;
$opts = '';
foreach ($formStateArray as $k => $v) {
	$eval_states = array('FL', 'AL', 'LA', 'TN', 'IN');
	if (in_array($k, $eval_states)) {
		$accessWord = strtolower($k).'journeys14';
		$opts .= '<option value="'.$accessWord.'">'.$v.'</option>';
	} else {
		$opts .= '<option value="journeys14">'.$v.'</option>';
	}
}
?>
<script type="text/javascript">
/* <![CDATA[ */
	var GEOIP = <?php echo json_encode($record); ?>
	, HMH_CODE = "<?php echo $settings->campaignCode; ?>";
/* ]]> */
</script>
<style type="text/css">
form .contact-form: {width: 772px;}
button {text-align: right; cursor:pointer;}
.pre-form {clear:both;}
.pre-form h1 {margin-bottom: 20px;}
.main-form {clear:both;}
#leftContainer {width:205px; float:left;}
#rightContainer {width:567px; float:right;}
#rightContainer img {width:567px;}
area {cursor:pointer;}
</style>
<div class="buffer">
<div class="pre-form" style="width:772px; display:none;">
<?php if ($fp['form_id'] === 'Journeys_eval'): ?>
<h1>View Customized Resources</h1>
<div id="leftContainer">
<p>Choose your state to evaluate state-specific resources for <em>Journeys</em> on thinkcentral.com.</p>
<select name="eval_state">
<option value="">-- Please Select a Location --</option>
<?php echo $opts; ?>
</select>
</div>
<div id="rightContainer">
<?php include $_SERVER['DOCUMENT_ROOT'].'/journeys/US-state-map.inc.php'; ?>
</div>
<?php endif ?>
</div>
<div class="main-form" style="width:772px;">
<?php echo $form_presets['header']; ?>
<?php echo $form_presets['prefix']; ?>

	<form id="<?php echo $form_presets['form_id']; ?>" name="" class="contact-form" action="http://now.eloqua.com/e/f2.aspx" method="post">
		<fieldset>
			<div id="olWrapper">
				<input type="hidden" name="elqFormName" value="<?php echo $fp['elq_name']; ?>">
				<input type="hidden" name="tckServerType" value="<?php echo $fp['tck_server_type']; ?>">
				<input type="hidden" name="elqSiteID" value="1145">
				<input type="hidden" name="elqCustomerGUID" value="">
				<input type="hidden" name="FulfillmentType" value="<?php echo $fp['fulfillment_type']; ?>">
				<input type="hidden" id="C_Campaign11" name="C_Campaign11" value="<?php print $settings->campaignCode; ?>">
			<?php if (isset($fp['elq_redirect'])): ?>
				<input type="hidden" name="elqRedirectLocation" value="<?php echo $fp['elq_redirect']; ?>">
			<?php endif ?>
			<?php if (isset($fp['elq_notify'])): ?>
				<input type="hidden" name="elqEmailNotifications" value="<?php echo $fp['elq_notify']; ?>">
			<?php endif ?>
			<?php if (($form_presets['form_id'] === "TCK_Reg") || 
					  ($form_presets['form_id'] === "Journeys_eval")): ?>
				<input type="hidden" name="accessWord" value="<?php echo $form_presets['access_word']; ?>">
			<?php endif ?>
				<input type="hidden" id="sfdccampaignid" name="sfdccampaignid" value="<?php // echo $fp['sf_campaign_id']; ?>">
				<input type="hidden" id="SFDCAccountID" name="SFDCAccountID" value="">
				<input type="hidden" id="mdrPid" name="mdrPid" value="">
				<?php $queryString = (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") ? "?" . addslashes($_SERVER['QUERY_STRING']) : ""; ?>
				<input type="hidden" id="scriptLocation" name="scriptLocation" value="<?php echo addslashes($_SERVER['PHP_SELF']).$queryString?>" />
				<input type="hidden" id="templateVersion" name="templateVersion" value="honeybadger" />
				<ol id="vs-form">
					<!-- email, location, fname, lname, and city are static -->
					<li id="prefix" class="twelve columns" style="display:none;"></li>
					<li id="email-address">
						<label for="C_EmailAddress">Email address <span class="req">required</span></label>
					<?php if (($form_presets['form_id'] === "TCK_Reg") ||
							  ($form_presets['form_id'] === "Journeys_eval")): ?>
						<input type="text" class="required email" name="emailId" id="C_EmailAddress" size="31">
					<?php else: ?>
						<input type="text" class="required email" name="C_EmailAddress" id="C_EmailAddress" size="31">
					<?php endif ?>
					</li>
					<li id="location">
						<label for="C_Location">Location <span class="req">required</span></label>
						<select name="C_Location" class="required" id="C_Location" size="1">
							<option value="" selected="selected">-Select-</option>
						<?php foreach ($formLocationArray as $k => $v): ?>
							<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
						<?php endforeach ?>
						</select>
					</li>
					<li id="first-name">
						<label for="C_FirstName">First name <span class="req">required</span></label>
					<?php if (($form_presets['form_id'] === "TCK_Reg") ||
							  ($form_presets['form_id'] === "Journeys_eval")): ?>
						<input type="text" class="required" name="firstName" id="C_FirstName" size="31">
					<?php else: ?>
						<input type="text" class="required" name="C_FirstName" id="C_FirstName" size="31">
					<?php endif ?>
					</li>
					<li id="last-name">
						<label for="C_LastName">Last name <span class="req">required</span></label>
					<?php if (($form_presets['form_id'] === "TCK_Reg") ||
							  ($form_presets['form_id'] === "Journeys_eval")): ?>
						<input type="text" class="required" name="lastName" id="C_LastName" size="31">
					<?php else: ?>
						<input type="text" class="required" name="C_LastName" id="C_LastName" size="31">
					<?php endif ?>
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
					<input type="hidden" data-loc="us" name="C_Country" value="US">
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
						<input type="text" class="required zip" name="C_Zip" id="C_Zip" size="31">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
					<li id="school-district" class="disabled" data-loc="us">
						<label for="C_SchoolDistrict">Choose your institution <span class="req">required</span></label>
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
				<?php if (($form_presets['form_id'] === 'Contact_form') &&
						  ( ! array_key_exists('hide_msg_box', $fp))): ?>
					<li class="spacer"></li>
					<li id="special-request" class="text-area">
						<label for="C_Special_Requests1">Message</label>
						<textarea name="C_Special_Requests1" id="C_Special_Requests1" cols="57" rows="4" tabindex="11"></textarea>
					</li>
				<?php endif ?>
				</ol>
				<div id="postfix"></div>
				<button form="<?php echo $form_presets['form_id']; ?>" type="submit" class="button btn-right" name="contact" alt="<?php echo $form_presets['button_text']; ?>" title="<?php echo $form_presets['button_text']; ?>"><?php echo $form_presets['button_text']; ?></button>

			</div>
		</fieldset>
	</form>
</div>
</div>
<hr />