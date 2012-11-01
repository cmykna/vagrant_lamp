<?php
/**
 * Microsite Element Default
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
 *	This contains all the values needed for the elements configuration
 *
 *	Include Class file
 *	system/classes/elements.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/elements.inc.php";
/*
 ***************************************************************************
 *	CREATE ELEMENTS OBJECT FOR THE PAGES
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$element = new Elements();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR ELEMENT SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	@method: iconButton($class, $href, $str, $size, $external)
 *
 *	@var $class
 *	@param string $class
 *	@var string params: 'download', 'video', 'more-info', 'purchase'
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $size
 *	@param string $size
 *
 *	@var $external
 *	@param mixed $external
 *  @var string
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
*/	
	$element->iconButton("download", "#", "Download PDF", "1.36mb", "fancy");
	$element->iconButton("video", "#", "Watch a video", NULL, 1);
	$element->iconButton("more-info", "#", "More Info");
	$element->iconButton("purchase", "#", "Purchase");
/*
 ***************************************************************************
 *	@method: button($class, $href, $str, $alignment, $external)
 *
 *	@var $class
 *	@param string $class
 *	@var string params: 'button', 'button-alt', 'button-opt', 'app-store'
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $alignment
 *	@param string $alignment
 *	@var string params: NULL, 'right-align'
 *	@var default param: NULL
 *
 *	@var $external
 *	@param mixed $external
 *  @var string
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
*/
	$element->button("button", "#", "Button", "right-align", 1);
	$element->button("button", "#", "Button", NULL, 1);
	$element->button("button-alt", "#", "Button Alt", "right-align", 1);
	$element->button("button-alt", "#", "Button");
	$element->button("button-opt", "#", "Button Opt", "right-align");
	$element->button("button-opt", "#", "Button Opt");
	$element->button("app-store", "#", "App Store");
	
/*
 ***************************************************************************
 *	@method: disclaimer($str, $class)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'disclaimer'
*/	
	$element->disclaimer("This is caption/disclaimer text");
/*
 ***************************************************************************
 *	@method: image($file, $alignment, $type, $alt, $title, $href, $width, $height)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/assets/images/build/bucket-image.png'
 *
 *	@var $alignment
 *	@param string $alignment
 *	@var string params: 'center', 'left', 'right'
 *
 *	@var $type
 *	@param string $type
 *	@var string params: NULL, 'lb', 's2l', 'rep'
 *	@var default params: NULL
 *
 *	@var $alt
 *	@param string $alt
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	@var $title
 *	@param string $title
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	@var $href
 *	@param string $href
 *	@var default param: NULL
 *
 *	@var $width
 *	@param integer $width
 *	@var default param: NULL
 *
 *	@var $height
 *	@param integer $height
 *	@var default param: NULL
 *
 *	@var $class
 *	@param string $class
 *	@var string params: e.g. 'customize-img'
 *	to be customized in the localincludes/custom.css -file
*/
	$element->image(__S_GLOB_IMAGES__."/build/large-image-640x300.gif", "center", NULL, "Large Image 640 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/large-image-640x300.gif", "center", "lb", "Large Image 640 x 300 max");

	$element->image(__S_GLOB_IMAGES__."/build/large-image-684x300.gif", "center", NULL, "Large Image 684 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/large-image-684x300.gif", "center", "lb", "Large Image 684 x 300 max");

	$element->image(__S_GLOB_IMAGES__."/build/large-image-875x300.gif", "center", NULL, "Large Image 875 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/large-image-875x300.gif", "center", "lb", "Large Image 875 x 300 max");
	
	$element->image(__S_GLOB_IMAGES__."/build/large-image-912x300.gif", "center", NULL, "Large Image 912 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/large-image-912x300.gif", "center", "lb", "Large Image 912 x 300 max");
	
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "left", NULL, "Small Image 300 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "left", "lb", "Small Image 300 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "left", "s2l", "Small Image 300 x 300 max");

	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "right", NULL, "Small Image 300 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "right", "lb", "Small Image 300 x 300 max");
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "right", "s2l", "Small Image 300 x 300 max");

	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "left", "lb", "Small Image 300 x 300 max", NULL, "//hmheducation.com/tx/sci5/video/tx-sci5-video.php", 640, 360);	
	$element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "right", "lb", "Small Image 300 x 300 max", NULL, "//hmheducation.com/tx/sci5/video/tx-sci5-video.php", 640, 360);
/*
 ***************************************************************************
*/		 
/* End of file elements.php */
/* Location: system/application/localIncludes/elements.php */
?>