<?php
/**
 * Microsite Coda Slide Default
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
 *	This contains all the values needed for the slide configuration
 *
 *	Include Class file
 *	system/classes/buckets.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/slide.inc.php";
/*
 ***************************************************************************
 *	CREATE SLIDE OBJECT
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$slide = new Slide();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR SLIDE SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	WHAT SIDE OF THE SLIDE DO YOU WANT TO ALIGN THE TEXT
 *
 *	@method: slideAlign($str, $id)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: NULL, 'right', 'left'
 *	@var default param: NULL
 *
 *	@var $id
 *	@param string $id
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 1
*/
	$slide->slideAlign();
	$slide->slideAlign("left");
	$slide->slideAlign("right");
	$slide->slideAlign("left");
/*
 ***************************************************************************
 *	@method: slideImage($file, $alt)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/system/assets/images/blank.png'
 *
 *	@var $alt
 *	@param string $alt
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 2
*/
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideImage(__S_IMAGES__."/blank.png");
/*
 ***************************************************************************
 *	@method: slideHeadLine($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Keep HeadLine 1 to 35 Characters Max'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 3
*/
	$slide->slideHeadLine("Keep HeadLine 1 to 35 Characters Max");
	$slide->slideHeadLine("Keep HeadLine 2 to 35 Characters Max");
	$slide->slideHeadLine("Keep HeadLine 3 to 35 Characters Max");
	$slide->slideHeadLine("Keep HeadLine 4 to 35 Characters Max");
/*
 ***************************************************************************
 *	@method: slideBodyCopy($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Body text goes here. Keep all text concise - 
 *	250 characters max.'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	REQUIRED
 *	ORDER NUMBER 4
*/
	$slide->slideBodyCopy("Body 1 text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideBodyCopy("Body 2 text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideBodyCopy("Body 3 text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideBodyCopy("Body 4 text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
/*
 ***************************************************************************
 *	@method: slideButton($str, $href, $class, $gaLinkTrack, $external)
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
 *	@var string params: 'button', 'button-alt', 'app-store'
 *	@var default param: 'button'
 *
 *	@var $gaLinkTrack
 *	@param function $gaLinkTrack
 *	@var string params: NULL
 *	@var default param: NULL
 *
 *	@var $external
 *	@param mixed $external
 *  @var string
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *  --BY PASSING TWO INTEGERS SEPARATED BY A PIPE CHARACTER,
 *    AN IMPLIED FANCYBOX WILL BE IMPLEMENTED WITH THE RESPECTIVE
 *    WIDTH|HEIGHT PARAMETERS--
 * 
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	$slide->slideButton("Learn More 1", "#", "button", NULL, "600|400");
	$slide->slideButton("Learn More 2", "#", "button-alt");
	$slide->slideButton("Learn More 3", "#", "button");
	$slide->slideButton("Learn More 4", "#", "button-alt", "MicroSite - Slide 3 - Virtual Sample");
	
/*
 ***************************************************************************
 *	TROUBLESHOOTING METHODS
*/
	$slide->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file slide.php */
/* Location: system/application/localIncludes/slide.php */
?>