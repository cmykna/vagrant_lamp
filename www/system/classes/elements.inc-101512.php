<?php
/**
 * Microsite Elements Class
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
 * @subpackage System/Classes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
 
/*
 ***************************************************************************
 *	This class contains all the methods needed to construct the elements
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS ELEMENTS
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/elements.php
 ***************************************************************************
*/
class Elements
{
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/

/*
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
	public function iconButton($class = NULL, $href = NULL, $str = NULL, $size = NULL, $external = NULL) {
		$this->iconButtonClass = (string) $class;
		$this->iconButtonHref = (string) stripHTTP($href);
		$this->iconButtonString = (string) $str;
		$this->external = (is_string($external)) ? (string) $external : (int) booleanCheck($external);
		$this->iconButtonSize = ($size != NULL) ? (string) " (".$size.")" : NULL;
		if($this->external === 0 || $this->external == NULL) {
			$this->rel = (string) " ";
		} else if($this->external === 1) {
			$this->rel = (string) " rel=\"external\" ";
		} else {
			$this->rel = (string) " rel=\"".$this->external."\" ";
		}
		$this->iconButton = (string) sprintf("\r\n<a%sclass=\"%s\" href=\"%s\"><span><em>%s</em>%s</span></a>", $this->rel, $this->iconButtonClass, $this->iconButtonHref, $this->iconButtonString, $this->iconButtonSize);
		return $this->iconButton;
	}
/*
 ***************************************************************************
 *	@method: button($class, $href, $str, $alignment, $external)
 *
 *	@var $class
 *	@param string $class
 *	@var string params: 'button', 'button-alt', 'button-opt'
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
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
*/
	public function button($class = NULL, $href = NULL, $str = NULL, $alignment = NULL, $external = NULL) {
		$this->buttonClass = (string) $class;
		$this->buttonHref = (string) stripHTTP($href);
		$this->buttonStr = (string) $str;
		$this->buttonAlignment = (string) $alignment;
		$this->external = (is_string($external)) ? (string) $external : (int) booleanCheck($external);
		if($this->external === 0) {
			$this->rel = (string) " ";
		} else if($this->external === 1) {
			$this->rel = (string) " rel=\"external\" ";
		} else {
			$this->rel = (string) " rel=\"".$this->external."\" ";	
		}
		$this->button = ($this->buttonAlignment != NULL) ?
			(string) sprintf("\r\n<span class=\"%s\"><a%sclass=\"%s\" href=\"%s\">%s</a></span>", $this->buttonAlignment, $this->rel, $this->buttonClass, $this->buttonHref, $this->buttonStr)
			:
			(string) sprintf("\r\n<a%sclass=\"%s\" href=\"%s\">%s</a>", $this->rel, $this->buttonClass, $this->buttonHref, $this->buttonStr);
		return $this->button;
	}
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
	public function disclaimer($str, $class) {
		$this->disclaimerStr = (string) $str;
		$this->disclaimerClass = (string) $class;
		$this->disclaimer = ($this->disclaimerClass != NULL) ?
			(string) sprintf("\r\n<p%s>%s</p>", " class=\"".$class."\"", $this->disclaimerStr)
			:
			(string) sprintf("\r\n<p class=\"disclaimer\">%s</p>", $this->disclaimerStr);
		return $this->disclaimer;	
	}
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
*/
	public function image($file = NULL, $alignment = NULL, $type = NULL, $alt = NULL, $title = NULL, $href = NULL, $width = NULL, $height = NULL) {
		$array 	= array("center", "left", "right");
		$this->imgFile = (string) stripHTTP($file);
		$this->alignment = (in_array($alignment, $array, true)) ? (string) $alignment : (string) "center";
		$this->type = ($type == "lb") ? (string) "-lb" : 
			(($type == "s2l") ? (string) "-lb-s2l": 
			(($type == "rep") ? "-rep" : NULL));
		$this->alt = ($alt != NULL) ? (string) $alt : NULL;
		$this->title = ($title != NULL) ? (string) $title : NULL;
		$this->sourceType = ($href != NULL) ? (string) "video-" : (string) "image-";
		$this->href = (string) stripHTTP($href);
		$this->width = ($width != NULL) ? (int) $width : NULL;
		$this->height = ($height != NULL) ? (int) $height : NULL;
		$this->image = ($this->href != NULL) ?
			(string) sprintf("<img class=\"%s%s%s\" rel=\"%s|%d|%d\" src=\"%s\" alt=\"%s\" title=\"%s\">", $this->sourceType, $this->alignment, $this->type, $this->href, $this->width, $this->height, $this->imgFile, $this->alt, $this->title)
			:
			(string) sprintf("<img class=\"%s%s%s\" src=\"%s\" alt=\"%s\" title=\"%s\">", $this->sourceType, $this->alignment, $this->type, $this->imgFile, $this->alt, $this->title);
		return $this->image;
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file elements.inc.php */
/* Location: system/classes/elements.inc.php */
?>
