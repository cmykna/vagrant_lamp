<?php
/**
 * Microsite Menu Default
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
 *	This contains all the values needed for the menu configuration
 *
 *	Include Class file
 *	system/classes/menus.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/menus.inc.php";
/*
 ***************************************************************************
 *	CREATE MENUS OBJECT FOR MICROSITE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
/**
	Check settings to see which navigation class 
	we should use to generate menus.
*/
if ($settings->navStyle == "navtree") {
	$leftNav = new NavTree($settings->leftNavStyle);
	$headerNav = new Menu($settings->topNavStyle);
	$footerSocialNav = new Menu();
} else {
	// Fall back to normal menu generation
	$leftNav = new Menu();
	$headerNav = new Menu();
	$footerSocialNav = new Menu();
}
/*if (isset($settings->topNavStyle)) {
	$headerNav = new Menu($settings->topNavStyle);
} else {
	$headerNav = new Menu();
}*/
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR MENU SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	HEADER NAVIGATION
 *
 *	@method: topNavLink($str, $href, $class, $external)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'right-split'
 *
 *	@var $external
 *	@param string $external
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	REQUIRED
 *	ORDER NUMBER 1
*/
	$headerNav->topNavLink("Program Templates", "two-column-text-only.php");
	$headerNav->topNavLink("Team / Rep / Author Templates", "two-column-right-img-team.php");
	$headerNav->topNavLink("Contact Us", "contact-us.php");
/*
 ***************************************************************************
 *	@method: topEmailLink($str, $href, $class)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'campaign-email'
 *
*/
	$headerNav->topEmailLink("Email Us", "test@hmhpub.com");
/*
 ***************************************************************************
 *	@method: topNavSocialLink($str, $href, $class)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'social-network'
 *
 *	DEPRICATED
 *	ORDER NUMBER 2
*/
	$footerSocialNav->topNavSocialLink("FaceBook", "//www.facebook.com/HMHeducation");
	$footerSocialNav->topNavSocialLink("Twitter", "//www.twitter.com/hmheducation");
/*
 ***************************************************************************
 *	LEFT HAND NAVIGATION
 *
 *	@method: leftNavItem($group, $str, $href, $external)
 *
 *	@var $group
 *	@param string $str
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $external
 *	@param boolean $external
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	REQUIRED
 *	ORDER NUMBER 3
*/
	$leftNav->leftNavItem("default-programs", "Program Templates Character Limit: 44");
	$leftNav->leftNavItem("default-programs", "Two Column Program Templates Character Limit: 27");
	$leftNav->leftNavItem("default-programs", "Two Column: Text Only", "two-column-text-only.php");
	$leftNav->leftNavItem("default-programs", "Two Column: Centered Large Image and Text", "two-column-cent-img-text.php");
	$leftNav->leftNavItem("default-programs", "Two Column: Left Image and Text", "two-column-left-img-text.php");
	$leftNav->leftNavItem("default-programs", "Two Column: Right Image and Text", "two-column-right-img-text.php");
	$leftNav->leftNavItem("default-programs", "Two Column: Coverflow and Text", "two-column-coverflow.php");
	$leftNav->leftNavItem("default-programs", "Two Column: Tabs and Text", "two-column-tabs.php");
	$leftNav->leftNavItem("default-programs", "Page Open in a New Tab", "two-column-left-img-text.php", 1);// Bol = 1 makes link external
	$leftNav->leftNavItem("default-programs", "One Column Program Templates");
	$leftNav->leftNavItem("default-programs", "One Column: Text Only", "one-column-text-only.php");
	$leftNav->leftNavItem("default-programs", "One Column: Centered Large Image and Text", "one-column-cent-img-text.php");
	$leftNav->leftNavItem("default-programs", "One Column: Left Image and Text", "one-column-left-img-text.php");
	$leftNav->leftNavItem("default-programs", "One Column: Right Image and Text", "one-column-right-img-text.php");
	$leftNav->leftNavItem("default-programs", "One Column: Coverflow and Text", "one-column-coverflow.php");
	$leftNav->leftNavItem("default-programs", "One Column: Tabs and Text", "one-column-tabs.php");
	$leftNav->leftNavItem("default-programs", "Misc One Column Templates");
	$leftNav->leftNavItem("default-programs", "Microsite Home Page", "index.php");
	$leftNav->leftNavItem("default-programs", "Product Landing Page", "product-landing-page.php");
	//$leftNav->leftNavItem("default-programs", "Contact Form", "contact-us.php");
	//$leftNav->leftNavItem("default-programs", "Contact Response", "contact-response.php");
	//$leftNav->leftNavItem("default-programs", "Virtual Sampling Form", "vs-registration.php");
	//$leftNav->leftNavItem("default-programs", "Virtual Sampling Response", "vs-thankyou.php");

	$leftNav->leftNavItem("default-teams", "Team / Rep / Author Templates Character Limit: 44");
	$leftNav->leftNavItem("default-teams", "Two Column Team Templates Character Limit: 27");
	$leftNav->leftNavItem("default-teams", "Two Column: Right Image Team and Text", "two-column-right-img-team.php");
	$leftNav->leftNavItem("default-teams", "Two Column: Left Image Team and Text", "two-column-left-img-team.php");
/*
 ***************************************************************************
*/		 
/* End of file menus.php */
/* Location: system/application/localIncludes/menus.php */
?>