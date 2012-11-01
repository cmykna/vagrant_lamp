<?php
/**
 * Microsite Slide Class
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
 *	This class contains all the methods needed to construct slides for the
 *	coda slider
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS SLIDE
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/slide.php
 ***************************************************************************
*/
class Slide
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Slide Version 3.0.0";
	// Return the version of the class
	private function _getVersion() {
		return (string) $this->version;
	}
	// Setup the arrays needed by this class
	// Slide Align Array
	private $slideAlign = array();
	// Slide Image Array
	private $slideImage = array();
	// Slide Headline Array
	private $slideHeadline = array();
	// Slide Headline Array
	private $slideBodyCopy = array();
	// Slide Button Array
	private $slideButton = array();
/*
 ***************************************************************************
 *	ERROR REPORTING
 *	@method: errorReport($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function errorReport($bool) {
		$this->reporter = (int) booleanCheck($bool);
		if ($this->reporter == 1) {
			$this->_generateReport();
		}
	}
	// Method for defining the slides alignment	
	// String Value Required
	public function slideAlign($str, $id) {
		$this->slideAlignment = ($str != NULL) ? (string) " class=\"copy-block-".$str."\"" : (string) " class=\"copy-block\"";
		$this->id = ($id != NULL) ? (string) " id=\"".$id."\"" : "";
		$slideAlignStr = (string) "<div%s%s>";
		$slideAlignCompiled = sprintf($slideAlignStr, $this->id, $this->slideAlignment);
		$this->slideAlign[] = (string) $slideAlignCompiled;
	}
	// Method for defining the slide image
	// String Values Required
	public function slideImage($file, $alt) {
		$this->slideImageFile = (string) stripHTTP($file);
		$this->slideImageAlt = (string) $alt;
		$slideImageStr = (string) "<img src=\"%s\" class=\"slide-image\" alt=\"%s\" />";
		$slideCompiled = sprintf($slideImageStr, $this->slideImageFile, $this->slideImageAlt);
		$this->slideImage[] = (string) $slideCompiled;
	}
	// Method for defining the slide headline
	// String Values Required
	public function slideHeadLine($str, $class) {
		$this->slideHeadLineStr = (string) $str;
		$this->slideHeadLineClass = (string) $class;
		if($this->slideHeadLineClass != NULL) {
			$this->slideHeadLineClass = (string) " class=\"".$class."\"";	
		} else {
			$this->slideHeadLineClass;
		}
		$slideHeadLineStr = (string) "<h2%s>%s</h2>";
		$headlineCompiled = sprintf($slideHeadLineStr, $this->slideHeadLineClass, $this->slideHeadLineStr);
		$this->slideHeadline[] = (string) $headlineCompiled;
	}
	// method for defining the slide body copy
	// String Values Required
	public function slideBodyCopy($str, $class) {
		$this->slideBodyCopyStr = (string) $str;
		$this->slideBodyCopyClass = (string) $class;
		if($this->slideBodyCopyClass != NULL) {
			$this->slideBodyCopyClass = (string) " class=\"".$class."\"";
		} else {
			$this->slideBodyCopyClass;
		}
		$slideBodyStr = (string) "<p%s>%s</p>";
		$bodyCopyCompiled = sprintf($slideBodyStr, $this->slideBodyCopyClass, $this->slideBodyCopyStr);
		$this->slideBodyCopy[] = (string) $bodyCopyCompiled;
	}
	// method for defining the slide button
	// String Values Required 
	public function slideButton($str, $href, $class) {
		$this->slideButtonStr = (string) $str;
		$this->slideButtonLink = (string) stripHTTP($href);
		$this->slideButtonClass = (string) $class;
		$slideButtonStr = "<a class=\"%s\" href=\"%s\">%s</a>";
		$slideButtonCompiled = sprintf($slideButtonStr, $this->slideButtonClass, $this->slideButtonLink, $this->slideButtonStr);
		$this->slideButton[] = (string) $slideButtonCompiled;
	}
	// Method for building out the slides on the page
	public function codaBuild() {
		return $this->_build();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _build() {
		$i = (int) 4;	// offset default slide
		$slideImgCount = (int) count($this->slideImage);
		$slideHeadlineCount = (int) count($this->slideHeadline);
		$slideBodyCopyCount = (int) count($this->slideBodyCopy);
		$slideButtonCount = (int) count($this->slideButton);
		$this->codaBuild  = (string) "\r\n\t\t\t\t<div id=\"coda-slider-wrapper\">";
		$this->codaBuild .= (string) "\r\n\t\t\t\t\t<div class=\"coda-slider preload\" id=\"coda-slider\">";
		for ($i; $i < $slideImgCount; $i++) {
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t<div class=\"panel\">";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"panel-wrapper\">";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t<div class=\"slide-container\">";
			$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t".$this->slideAlign[$i];
			if($i == 4) {
				$toReplace = "h2>";
				$replaceWith = "h1>";
				$swap .= str_replace($toReplace, $replaceWith, $this->slideHeadline[$i]);
				$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t\t".$swap;
			} else {
				$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideHeadline[$i];
			}
			$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideBodyCopy[$i];
			$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideButton[$i];
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= "\r\n\t\t\t\t\t\t\t\t\t".$this->slideImage[$i];
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t</div>";
		}
		$this->codaBuild .= (string) "\r\n\t\t\t\t\t</div>";
		$this->codaBuild .= (string) "\r\n\t\t\t\t</div>\r\n";
		return $this->codaBuild;
	}

	private function _generateReport() {
print
"<pre>
\r\nSlide Values
\r\nVersion: ".$this->version.
"\r\n</pre>";		
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file slide.inc.php */
/* Location: system/classes/slide.inc.php */
?>