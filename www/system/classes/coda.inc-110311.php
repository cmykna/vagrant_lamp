<?php
/**
 * Microsite Coda Class
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
	public function hasCoda($bool) {
		booleanCheck($bool);
		$this->hasCoda = (int) $bool;
		if ($this->hasCoda != 0) {
			$this->_codaInclude();
			$this->_codaScript();	
		}/* else {
			$this->codaInclude = NULL;
			$this->codaSettingsScript = NULL;
		}*/
	}
	// Method for enabling autoSlide
	// Boolean Value Required
	public function autoSlide($bool) {
		booleanCheck($bool);
		$this->autoSlide = (int) $bool;
	}
	// Method for defining the slide interval
	// Integer Value Required
	public function autoSlideInterval($int) {
		$this->autoSlideInterval = (int) $int;
	}
	// Method for enabling slide stop when clicked
	// Boolean Value Required
	public function autoSlideStopWhenClicked($bool) {
		booleanCheck($bool);
		$this->autoSlideStopWhenClicked = (int) $bool;
	}
	// Method for enabling coda navigation arrows
	// Boolean Value Required
	public function dynamicArrows($bool) {
		booleanCheck($bool);
		$this->dynamicArrows = (int) $bool;
	}
	// Method for enabling dynamic tab navigation
	// Boolean Value Required
	public function dynamicTabs($bool) {
		booleanCheck($bool);
		$this->dynamicTabs = (int) $bool;
	}
	// Method for defining tab alignment
	// String Value Required
	public function dynamicTabsAlign($str) {
		$array 	= array("center", "left", "right");
		if(in_array($str, $array, true)) {
			$this->dynamicTabsAlign = (string) $str;
		} else {
			die("<b>Warning:</b> Invalid argument supplied at <b>Function:</b> ".__FUNCTION__." in <b>File:</b> ".__FILE__." on <b>Line:</b> ".__LINE__.". The argument can contain only
<pre>
+---------------+
| String Values	|
+---------------+
|  center       |
|  left         |
|  right        |
+---------------+
| Default Value |
+---------------+
|  center       |
+---------------+
</pre>");
		}
	}
	// Method for defining tab position
	// String Value Required
	public function dynamicTabsPosition($str) {
		$array 	= array("bottom", "top");
		if(in_array($str, $array, true)) {
			$this->dynamicTabsPosition = (string) $str;
		} else {
			die("<b>Warning:</b> Invalid argument supplied at <b>Function:</b> ".__FUNCTION__." in <b>File:</b> ".__FILE__." on <b>Line:</b> ".__LINE__.". The argument can contain only
<pre>
+---------------+
| String Values	|
+---------------+
|  bottom       |
|  top          |
+---------------+
| Default Value |
+---------------+
|  bottom       |
+---------------+
</pre>");
		}
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _codaInclude() {
		$this->codaInclude = (string) "\r\n\t\t<script src=\"".__S_JS__."/coda-slider-2.0/jquery.coda-slider-2.0.js\" type=\"text/javascript\"></script>";
	}
	
	private function _codaScript() {
		$codaSettingsStr  = (string) "\r\n\t\t<script type=\"text/javascript\">";
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
print
"<pre>
\r\nCoda Values
\r\nVersion: ".$this->version.
"\r\nhasCoda: ".$this->hasCoda.
"\r\nautoSlide: ".$this->autoSlide.
"\r\nautoSlideInterval: ".$this->autoSlideInterval.
"\r\nautoSlideStopWhenClicked: ".$this->autoSlideStopWhenClicked.
"\r\ndynamicArrows: ".$this->dynamicArrows.
"\r\ndynamicTabs: ".$this->dynamicTabs.
"\r\ndynamicTabsAlign: ".$this->dynamicTabsAlign.
"\r\ndynamicTabsPosition: ".$this->dynamicTabsPosition.
"\r\n</pre>";		
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