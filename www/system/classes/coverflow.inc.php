<?php
/**
 * Microsite Coverflow Class
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
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}
	// Setup the arrays needed by this class
	private $coverFlowItem = array();
	private $coverFlowCaption = array();
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
 *	DOES THIS PAGE HAVE A COVERFLOW SLIDER?
 *	
 *	@method: hasCoverflow($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function hasCoverflow($bool = NULL) {
		$input = booleanCheck($bool);
		$this->hasCoverflow = ($input != 0) ? $this->_CoverflowInclude() : NULL;
		return $this->hasCoverflow;
	}
/*
 ***************************************************************************
 *	ADD IN THE ITEMS HERE
 *
 *	@method: coverFlowItem($file, $caption)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/assets/images/build/generic-image-cf.gif'
 *
 *	@var $caption
 *	@param string $caption
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	public function coverFlowItem($file = NULL, $caption = NULL) {
		$this->cfFile = ($file != NULL) ? (string) stripHTTP($file) : (string) "#";
		$this->cfCaption = ($caption != NULL) ? (string) $caption : (string) "&nbsp;";
		$this->coverFlowItem[] = (string) sprintf("<img class=\"content\" src=\"%s\" alt=\"%s\">", $this->cfFile, $this->cfCaption);
		$this->coverFlowCaption[] = (string) sprintf("<div class=\"caption\">%s</div>", $this->cfCaption);
		return $this->coverFlowItem;
		return $this->coverFlowCaption;
	}
/*
 ***************************************************************************
 *	Method for building out the coverflow on the page
*/
	public function coverFlowBuild() {
		return $this->_build();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _CoverflowInclude() {
		$this->CoverflowInclude = (string) "\r\n\t\t<script src=\"".__S_JS__."/ContentFlow-1.0.2/contentflow.js\"></script>";
		$this->CoverflowInclude .= (string) "\r\n\t\t<link href=\"".__S_JS__."/ContentFlow-1.0.2/contentflow.css\" rel=\"stylesheet\">"; 
		$this->CoverflowInclude .= (string) "\r\n\t\t<script src=\"".__S_JS__."/ContentFlow-1.0.2/custom.flow.js\"></script>";
		return $this->CoverflowInclude;
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
		$i = (int) 6;	// offset default slide
		
		foreach ($this->coverFlowItem as $k => $v) {
			$coverFlowItem .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->coverFlowCaption as $k => $v) {
			$coverFlowCaption .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		unset($v);
		
		$this->report = "\r\n\t\t\t<h1><em><em>CoverFlow Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>coverFlowItem:</em></em> <ol>".$coverFlowItem."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>coverFlowCaption:</em></em> <ol>".$coverFlowCaption."</ol></li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;		
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