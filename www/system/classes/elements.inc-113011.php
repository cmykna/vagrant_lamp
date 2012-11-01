<?php
/**
 * Microsite Elements Class
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
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/
	public function iconButton($class, $href, $str, $size = NULL, $external) {
		$this->iconButtonClass = (string) $class;
		$this->iconButtonHref = (string) stripHTTP($href);
		$this->iconButtonString = (string) $str;
		$this->iconButtonSize = (string) $size;
		$this->external = (int) booleanCheck($external);
		if($this->iconButtonSize != NULL) {
			$this->iconButtonSize = (string) " (".$size.")";
		} else {
			$this->iconButtonSize;
		}
		if($this->external == 1) {
			$this->rel = " rel=\"external\" ";
		} else {
			$this->rel = " ";
		}
		$iconButtonStr = (string) "\r\n<a%sclass=\"%s\" href=\"%s\"><span><em>%s</em>%s</span></a>";
		$iconButtonCompiled = sprintf($iconButtonStr, $this->rel, $this->iconButtonClass, $this->iconButtonHref, $this->iconButtonString, $this->iconButtonSize);
		$this->iconButton = (string) $iconButtonCompiled;
		return $this->iconButton;
	}
	
	public function button($class, $href, $str, $alignment = NULL, $external) {
		$this->buttonClass = (string) $class;
		$this->buttonHref = (string) stripHTTP($href);
		$this->buttonStr = (string) $str;
		$this->buttonAlignment = (string) $alignment;
		$this->external = (int) booleanCheck($external);
		if($this->external == 1) {
			$this->rel = " rel=\"external\" ";
		} else {
			$this->rel = " ";
		}
		if($this->buttonAlignment != NULL) {
			$buttonStr = (string) "\r\n<span class=\"%s\"><a%sclass=\"%s\" href=\"%s\">%s</a></span>";
			$buttonCompiled = sprintf($buttonStr, $this->buttonAlignment, $this->rel, $this->buttonClass, $this->buttonHref, $this->buttonStr);
		} else {
			$buttonStr = (string) "\r\n<a%sclass=\"%s\" href=\"%s\">%s</a>";
			$buttonCompiled = sprintf($buttonStr, $this->rel, $this->buttonClass, $this->buttonHref, $this->buttonStr);
		}
		$this->button = (string) $buttonCompiled;
		return $this->button;
	}
	
	public function disclaimer($str, $class) {
		$this->disclaimerStr = (string) $str;
		$this->disclaimerClass = (string) $class;
		if($this->disclaimerClass != NULL) {
			$this->disclaimerClass = (string) " class=\"".$class."\"";
			$disclaimerStr = (string) "\r\n<p%s>%s</p>";
			$disclaimerCompiled = sprintf($disclaimerStr, $this->disclaimerClass, $this->disclaimerStr);
		} else {
			$disclaimerStr = (string) "\r\n<p class=\"disclaimer\">%s</p>";
			$disclaimerCompiled = sprintf($disclaimerStr, $this->disclaimerStr);
		}
		$this->disclaimer = (string) $disclaimerCompiled;
		return $this->disclaimer;	
	}
	
	public function image($file, $alignment, $type = NULL, $alt = NULL) {
		$this->imgFile = (string) stripHTTP($file);
		$this->alignment = (string) $alignment;
		$this->type = ($type == "lb") ? (string) "-lb" : (($type == "s2l") ? (string) "-lb-s2l": (($type == "rep") ? "-rep" : ""));
		$this->alt = ($alt != NULL) ? (string) $alt : (string) "";
		$imageStr = (string) "<img class=\"image-%s%s\" src=\"%s\" alt=\"%s\" title=\"%s\" />";
		$imageCompiled = sprintf($imageStr, $this->alignment, $this->type, $this->imgFile, $this->alt, $this->alt);
		$this->image = (string) $imageCompiled;
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