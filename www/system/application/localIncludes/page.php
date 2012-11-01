<?php
/**
 * Microsite Page Settings Default
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
	$page->hasMeta();
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
	$page->isIndexPage();
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
 *	ORDER NUMBER 4
*/
	$page->isFullWidthLayout();
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
 *	ORDER NUMBER 5
*/
	$page->isProductLandingPage();
/*
 ***************************************************************************
 *	IS THIS A LOCATION PAGE?
 *	@method: isLocationPage($bool)
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
	$page->isLocationPage();
/*
 ***************************************************************************
 *	IS THIS A CAMPAIGN PAGE?
 *	@method: isCampaignPage($bool)
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
	$page->isCampaignPage();
/*
 ***************************************************************************
 *	Hide Header?
 *	@method: isHeaderHidden($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 8
*/
	$page->isHeaderHidden();
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
 *	ORDER NUMBER 9
*/
	$page->isContact();
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
 *	ORDER NUMBER 10
*/
	$page->isVSReg();
/*
 ***************************************************************************
 *	IS THIS A CAMPAIGN EMAIL PAGE?
 *	@method: isCampaignEmail($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 11
*/
	$page->isCampaignEmail();
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
 *	ORDER NUMBER 12
*/
	$page->hasRefresh();
/*
 ***************************************************************************
 *	BODY NAMESPACE
 *	@method: body($id)
 *
 *	@var $id
 *	@param string $id
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 13
*/
	$page->body();
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
 *	ORDER NUMBER 14
*/
	$page->hasTabs();
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
 *	ORDER NUMBER 15
*/
	$page->trademark();
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$page->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file page.php */
/* Location: system/application/localIncludes/page.php */
?>