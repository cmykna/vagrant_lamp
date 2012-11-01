<?php
/**
 * Microsite Base CSS
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 * @author Chris Cykana christopher.cykana@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System/Assets/CSS
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
 *	Set MIME type to CSS and Set Charset
 ***************************************************************************
*/
	header ("Content-Type: text/css");
	print "@charset \"utf-8\";";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	General Reset
 ***************************************************************************
*/
	include_once __PLATFORM__."/reset.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Header CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/header.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Footer CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/footer.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Content Area CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/content-area.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Secondary Nav CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/left-nav.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Tabs CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/tabs.css";
	print "\r\n\r\n";
	
if(isset($_GET['df']) && ($_GET['df'] == "/virtualsampling/" || $_GET['df'] == "/virtual-catalog/")) {
	include_once __PLATFORM__."/vs-tabs.css";
	print "\r\n\r\n";
}
/*
 ***************************************************************************
 *	Microsite Ad Buckets
 ***************************************************************************
*/
	include_once __PLATFORM__."/microsite-buckets.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Coda CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/microsite-coda.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Coda Fonts CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/microsite-slide-fonts.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Buttons CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/buttons.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Microsite Images CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/images.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	VS Registration CSS
 ***************************************************************************
*/
	include_once __PLATFORM__."/vs-registration.css";
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	jCarousel CSS
 ***************************************************************************
*/
	if(isset($_GET['df']) && ($_GET['df'] == "/virtualsampling/" || $_GET['df'] == "/virtual-catalog/")) {
		include_once __PLATFORM__."/jcarousel.css";
		print "\r\n\r\n";	
	}
/*
 ***************************************************************************
 *	Agent Specific CSS for Desktop
 ***************************************************************************
*/
	if(__PLATFORM__ == "desktop") {
		if(preg_match("/\bFirefox\b/i", __AGENT__)) {
			//print "Firefox Success";
			include_once "desktop/ua-firefox.css";
		} else if(preg_match("/\bChrome\b/i", __AGENT__)) {
			//print "Chrome Success";
			include_once "desktop/ua-chrome.css";
		} else if(preg_match("/\bSafari\b/i", __AGENT__)) {
			//print "Safari Success";
			include_once "desktop/ua-safari.css";
		} else if(preg_match("/\bMSIE 6.0\b/i", __AGENT__)) {
			//print "Internet Explorer 6 Success";
			include_once "desktop/ua-ie6.css";
		} else if(preg_match("/\bMSIE 7.0\b/i", __AGENT__)) {
			//print "Internet Explorer 7 Success";
			include_once "desktop/ua-ie7.css";
		} else if(preg_match("/\bMSIE 8.0\b/i", __AGENT__)) {
			//print "Internet Explorer 8 Success";
			include_once "desktop/ua-ie8.css";
		} else if(preg_match("/\bMSIE 9.0\b/i", __AGENT__)) {
			//print "Internet Explorer 9 Success";
			include_once "desktop/ua-ie9.css";
		} else if(preg_match("/\bOpera\b/i", __AGENT__)) {
			//print "Opera Success";
			include_once "desktop/ua-opera.css";
		}
		print "\r\n\r\n";
	}
/*
 ***************************************************************************
 *	Help CSS
 ***************************************************************************
*/
	if(isset($_GET['df']) && $_GET['df'] == "/help/") {
		include_once "desktop/help.css";
		print "\r\n\r\n";
	}
	
/*
 ***************************************************************************
 *	MegaMenu CSS for Desktop
 ***************************************************************************
*/
	if(__PLATFORM__ == "desktop") {
		include_once "desktop/mega-menu.css";
		print "\r\n\r\n";
	}
	
	
/*
 ***************************************************************************
 *	Local Microsite CSS
 ***************************************************************************
*/
	if(isset($_GET['df']) && $_GET['df'] != "/help/" && __PLATFORM__ == "desktop") {
 		include_once $_SERVER['DOCUMENT_ROOT'].$_GET['df']."localIncludes/custom.css";
		print "\r\n\r\n";
	}

/* End of file base.css.php */
/* Location: assets/css/base.css.php */
?>