<?php
/**
 * Microsite Bucket Default
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
 *	This contains all the values needed for the bucket configuration
 *
 *	Include Class file
 *	system/classes/buckets.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/buckets.inc.php";
/*
 ***************************************************************************
 *	CREATE BUCKETS OBJECT FOR INDEX PAGE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$bucket = new Buckets();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR BUCKET SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	HOW MANY BUCKETS DO YOU WNT ON YOUR INDEX PAGE?
 *	@method: bucketCount($str)
 *
 *	@var $str
 *	@param mixed $str
 *	@var string params: 'three', 'four 
 *	@var integer params: 3, 4
 *	@var default param: 3
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 1
*/
	$bucket->bucketCount(3);
/*
 ***************************************************************************
 *	@method: headLine($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Headline Here'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/
	  $bucket->headline("Headline Here");
	  $bucket->headline("Headline Here");
	  $bucket->headline("Headline Here");
/*
 ***************************************************************************
 *	@method: bucketCopy($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Do not change font, color or position of any text in bucket ads.'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 3
*/
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
/*
 ***************************************************************************
  *	@method: bucketLink($str, $href, $class, $external)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Learn More'
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'call-out-link'
 *
 *	@var $external
 *	@param int $external
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	$bucket->bucketLink("Learn More", "#");
	$bucket->bucketLink("Learn More", "#");
	$bucket->bucketLink("Learn More", "#");
/*
 ***************************************************************************
 *	@method: image($file, $alt, $class)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/assets/images/build/bucket-image.png'
 *
 *	@var $alt
 *	@param string $alt
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'call-out'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");	
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");	
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$bucket->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file buckets.php */
/* Location: system/application/localIncludes/buckets.php */
?>