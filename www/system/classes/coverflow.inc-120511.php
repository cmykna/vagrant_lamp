<?php
/**
 * Microsite Coverflow Class
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
 *	This class contains all the methods needed to construct a local Coverflow
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS COVERFLOW
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/coverflow.php
 ***************************************************************************
*/
class Coverflow
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Coverflow Version 3.0.0";
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
	// Setup the arrays needed by this class
	// Coverflow Item Array
	private $coverFlowItem = array();
	// Coverflow Caption Array
	private $coverFlowCaption = array();
	// Method for defining if the page has a coverflow 
	// Boolean Value Required
	public function hasCoverflow($bool) {
		booleanCheck($bool);
		$this->hasCoverflow = (int) $bool;
		if ($this->hasCoverflow != 0) {
			$this->_CoverflowInclude();	
		} else {
			$this->CoverflowInclude = NULL;
		}
	}
	// Method for defining a coverflow item
	// String Values Required
	public function coverFlowItem($file, $caption) {
		$this->cfFile = (string) stripHTTP($file);
		$this->cfCaption = (string) $caption;
		
		$cfFileStr = (string) "<img class=\"content\" src=\"%s\" />";
		$cfFileCompiled = sprintf($cfFileStr, $this->cfFile);
		$cfCaptionStr = (string) "<div class=\"caption\">%s</div>";
		$cfCaptionCompiled = sprintf($cfCaptionStr, $this->cfCaption);
		
		$this->coverFlowItem[] = (string) $cfFileCompiled;
		$this->coverFlowCaption[] = (string) $cfCaptionCompiled;
	}
	// Method for building out the coverflow on the page
	public function coverFlowBuild() {
		return $this->_build();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _CoverflowInclude() {
		$this->CoverflowInclude = (string) "\r\n\t\t<script src=\"".__S_JS__."/ContentFlow-1.0.2/contentflow.js\" type=\"text/javascript\"></script>";
		$this->CoverflowInclude .= (string) "\r\n\t\t<link href=\"".__S_JS__."/ContentFlow-1.0.2/contentflow.css\" rel=\"stylesheet\" type=\"text/css\" />"; 
		$this->CoverflowInclude .= (string) "\r\n\t\t<script src=\"".__S_JS__."/ContentFlow-1.0.2/custom.flow.js\" type=\"text/javascript\"></script>";
	}
	
	private function _build() {
		$i = (int) 6;	// offset default slide
		$cfItemCount = (int) count($this->coverFlowItem);
		$cfCaptionCount = (int) count($this->coverFlowCaption);
		$this->cfBuild = (string) "\r\n\t\t\t\t\t<div id=\"contentFlow\" class=\"ContentFlow\">";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t<div class=\"loadIndicator\">";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"indicator\"></div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t</div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t<div class=\"flow\">";
		for ($i; $i < $cfItemCount; $i++) {
			$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"item\">";
			$this->cfBuild .= "\r\n\t\t\t\t\t\t\t\t".$this->coverFlowItem[$i];
			$this->cfBuild .= "\r\n\t\t\t\t\t\t\t\t".$this->coverFlowCaption[$i];
			$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t</div>";
		}
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t</div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t<div class=\"globalCaption\"></div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t<div class=\"scrollbar\">";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"preButton\"></div> ";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"nextButton\"></div>";
        $this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t<div class=\"slider\">";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t\t<div class=\"position\"></div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t\t</div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t\t</div>";
		$this->cfBuild .= (string) "\r\n\t\t\t\t\t</div>";
		return $this->cfBuild;
	}
	
	private function _generateReport() {
print
"<pre>
\r\nCoverflow Values
\r\nVersion: ".$this->version.
"\r\n</pre>";		
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file coverflow.inc.php */
/* Location: system/classes/coverflow.inc.php */
?>