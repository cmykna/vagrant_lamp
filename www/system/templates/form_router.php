<?php
/**
 * LET'S DISPLAY SOME FORMS
 *
 * The following stuff now routes through here to /forms/index.php:
 * 
 * Previously, each file in the Template Page column included the form implementation
 * listed in the Old Implementation column. Each of these Old Implementation files
 * now simply includes this file, which will pick identifying info from both
 * 1.0 and Honeybadger templates and pass it through to the form processor via
 * an iframe.
 *
 * This means that ALL FORMS WILL SHARE A SINGLE IMPLEMENTATION! Yay!
 *
 * ===========================================================================
 * | Template Version | Template Page       | Old Implementation             |
 * ---------------------------------------------------------------------------
 * | Honeybadger      | campaign-email.php  | contact-form-df.tpl-iframe.php |
 * | Honeybadger      | vs-registration.php | vs-registration.tpl.php        |
 * | Honeybadger      | contact-us.php      | contact-form-df.tpl.php        |
 * | Templates-1.0    | vs-registration.php | contact-vsform.php             |
 * | Templates-1.0    | contact-us.php      | contact-vsform.php             |
 * ===========================================================================
*/
?>
<style type="text/css">
	.form iframe {
		border: 0 none;
		margin: 20px auto;
		height: 510px;
		width: 948px;
		overflow: hidden;
	}
</style>
<div class="buffer form">
<?php
// Trying to keep awful PHP markup echoing to a minimum here
function display_iframe($form_type, $ccode, $notify) {
	$form_path = '//'.$_SERVER['HTTP_HOST'].'/forms/index.php?';
	
	// Contact forms are taller than usual, so we have to override the
	// height set in our inline stylesheet to prevent overflow
	$frame_height = ($form_type === 'contact' || $form_type === 'brainhoney') ? 'style="height:855px;" ' : '';

	$frame_string = '<iframe target="_parent" ';
	$frame_string .= $frame_height;
	$frame_string .= "src=\"{$form_path}form={$form_type}&amp;code={$ccode}&amp;notify={$notify}\" ";
	$frame_string .= 'scrolling="no" border="0" frameborder="0"></iframe>';
	
	return $frame_string;
}

// Check for Honeybadger vs. Templates-1.0
if (isset($settings)) {
	// Honeybadger
	// What kind of form are we dealing with?
	if ($page->isContact === 1 && !$brainhoney_flag) {
		echo display_iframe('contact', $settings->campaignCode, $emailNotify);
	} else if ($page->isVSReg === 1) {
		echo display_iframe('vs', $settings->campaignCode, $emailNotify);
	} else if ($page->isCampaignEmail === 1) {
		echo display_iframe('email', $settings->campaignCode, $emailNotify);
	} else if ($brainhoney_flag === 1) {
		echo display_iframe('brainhoney', $settings->campaignCode);
	}
} else {
	// Templates 1.0
	// Is it a contact form or a VS form?
	if ($isContact === 'yes') {
		// Legacy contact pages have some links in front of them and require ?form=true
		// in the query string to actually display the form
		if ( ! isset($_GET['form'])) {
			include_once $docRoot.$templateDir.$includeDir.'legacy-contact-markup.php';
			echo $legacy_contact_markup;
		}
		if ($_GET['form'] === 'true') {
			echo display_iframe('contact', $campaignCode, $emailNotify);
		}
	} else if ($isVSReg === 'yes') {
		echo display_iframe('vs', $campaignCode);
	}
}
?>
</div>
