<?php
/**
 * Microsite Settings Default
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
 * @subpackage System/Application/LocalIncludes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	This contains all the values needed for the local settings
 *	file for a microsite.
 *
 *	Include Class file
 *	system/classes/settings.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/settings.inc.php";
/*
 ***************************************************************************
 *	CREATE SETTINGS OBJECT FOR MICROSITE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$settings = new Settings();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR SITE SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	IS THIS A ROOT LEVEL MICROSITE?
 *	@method: rootLevel($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 1
*/
	$settings->rootLevel();
/*
 ***************************************************************************
 *	WHAT IS THE FOLDER LOCATION OF THE MICROSITE?
 *	MAKE SURE THERE ARE LEADING AND TRAILING SLASHES
 *	AND INCLUDE FULL PATH AND SUBPATH IF APPLICABLE
 *	@method: documentFolder($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string param: '/directory/'
 *	@var string param: '/directory/subdirectory/'
 *	@var default param: /build/
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/
	$settings->documentFolder();
/*
 ***************************************************************************
 *	MOBILE DEVICE ICON
 *	@method: hmhIcon($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/system/assets/icons/HMHed-icon-114.png'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 3
*/
	$settings->hmhIcon();	
/*
 ***************************************************************************
 *	FAVORITES ICON
 *	@method: favIcon($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/system/assets/icons/favicon.ico'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 4
*/
	$settings->favIcon();
/*
 ***************************************************************************
 *	PER MICROSITE GOOGLE ANALYTICS STRING
 *	IF YOU DO NOT HAVE A GOOGLE ANALYTICS
 *	CONTACT THE EMARKETING SEO PERSONNEL @ joe.bennet@hmhpub.com
 *	@method: gaTracker($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'UA-1008971-6'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/	
	$settings->gaTracker();
/*
 ***************************************************************************
 *	BASE CSS FILE
 *	@method: baseCSS($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/css.ext'
 *	@var default param: "/system/assets/css/base.css.php"
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 6
 * "/assets/system/css/base.mq.css.php"
*/
	$settings->baseCSS();
	//$settings->baseCSS(__SERVER__."/assets/system/css/base.mq.css.php");	
/*
 ***************************************************************************
 *	HAS LOCAL CSS?
 *	DEPRECATED METHOD
 *	@method: displayLocalCSS($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 7
*/	
	$settings->displayLocalCSS();
/*
 ***************************************************************************	
 *	IS THIS A NATIONAL OR STATE MICROSITE?
 *	@method: nationalState($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'alabama', 'alaska', 'arizona', 'arkansas', 'california' 
 *	@var string params: 'colorado', 'connecticut', 'delaware', 'district of columbia'
 *	@var string params: 'florida', 'georgia', 'hawaii', 'idaho', 'illinois', 'indiana'
 *	@var string params: 'iowa', 'kansas', 'kentucky', 'louisiana', 'maine', 'maryland'
 *	@var string params: 'massachusetts', 'michigan', 'minnesota', 'mississippi'
 *	@var string params: 'missouri', 'montana', 'nebraska', 'nevada', 'new hampshire'
 *	@var string params: 'new jersey', 'new mexico', 'new york', 'north carolina'
 *	@var string params: 'north dakota', 'ohio', 'oklahoma', 'oregon', 'pennsylvania'
 *	@var string params: 'rhode island', 'south carolina', 'south dakota', 'tennessee'
 *	@var string params: 'texas', 'utah', 'vermont', 'virginia', 'washington'
 *	@var string params: 'west virginia', 'wisconsin', 'wyoming', 'national'
 *	@var string params: 'international'
 *	@var string params: 'ak', 'al', 'ar', 'az', 'ca', 'co', 'ct', 'dc', 'de', 'fl'
 *	@var string params: 'ga', 'hi', 'ia', 'id', 'il', 'in', 'ks', 'ky', 'la', 'ma'
 *	@var string params: 'md', 'me', 'mi', 'mn', 'mo', 'ms', 'mt', 'nc', 'nd', 'ne'
 *	@var string params: 'nh', 'nj', 'nm', 'nv', 'ny', 'oh', 'ok', 'or', 'pa', 'ri'
 *	@var string params: 'sc', 'sd', 'tn', 'tx', 'ut', 'va', 'vt', 'wa', 'wi', 'wv'
 *	@var string params: 'wy', 'na', 'int'
 *	@var default param: 'national'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 8
*/
	$settings->nationalState();
/*
 ***************************************************************************		
 *	PROGRAM / STATE TAG?
 *	@method: programState($str, $file)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Beta Microsite'
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/file.ext'
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 9
*/
	$settings->programState();	
/*
 ***************************************************************************
 *	ELOQUA FORM REQUEST NAME
 *	@method: request($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'hmd_request', 'gs_request', 'rigby_request'
 *	@var string params: 'saxon_request', 'sv_request', 'hmhschool_request'
 *	@var default param: 'Contact_us'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 10
*/
	$settings->request();
/*
 ***************************************************************************
 *	ELOQUA CAMPAIGN CODE
 *	@method: campaignCode($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'mstest'
 *
 *	REQUIRED - STRING
 *	ORDER NUMBER 11
*/
	$settings->campaignCode();
/*
 ***************************************************************************
 *	GLOBAL TRADEMARK FOR MICROSITE
 *	This will not override the per page trademark if the 
 *	$page->trademark is defined
 *	@method: trademark($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 12
*/
	$settings->trademark();
/*
 ***************************************************************************
 *	DEVELOPER FOR MICROSITE
 *	@method: developer($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 13
*/
	$settings->developer();
/*
 ***************************************************************************
 *	Set Contact Page
 *	@method: setContact($href)
 *
 *	@var $href
 *	@param string $href
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 14
*/
	$settings->setContact();
/*
 ***************************************************************************
 *	GOOGLE ANALYTICS OUTBOUND LINK TRACKER
 *	@method: gaLinkTracker($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 15
*/	
	$settings->gaLinkTracker();
/*
 ***************************************************************************
 *	HEAT MAP TRACKER OVERLAY
 *	@method: heatMapTracker($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 16
*/	
	$settings->heatMapTracker();
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$settings->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file settings.php */
/* Location: system/application/localIncludes/settings.php */
?>