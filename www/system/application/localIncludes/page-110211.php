<?php
/**
 * Microsite Page Settings Default
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
 * @subpackage System/Application/LocalIncludes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	This contains all the values needed for the local per page settings
 *	for a microsite.
 *
 *	Include Class file
 *	system/classes/page.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/page.inc.php";
/*
 ***************************************************************************
 *	CREATE PAGE OBJECT FOR MICROSITE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$page = new Page();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR PAGE SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	PAGE TITLE <title></title>
 *	@method: pageTitle($str)
 *
 *	@var $str
 *	@param string $str
 *	@var limitations: 64 Characters (Including Spaces) for Page Title
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 1
*/
	$page->pageTitle();
/*
 ***************************************************************************
 *	DO YOU WANT TO USE META TAGS TO IMPROVE SEO RANKINGS?
 *	@method: hasMeta($bool, $description, $keywords)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	@var $description
 *	@param string $description
 *	@var limitation: 150 Characters (Including Spaces) for Meta Description
 *	@var default param: 'description of the microsite'
 *
 *	@var $keywords
 *	@param string $keywords
 *	@var limitation: 5-10 Words max (175 characters max)
 *	@var default param: 'keywords, used, in, microsite'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/
	$page->hasMeta(0, "Description of the Microsite", "Microsite, HMHEducation, Templates");
/*
 ***************************************************************************
 *	IS THIS AN INDEX PAGE?
 *	@method: isIndexPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 3
*/
	$page->isIndexPage(0);
/*
 ***************************************************************************
 *	IS THIS A SITE MAP PAGE?
 *	DEPRECATED METHOD
 *	@method: isSiteMapPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 4
*/
	$page->isSiteMapPage(0);
/*
 ***************************************************************************
 *	IS THIS A FULL WIDTH LAYOUT PAGE?
 *	@method: isFullWidthLayout($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	$page->isFullWidthLayout(0);
/*
 ***************************************************************************
 *	IS THIS A PRODUCT LANDING PAGE?
 *	@method: isProductLandingPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 6
*/
	$page->isProductLandingPage(0);
/*
 ***************************************************************************
 *	IS THIS A CONTACT US PAGE?
 *	@method: isContact($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 7
*/
	$page->isContact(0);
/*
 ***************************************************************************
 *	IS THIS A VS REGISTRATION PAGE?
 *	@method: isVSReg($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 8
*/
	$page->isVSReg(0);
/*
 ***************************************************************************
 *	DOES THIS PAGE REFRESH?
 *	@method: hasRefresh($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 9
*/
	$page->hasRefresh(0);
/*
 ***************************************************************************
 *	DOES THIS PAGE HAVE TABS? 
 *	@method: hasTabs($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 10
*/
	$page->hasTabs(0);
/*
 ***************************************************************************
 *	PAGE TRADEMARK FOR MICROSITE
 *	This will override the global trademark $settings->trademark
 *	@method: trademark($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	REQUIRED - STRING
 *	ORDER NUMBER 11
*/
	$page->trademark(NULL);
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$page->errorReport(0);
/*
 ***************************************************************************
*/		 
/* End of file page.php */
/* Location: system/application/localIncludes/page.php */
?>