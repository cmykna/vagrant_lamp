<?php
/**
 * Microsite Global Definitions
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
 * @subpackage System
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 * int.hmheducation.com:22/wdcdvlw01.hmco.com
 * /www/hmheducation.com/docs
 * www/ko4term
*/

/*
 ***************************************************************************
 *	Set the host for approved HMH Servers and local development boxes
 ***************************************************************************
*/
	// Setup the various servers array
	$serverArray = array (
		// Setup for local development boxes
			"127.0.0.1",
			"localhost",
			"localhost.hmheducation",
			"hmheducation",
		// Setup for INT development server
			"int.hmheducation.com",
		// Setup for CERT staging server
			"cert.hmheducation.com",
		// Setup for all production servers
			"10.83.26.34",	
			"10.83.26.35",
			"hmheducation.com",
			"www.hmheducation.com"
	);
	// Scan through the array, see if there is a match. If there is a match, define
	// Global variable __SERVER__, otherwise, return error message.
	if(in_array($_SERVER["HTTP_HOST"], $serverArray)) {
			define("__SERVER__", "//".$_SERVER["HTTP_HOST"]."");
		} else {
			die("<strong>FATAL:</strong>Microsite Templates can run only on HMH approved servers. Please contact the eMarketing Web Team for Support.");
		}
/*
 ***************************************************************************
 *	Set LOCAL SYSTEM Constants
 ***************************************************************************
*/
	// global assets
	// assets
	define("__GLOB_ASSETS__", $_SERVER["DOCUMENT_ROOT"]."/assets");
	// build
	define("__BUILD__", $_SERVER["DOCUMENT_ROOT"]."/build");
	
	// system
	define("__SYS__", $_SERVER["DOCUMENT_ROOT"]."/system");
	// system/application
	define("__APP__", __SYS__."/application");
	// system/application/localIncludes
	define("__APPLOC__", __APP__."/localIncludes");
	// system/assets
	define("__ASSET__", __SYS__."/assets");
	// system/assets/buttons
	define("__BUTTONS__", __ASSET__."/buttons");
	// system/assets/css
	define("__CSS__", __ASSET__."/css");
	// system/assets/fonts
	define("__FONTS__", __ASSET__."/fonts");
	// system/assets/help
	define("__HELP__", __ASSET__."/help");
	// system/assets/icons
	define("__ICONS__", __ASSET__."/icons");
	// system/assets/images
	define("__IMAGES__", __ASSET__."/images");
	// system/assets/js
	define("__JS__", __ASSET__."/js");
	// system/classes
	define("__CLSS__", __SYS__."/classes");
	// system/dataSets
	define("__DATA__", __SYS__."/dataSets");
	// system/functions
	define("__FUNCT__", __SYS__."/functions");
	// system/templates
	define("__TEMPLATES__", __SYS__."/templates");
/*
 ***************************************************************************
 *	Set SERVER SIDE SYSTEM Constants
 ***************************************************************************
*/
	// global assets
	// http://__SERVER__/assets
	define("__S_GLOB_ASSETS__", __SERVER__."/assets");
	// http://__SERVER__/assets/images
	define("__S_GLOB_IMAGES__", __S_GLOB_ASSETS__."/images");
	
	// http://__SERVER__
	define("__S_SYS__", __SERVER__."/system");
	// http://__SERVER__/system/application
	define("__S_APP__", __S_SYS__."/application");
	// http://__SERVER__/system/application/localIncludes
	define("__S_APPLOC__", __S_APP__."/localIncludes");
	// http://__SERVER__/system/assets
	define("__S_ASSET__", __S_SYS__."/assets");
	// http://__SERVER__/system/assets/buttons
	define("__S_BUTTONS__", __S_ASSET__."/buttons");
	// http://__SERVER__/system/assets/css
	define("__S_CSS__", __S_ASSET__."/css");
	// http://__SERVER__/system/assets/fonts
	define("__S_FONTS__", __S_ASSET__."/fonts");
	// http://__SERVER__/system/assets/help
	define("__S_HELP__", __S_ASSET__."/help");
	// http://__SERVER__/system/assets/icons
	define("__S_ICONS__", __S_ASSET__."/icons");
	// http://__SERVER__/system/assets/images
	define("__S_IMAGES__", __S_ASSET__."/images");
	// http://__SERVER__/system/assets/js
	define("__S_JS__", __S_ASSET__."/js");
	// http://__SERVER__/system/classes
	define("__S_CLSS__", __S_SYS__."/classes");
	// http://__SERVER__/system/dataSets
	define("__S_DATA__", __S_SYS__."/dataSets");
	// http://__SERVER__/system/functions
	define("__S_FUNCT__", __S_SYS__."/functions");
	// http://__SERVER__/system/templates
	define("__S_TEMPLATES__", __S_SYS__."/templates");
/*
 ***************************************************************************
 *	Grab User Agent
 ***************************************************************************
*/
	define("__AGENT__", $_SERVER["HTTP_USER_AGENT"]);
/*
 ***************************************************************************
 *	Catch User Agent and Determine if Desktop, Pad or Phone
 ***************************************************************************
*/
	if((preg_match("/\bWindows NT\b/i", __AGENT__)) || 
		(preg_match("/\bMacintosh\b/i", __AGENT__))) {
			define("__PLATFORM__", "desktop");
	} else if(preg_match("/\biPad\b/i", __AGENT__)) {
		define("__PLATFORM__", "pad");
	} else if(preg_match("/\biPhone\b/i", __AGENT__) ||
		preg_match("/\biPod\b/i", __AGENT__) ||
		preg_match("/\bAndroid\b/i", __AGENT__)) {
		define("__PLATFORM__", "phone");
	} else {
		define("__PLATFORM__", "desktop");
	}
/*
 ***************************************************************************
 *	Grab Current File Name
 ***************************************************************************
*/
	// *.php
	define("__FILE_NAME__", substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/') + 1));
/*
 ***************************************************************************
 *	Grab Directory
 ***************************************************************************
*/
	$getDir = pathinfo($_SERVER['PHP_SELF']);
	define("__DIRECTORY__", $getDir["dirname"]."/");
		
/* End of file define.php */
/* Location: system/define.php */
?>