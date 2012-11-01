<?php
/**
 * Microsite Coda Class
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
 *	This class contains all the methods needed to construct a local Coda Slider
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS CODA
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/coda.php
 ***************************************************************************
*/
class Coda
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Coda Settings Version 3.0.0";
	// Return the version of the class
	private function _getVersion() {
		return (string) $this->version;
	}
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
*/
	public function hasCoda($bool = NULL) {
		$input = booleanCheck($bool);
		$this->hasCoda = ($input != NULL) ? (int) $input : (int) 0;
		return ($input != NULL) ? $this->_codaInclude().$this->_codaScript() : NULL;
		return $this->hasCoda;
	}
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
*/		
	public function autoSlide($bool = NULL) {
		$input = booleanCheck($bool);
		$this->autoSlide = ($input != NULL) ? (int) $input : (int) 1;
		return $this->autoSlide;
	}
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
*/	
	public function autoSlideInterval($int = NULL) {
		$this->autoSlideInterval = ($int != NULL) ? (int) $int : (int) 7000;
		return $this->autoSlideInterval;
	}
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
*/
	public function autoSlideStopWhenClicked($bool = NULL) {
		$input = booleanCheck($bool);
		$this->autoSlideStopWhenClicked = ($input != NULL) ? (int) $input : (int) 1;
		return $this->autoSlideStopWhenClicked;
	}
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
*/
	public function dynamicArrows($bool = NULL) {
		$input = booleanCheck($bool);
		$this->dynamicArrows = ($input != NULL) ? (int) $input : (int) 1;
		return $this->dynamicArrows;
	}
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
*/
	public function dynamicTabs($bool = NULL) {
		$input = booleanCheck($bool);
		$this->dynamicTabs = ($input != NULL) ? (int) $input : (int) 1;
		return $this->dynamicTabs;
	}
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
*/
	public function dynamicTabsAlign($str = NULL) {
		$array 	= array("center", "left", "right");
		$this->dynamicTabsAlign = (in_array($str, $array, true)) ? (string) $str : (string) "center";
		return $this->dynamicTabsAlign;
	}
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
*/
	public function dynamicTabsPosition($str = NULL) {
		$array 	= array("bottom", "top");
		$this->dynamicTabsPosition = (in_array($str, $array, true)) ? (string) $str : (string) "bottom";
		return $this->dynamicTabsAlign;
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _codaInclude() {
		$this->codaInclude = (string) "\r\n\t\t<script src=\"".__S_JS__."/coda-slider-2.0/jquery.coda-slider-2.0.js\"></script>";
	}
	
	private function _codaScript() {
		$codaSettingsStr  = (string) "\r\n\t\t<script>";
		$codaSettingsStr .= (string) "\r\n\t\t/* <![CDATA[ */";
		$codaSettingsStr .= (string) "\r\n\t\t\t$(document).ready(function() {";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t$('#coda-slider').codaSlider({";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tautoSlide: %d,";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tautoSlideInterval: %d,";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tautoSlideStopWhenClicked: %d,";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tdynamicArrows: %d,";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tdynamicTabs: %d,";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tdynamicTabsAlign: '%s',";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t\tdynamicTabsPosition: '%s'";
		$codaSettingsStr .= (string) "\r\n\t\t\t\t});";
		$codaSettingsStr .= (string) "\r\n\t\t\t});";
		$codaSettingsStr .= (string) "\r\n\t\t/* ]]> */";
		$codaSettingsStr .= (string) "\r\n\t\t</script>";
		$codaSettingsCompiled = sprintf($codaSettingsStr, $this->autoSlide, $this->autoSlideInterval, $this->autoSlideStopWhenClicked, $this->dynamicArrows, $this->dynamicTabs, $this->dynamicTabsAlign, $this->dynamicTabsPosition);
		$this->codaSettingsScript = (string) $codaSettingsCompiled;
	}

	private function _generateReport() {
		$this->report = "\r\n\t\t\t<h1><em><em>Coda Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasCoda:</em></em> ".htmlspecialchars(ltrim($this->hasCoda))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>autoSlide:</em></em> ".htmlspecialchars(ltrim($this->autoSlide))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>autoSlideInterval:</em></em> ".htmlspecialchars(ltrim($this->autoSlideInterval))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>autoSlideStopWhenClicked:</em></em> ".htmlspecialchars(ltrim($this->autoSlideStopWhenClicked))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>dynamicArrows:</em></em> ".htmlspecialchars(ltrim($this->dynamicArrows))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>dynamicTabs:</em></em> ".htmlspecialchars(ltrim($this->dynamicTabs))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>dynamicTabsAlign:</em></em> ".htmlspecialchars(ltrim($this->dynamicTabsAlign))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>dynamicTabsPosition:</em></em> ".htmlspecialchars(ltrim($this->dynamicTabsPosition))."</li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;		
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file coda.inc.php */
/* Location: system/classes/coda.inc.php */
?>