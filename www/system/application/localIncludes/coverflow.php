<?php
/**
 * Microsite Coverflow Settings Default
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
 *	This contains all the values needed for the coverflow configuration
 *
 *	Include Class file
 *	system/classes/coverflow.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/coverflow.inc.php";
/*
 ***************************************************************************
 *	CREATE COVERFLOW OBJECT FOR MICROSITE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$coverflow = new Coverflow();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR PAGE SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	DOES THIS PAGE HAVE A COVERFLOW SLIDER?
 *	
 *	@method: hasCoverflow($bool)
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
	$coverflow->hasCoverflow(0);
/*
 ***************************************************************************
 *	ADD IN THE ITEMS HERE
 *
 *	@method: coverFlowItem($file, $caption)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/assets/images/build/generic-image-cf.gif'
 *
 *	@var $caption
 *	@param string $caption
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$coverflow->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file coverflow.php */
/* Location: system/application/localIncludes/coverflow.php */
?>