<?php
/**
 * Microsite Header Js
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System/Assets/JS
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
/*
 ***************************************************************************
 *	Include Global Defines
 ***************************************************************************
*/
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
/*
 ***************************************************************************
 *	Set MIME type to JS and Set Charset
 ***************************************************************************
*/
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Content-Type: text/javascript");
	header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache"); // HTTP/1.0
	print "\r\n\r\n";
	// Want these to be available before document ready.
	include_once "funcs.js";
?>



$(document).ready(function() {
<?php

/*
 ***************************************************************************
 *	General JS
 ***************************************************************************
*/
	include_once "desktop/general.js";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Megamenu JS
 ***************************************************************************
*/
if(__PLATFORM__ == "desktop") {
	include_once "desktop/mega-menu.js";
	print "\r\n\r\n";
}
/*
 ***************************************************************************
 *	Image Fancy JS
 ***************************************************************************
*/
	if(__PLATFORM__ != "phone") {
		include_once "desktop/image-fancy.js";
		print "\r\n\r\n";
	}
/*
 ***************************************************************************
 *	Tabs JS
 ***************************************************************************
*/
	include_once "desktop/tabs.js";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	VS Registration JS
 ***************************************************************************
*/
/*
	if (pathinfo($_SERVER['HTTP_REFERER'], PATHINFO_FILENAME) === 'vs-registration')
	{
		$theForm = 'vs-registration';
		// include_once "desktop/vs-registration.js";
	}
	print "\r\n\r\n";
*/
/*
 ***************************************************************************
 *	Contact Us JS
 ***************************************************************************
*/
/*
	if (pathinfo($_SERVER['HTTP_REFERER'], PATHINFO_FILENAME) === 'contact-us')
	{
		$theForm = 'contact-us';
		include_once "desktop/contact-us.js";
	}

	print "\r\n\r\n";
*/
?>
});
<?php

	if(isset($_GET["df"])) {
		print "\r\n\r\n";
 		include_once $_SERVER["DOCUMENT_ROOT"].$_GET["df"]."localIncludes/customHeader.js";
	}
/*
 ***************************************************************************
 *	Phone JS
 ***************************************************************************
*/
	if(preg_match("/\biPhone\b/", __AGENT__) || preg_match("/\biPod\b/", __AGENT__) || preg_match("/\bAndroid\b/", __AGENT__)) {
		include_once "phone/general.js";
		print "\r\n\r\n";
	}
?>