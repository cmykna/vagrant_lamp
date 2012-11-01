<?php 
include __DATA__."/form-options.php";
// $record->country_code = 'ZA';
var_dump($record);
if ($record->country_code === 'US') {
	$contactFormName = "Contact_form_domestic";
} else {
	$contactFormName = "Contact_form_intl";
}
?>
<script>
var geoRecord = <?php echo json_encode($record); ?>;
$(document).ready(function() {

	// If there's a dynamic form include we've gotta
	// do some stuff to smush it together with the static form
	if ($('.dynamic-form').length > 0) {
		$('.dynamic-form').css({
			"border-bottom": "0px",
 			"border-bottom-left-radius": "0px",
 			"border-bottom-right-radius": "0px",
			"padding-bottom": "40px",
			"margin-bottom": "0px"
		});
		$('.static-form').css({
			"margin-top": "0px",
    		"border-top": "0px",
    		"border-top-left-radius": "0px",
    		"border-top-right-radius": "0px"
		});
	}

	// Quick hax to get the dynamic form's
	// wrapper ol to play nice with arbitrary heights.
	var dynHeight = 0;
	$('.dynamic-form li').each(function(){
  		dynHeight += $(this).outerHeight();
	});
	dynHeight += $('.dynamic-form textarea').outerHeight();
	$('.dynamic-form').height(dynHeight);

});
</script>
<div class="buffer">
	<h1>How can we help?</h1>
	<p>Our goal is to make finding the right instructional materials easy, and buying them even easier. </p>
	<h3>Fill out this simple form and we'll contact you!</h3>
	<form id="Contact_us" name="<?php echo $contactFormName; ?>" class="contact-form" action="http://now.eloqua.com/e/f2.aspx" method="post">
		<fieldset>
			<?php
			if(file_exists($dynamicForm)) {
				include $dynamicForm;
			} ?>
			<input type="hidden" name="elqFormName" value="<?php echo $contactFormName; ?>">
			<input type="hidden" name="elqSiteID" value="1145">
			<input type="hidden" name="elqCustomerGUID" value="">
			<input type="hidden" name="elqCookieWrite" value="0">
			<input type="hidden" id="C_Campaign11" name="C_Campaign11" value="<?php print $settings->campaignCode; ?>" />
			<input type="hidden" name="elqRedirectLocation" value="<?php echo "//".$_SERVER["HTTP_HOST"].__DIRECTORY__."contact-response.php"; ?>">
			<input type="hidden" name="C_Country" value="<?php echo "$record->country_name"; ?>">
			<div class="dynamicFormWrapper">
				<ol class="static-form">
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
						<label for="C_Zip">
							<?php if ($record->country_code === 'US'): ?>
								Zip Code
							<?php else: ?>
								Postal Code
							<?php endif ?> <span class="req">required</span></label>
						<input type="text" name="C_Zip" id="C_Zip" size="31" tabindex="5">
						<img src="<?php echo __S_IMAGES__."/spinner.gif"; ?>" width="18" height="18" alt="" id="ajaxSpinner" />
					</li>
					<li id="city">
						<label for="C_Mailing_City11">City <span class="req">required</span></label>
						<input type="text" name="C_Mailing_City11" id="C_Mailing_City11" size="31" tabindex="6">
					</li>
				<?php if ($record->country_code === 'US'): ?>
					<li id="state">
						<label for="C_State_Prov">State <span class="req">required</span></label>
							<select name="C_State_Prov" id="C_State_Prov" size="1" tabindex="7">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formStateArray as $key => $value) {
								echo "<option value=\"{$key}\">{$value}</option>";	
							} ?>
						</select>
					</li>
				<?php else: ?>
					<li id="state">
						<label for="C_State_Prov">Region <span class="req">required</span></label>
						<input type="text" name="C_State_Prov" id="C_State_Prov" size="31" tabindex="7">
					</li>
				<?php endif ?> 
					<!--<li id="country">
						<label for="C_Country">Country <span class="req">required</span></label>
						<select name="C_Country" id="C_Country" size="1" tabindex="8">
							<option value="">-Select-</option>
							<?php //foreach ($formCountryArray as $key => $value): ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>	
						<?php //endforeach ?>
					</select></li>-->
					<li id="job-role">
						<label for="C_Job_Role1">Role <span class="req">required</span></label>
						<select name="C_Job_Role1" id="C_Job_Role1" size="1" tabindex="9">
							<option value="" selected="selected">-Select-</option>
							<?php foreach ($formTitleArray as $key => $value) {
								echo "<option value=\"{$key}\">{$value}</option>";	
							} ?>
						</select>
					</li>
				<?php if ($record->country_code === 'US'): ?>
					<li id="school-district" class="disabled">
						<label for="C_SchoolDistrict">School or District <span class="req">required</span></label>
						<select name="C_SchoolDistrict" id="C_SchoolDistrict" size="1" tabindex="10" disabled>
							<option value="" selected="selected">-Select-</option>
						</select>		
						<!-- <input type="text" name="C_Company" id="C_Company" size="31" tabindex="10" disabled="true"> -->
					</li>

					<!-- spacer li -->
					<li></li>
				<?php endif ?>
					<li id="special-request" class="text-area">
						<label for="C_Special_Requests1">Message</label>
						<textarea name="C_Special_Requests1" id="C_Special_Requests1" cols="57" rows="4" tabindex="11"></textarea>
					</li>
				<?php if ($record->country_code === 'US'): ?>
					<li id="submit" class="submit-button"><button form="Contact_us" type="submit" class="button disabled" name="contact" alt="Contact Us" title="Contact Us" disabled>Contact Us</button></li>
				<?php else: ?>
					<li id="submit" class="submit-button"><button form="Contact_us" type="submit" class="button" name="contact" alt="Contact Us" title="Contact Us">Contact Us</button></li>
				<?php endif ?>
					<!-- <li><input type="image" src="<?php //print __S_BUTTONS__; ?>/btn-contact-us.jpg" alt="Sample Now" title="Sample Now"></li> -->
				</ol>
				
	
				<!-- <div class="clearDynamicHack"></div> -->
					
			</div>
		</fieldset>
	</form>
</div>
