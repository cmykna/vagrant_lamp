<?php
/**
 * Microsite Page Class
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
 *	This class contains all the methods needed to construct local page settings
 *	file for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS PAGE
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/page.php
 ***************************************************************************
*/
class Page
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Page Settings Version 3.0.0";
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
 *	PAGE TITLE <title></title>
 *	@method: pageTitle($str)
 *
 *	@var $str
 *	@param string $str
 *	@var limitations: 64 Characters (Including Spaces) for Page Title
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	public function pageTitle($str) {
		$this->pageTitle = (string) $str;
		if ($this->pageTitle != NULL) {
			$this->pageTitle = (string) $str;
		} else {
			$this->pageTitle = NULL;
		}
	}
/*
 ***************************************************************************
 *	DO YOU WANT TO USE META TAGS TO IMPROVE SEO RANKINGS?
 *	@method: hasMeta($bool, $description, $keywords)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	@var $description
 *	@param string $description
 *	@var limitation: 150 Characters (Including Spaces) for Meta Description
 *	@var default param: 'description of the microsite'
 *
 *	@var $keywords
 *	@param string $keywords
 *	@var limitation: 5-10 Words max (175 characters max)
 *	@var default param: 'keywords, used, in, microsite'
 *
 *	NOT REQUIRED
*/
	public function hasMeta($bool, $description, $keywords) {
		booleanCheck($bool);
		$this->meta = (int) $bool;
		$this->description = (string) $description;
		$this->keywords = (string) $keywords;
		$this->robots = (string) "all";
		if ($this->meta != 0) {
				$descriptionStr = (string) "\r\n\t\t<meta name=\"description\" content=\"%s\" />";
				$descriptionCompiled = sprintf($descriptionStr, $this->description);
				$keywordStr = (string) "\r\n\t\t<meta name=\"keywords\" content=\"%s\" />";
				$keywordCompiled = sprintf($keywordStr, $this->keywords);
				$robotsStr = (string) "\r\n\t\t<meta name=\"robots\" content=\"%s\" />";
				$robotsCompiled = sprintf($robotsStr, $this->robots);
				$this->hasMeta = (string) $descriptionCompiled.$keywordCompiled.$robotsCompiled;
		} else {
			$this->description = NULL;
			$this->keywords = NULL;
			$this->robots = NULL;
			$this->hasMeta = NULL;
		}
	}
/*
 ***************************************************************************
 *	IS THIS AN INDEX PAGE?
 *	@method: isIndexPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isIndexPage($bool) {
		$this->isIndexPage = (int) booleanCheck($bool);
		return $this->isIndexPage;
	}
/*
 ***************************************************************************
 *	IS THIS A SITE MAP PAGE?
 *	DEPRECATED METHOD
 *	@method: isSiteMapPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isSiteMapPage($bool) {
		$this->isSiteMapPage = (int) booleanCheck($bool);
		return $this->isSiteMapPage;
	}
/*
 ***************************************************************************
 *	IS THIS A FULL WIDTH LAYOUT PAGE?
 *	@method: isFullWidthLayout($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isFullWidthLayout($bool) {
		$this->isFullWidthLayout = (int) booleanCheck($bool);
		return $this->isFullWidthLayout;
	}
/*
 ***************************************************************************
 *	IS THIS A PRODUCT LANDING PAGE?
 *	@method: isProductLandingPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isProductLandingPage($bool) {
		$this->isProductLandingPage = (int) booleanCheck($bool);
		return $this->isProductLandingPage;
	}
/*
 ***************************************************************************
 *	IS THIS A CONTACT US PAGE?
 *	@method: isContact($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isContact($bool) {
		$this->isContact = (int) booleanCheck($bool);
		return $this->isContact;
	}
/*
 ***************************************************************************
 *	IS THIS A VS REGISTRATION PAGE?
 *	@method: isVSReg($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isVSReg($bool) {
		$this->isVSReg = (int) booleanCheck($bool);
		return $this->isVSReg;
	}
/*
 ***************************************************************************
 *	DOES THIS PAGE REFRESH?
 *	@method: hasRefresh($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function hasRefresh($bool) {
		$this->hasRefresh = (int) booleanCheck($bool);
		return $this->hasRefresh;
	}
/*
 ***************************************************************************
 *	DOES THIS PAGE HAVE TABS?
 *	@method: hasTabs($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function hasTabs($bool) {
		$this->hasTabs = (int) booleanCheck($bool);
		return $this->hasTabs;
	}
/*
 ***************************************************************************
 *	PAGE TRADEMARK FOR MICROSITE
 *	This will override the global trademark $settings->trademark
 *	@method: trademark($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	REQUIRED - STRING
*/
	public function trademark($str) {
		$this->trademark = (string) $str;
		return $this->trademark;
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _generateReport() {
		$this->report = "\r\n\t\t\t<h1><em><em>Page Settings Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>pageTitle:</em></em> ".htmlspecialchars(ltrim($this->pageTitle))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasMeta:</em></em> ".htmlspecialchars(ltrim($this->meta))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>metaDescription:</em></em> ".htmlspecialchars(ltrim($this->description))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>metaKeywords:</em></em> ".htmlspecialchars(ltrim($this->keywords))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>metaRobots:</em></em> ".htmlspecialchars(ltrim($this->robots))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isIndexPage:</em></em> ".htmlspecialchars(ltrim($this->isIndexPage))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isFullWidthLayout:</em></em> ".htmlspecialchars(ltrim($this->isFullWidthLayout))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isProductLandingPage:</em></em> ".htmlspecialchars(ltrim($this->isProductLandingPage))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isContact:</em></em> ".htmlspecialchars(ltrim($this->isContact))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isVSReg:</em></em> ".htmlspecialchars(ltrim($this->isVSReg))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasRefresh:</em></em> ".htmlspecialchars(ltrim($this->hasRefresh))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasTabs:</em></em> ".htmlspecialchars(ltrim($this->hasTabs))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>trademark:</em></em> ".htmlspecialchars(ltrim($this->trademark))."</li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file page.inc.php */
/* Location: system/classes/page.inc.php */
?>