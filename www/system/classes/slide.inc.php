<?php
/**
 * Microsite Slide Class
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
	private $slideAlign = array();
	private $slideImage = array();
	private $slideHeadline = array();
	private $slideBodyCopy = array();
	private $slideButton = array();

	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}
	
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
	public function errorReport($bool = NULL) {
		$input = booleanCheck($bool);
		$this->reporter = ($input != NULL) ? (int) $input : (int) 0;
		return ($this->reporter == 1) ? $this->_generateReport() : NULL;
	}
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
*/
	public function slideAlign($str = NULL, $id = NULL) {
		$array 	= array("center", "left", "right");
		$this->slideAlignment = ($str != NULL) ? ((in_array($str, $array, true)) ? (string) " class=\"copy-block-".$str."\"" : (string) " class=\"copy-block\"") : (string) " class=\"copy-block\"";
		$this->id = ($id != NULL) ? (string) " id=\"".$id."\"" : NULL;
		$this->slideAlign[] = (string) sprintf("<div%s%s>", $this->id, $this->slideAlignment);
		return $this->slideAlign;
	}
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
*/
	public function slideImage($file = NULL, $alt = NULL) {
		$this->slideImageFile = ($file != NULL) ? (string) stripHTTP($file) : (string) __S_IMAGES__."/blank.png";
		$this->slideImageAlt = ($alt != NULL) ? (string) " alt=\"".$alt."\" " : " alt=\"\"";
		$this->slideImage[] = (string) sprintf("<img src=\"%s\" class=\"slide-image\"%s>", $this->slideImageFile, $this->slideImageAlt);
		return $this->slideImage;
	}
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
*/
	public function slideHeadLine($str = NULL, $class = NULL) {
		$this->slideHeadLineStr = ($str != NULL) ? (string) $str : NULL;
		$this->slideHeadLineClass = ($class != NULL) ? (string) " class=\"".$class."\"" : NULL;
		$this->slideHeadline[] = (string) sprintf("<h2%s>%s</h2>", $this->slideHeadLineClass, $this->slideHeadLineStr);
		return $this->slideHeadline;
	}
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
*/
	public function slideBodyCopy($str = NULL, $class = NULL) {
		$this->slideBodyCopyStr = ($str != NULL) ? (string) $str : NULL;
		$this->slideBodyCopyClass  = ($class != NULL) ? (string) " class=\"".$class."\"" : NULL;
		$this->slideBodyCopy[] = (string) sprintf("<p%s>%s</p>", $this->slideBodyCopyClass, $this->slideBodyCopyStr);
		return $this->slideBodyCopy;
	}
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
 *	@var string params: 'slide-button', 'slide-button-alt', 'slide-app-store'
 *	@var default param: 'slide-button'
 * 
 *	@var $gaLinkTrack
 *	@param function $gaLinkTrack
 *	@var string params: function
 *	@var default param: NULL
 *
 *	@var $external
 *	@param mixed $external
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	public function slideButton($str = NULL, $href = NULL, $class = NULL, $gaLinkTrack = NULL, $external = NULL) {
		$this->slideButtonStr = ($str != NULL) ? (string) $str : NULL;
		$this->slideButtonLink = ($href != NULL) ? (string) stripHTTP($href) : NULL;
		$this->slideButtonClass = ($class != NULL) ? (string) " class=\"".$class."\" " : (string) " class=\"button\" ";
		if($class == "app-store") {
			$this->slideButtonStr = (string) "<img src=\"".__S_GLOB_ASSETS__."/global/images/appStore2.gif\" alt=\"App Store\">";
		}
		$this->gaLinkTrack = ($gaLinkTrack != NULL) ? (string) "onclick=\"recordOutboundLink(this, 'Outbound Links', '".$gaLinkTrack."');return false;\" " : NULL;
		$this->external = (is_string($external)) ? (string) $external : (int) booleanCheck($external);
		if($this->external === 0 || $this->external == NULL) {
			$this->rel = (string) " ";
		} else if($this->external === 1) {
			$this->rel = (string) " rel=\"external\" ";
		} else {
			$this->rel = (string) " rel=\"".$this->external."\" ";	
		}
		
		if($this->gaLinkTrack != NULL) {
			$this->slideButton[] = (string) sprintf("<a%s%s%shref=\"%s\">%s</a>", $this->rel, $this->slideButtonClass, $this->gaLinkTrack, $this->slideButtonLink, $this->slideButtonStr);
		} else if($str == NULL && $href == NULL) {
			//$this->slideButtonStr = "";
			//$this->slideButtonLink = ""; 
			//$this->slideButtonClass = ""; 
			//$this->slideButton[] = (string) sprintf("%s%s%s", $this->slideButtonClass, $this->slideButtonLink, $this->slideButtonStr);
			$this->slideButton[] = (string) "&nbsp;";
		} else {
			$this->slideButton[] = (string) sprintf("<a%s%shref=\"%s\">%s</a>", $this->rel, $this->slideButtonClass, $this->slideButtonLink, $this->slideButtonStr);
		}
		return $this->slideButton;
	}
/*
 ***************************************************************************
 *	Method for building out the slides on the page
*/
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
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t".$this->slideAlign[$i];
			if($i == 4) {
				$toReplace = "h2>";
				$replaceWith = "h1>";
				$swap .= str_replace($toReplace, $replaceWith, $this->slideHeadline[$i]);
				$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t\t".$swap;
			} else {
				$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideHeadline[$i];
			}
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideBodyCopy[$i];
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t\t".$this->slideButton[$i];
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t\t".$this->slideImage[$i];
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t\t</div>";
			$this->codaBuild .= (string) "\r\n\t\t\t\t\t\t</div>";
		}
		$this->codaBuild .= (string) "\r\n\t\t\t\t\t</div>";
		$this->codaBuild .= (string) "\r\n\t\t\t\t</div>\r\n";
		return $this->codaBuild;
	}

	private function _generateReport() {
		$i = (int) 4;	// offset default slide
		
		foreach ($this->slideAlign as $k => $v) {
			$slideAlign .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->slideHeadline as $k => $v) {
			$slideHeadline .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->slideBodyCopy as $k => $v) {
			$slideBodyCopy.= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}	
		foreach ($this->slideButton as $k => $v) {
			$slideButton .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->slideImage as $k => $v) {
			$slideImage .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		unset($v);
		
		$this->report = "\r\n\t\t\t<h1><em><em>Slide Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>slideAlign:</em></em> <ol>".$slideAlign."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>slideHeadline:</em></em> <ol>".$slideHeadline."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>slideBodyCopy:</em></em> <ol>".$slideBodyCopy."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>slideButton:</em></em> <ol>".$slideButton."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>slideImage:</em></em> <ol>".$slideImage."</ol></li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;			
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