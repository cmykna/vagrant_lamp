<?php
/**
 * Microsite Coda Settings Default
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
 *	This contains all the values needed for the coda configuration
 *
 *	Include Class file
 *	system/classes/coda.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/coda.inc.php";
/*
 ***************************************************************************
 *	CREATE CODA OBJECT FOR MICROSITE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$coda = new Coda();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR PAGE SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	DOES THIS PAGE HAVE A CODA SLIDER?
 *	@method: hasCoda($bool)
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
	$coda->hasCoda();
/*
 ***************************************************************************
 *	SPECIFIES WHETHER SLIDER SHOULD MOVE BETWEEN PANELS AUTOMATICALLY
 *	@method: autoSlide($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/		
	$coda->autoSlide();
/*
 ***************************************************************************
 *	TIME TO WAIT BEFORE AUTO SLIDING
 *	@method: autoSlideInterval($int)
 *
 *	@var $int
 *	@param integer $int
 *	@var integer param: any amount of milliseconds. 1 second = 1000 milliseconds
 *	@var default param: 7000
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 3
*/	
	$coda->autoSlideInterval();
/*
 ***************************************************************************
 *	DETERMINES WHETHER THE AUTOSLIDE FUNCTION SHOULD STOP WHEN USER INTERACTS
 *	WITH THE SLIDER
 *	@method: autoSlideStopWhenClicked($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 4
*/
	$coda->autoSlideStopWhenClicked();
/*
 ***************************************************************************
 *	PLACES LEFT AND RIGHT NAVIGATION BUTTONS ALONGSIDE THE SLIDER
 *	@method: dynamicArrows($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	$coda->dynamicArrows();
/*
 ***************************************************************************
 *	ADDS TABBED NAVIGATION TO THE SLIDER
 *	@method: dynamicTabs($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 6
*/
	$coda->dynamicTabs();
/*
 ***************************************************************************
 *	SPECIFIES THE HORIZONTAL ALIGNMENT OF THE TABBED NAVIGATION
 *	RELATIVE TO THE SLIDER
 *	@method: dynamicTabsAlign($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'center', 'left', 'right'
 *	@var default param: 'center'
 * 
 *	NOT REQUIRED
 *	ORDER NUMBER 7
*/
	$coda->dynamicTabsAlign();
/*
 ***************************************************************************
 *	SPECIFIES WHETHER THE TABBED NAVIGATION SHOULD APPEAR ABOVE OR BELOW
 *	THE SLIDER
 *	@method: dynamicTabsPosition($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'bottom', 'top'
 *	@var default param: 'top'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 8
*/
	$coda->dynamicTabsPosition();
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$coda->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file coda.php */
/* Location: system/application/localIncludes/coda.php */
?>