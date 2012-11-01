<?php
/**
 * Microsite Page Class
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
 *	This class contains all the methods needed to construct local page settings
 *	file for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
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
	public function pageTitle($str = NULL) {
		$this->pageTitle = ($str != NULL) ? (string) $str : NULL;
		return $this->pageTitle;
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
	public function hasMeta($bool = NULL, $description = NULL, $keywords = NULL) {
		$input = booleanCheck($bool);
		$this->meta = ($input != NULL) ? (int) $input : (int) 0;
		$this->description = ($description != NULL) ? (string) sprintf("\r\n\t\t<meta name=\"description\" content=\"%s\">", $description) : NULL;
		$this->keywords = ($keywords != NULL) ? (string) sprintf("\r\n\t\t<meta name=\"keywords\" content=\"%s\">", $keywords) : NULL;
		$this->robots = (string) sprintf("\r\n\t\t<meta name=\"robots\" content=\"%s\">", "all");
		return ($this->meta != 0) ? $this->hasMeta = (string) $this->description.$this->keywords.$this->robots : NULL;
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
	public function isIndexPage($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isIndexPage = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isIndexPage;
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
 *
 *	NOT REQUIRED
*/
	public function isFullWidthLayout($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isFullWidthLayout = ($input != NULL) ? (int) $input : (int) 0;
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
	public function isProductLandingPage($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isProductLandingPage = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isProductLandingPage;
	}
/*
 ***************************************************************************
 *	IS THIS A LOCATION PAGE?
 *	@method: isLocationPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isLocationPage($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isLocationPage = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isLocationPage;
	}
/*
 ***************************************************************************
 *	IS THIS A CAMPAIGN PAGE?
 *	@method: isCampaignPage($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isCampaignPage($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isCampaignPage = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isCampaignPage;
	}
/*
 ***************************************************************************
 *	Hide Header?
 *	@method: isHeaderHidden($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *
 *	NOT REQUIRED
*/
	public function isHeaderHidden($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isHeaderHidden = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isHeaderHidden;
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
	public function isContact($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isContact = ($input != NULL) ? (int) $input : (int) 0;
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
	public function isVSReg($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isVSReg = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isVSReg;
	}
/*
 ***************************************************************************
 *	IS THIS A CAMPAIGN EMAIL PAGE?
 *	@method: isCampaignEmail($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function isCampaignEmail($bool = NULL) {
		$input = booleanCheck($bool);
		$this->isCampaignEmail = ($input != NULL) ? (int) $input : (int) 0;
		return $this->isCampaignEmail;
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
	public function hasRefresh($bool = NULL) {
		$input = booleanCheck($bool);
		$this->hasRefresh = ($input != NULL) ? (int) $input : (int) 0;
		return $this->hasRefresh;
	}
/*
 ***************************************************************************
 *	BODY NAMESPACE
 *	@method: body($id)
 *
 *	@var $id
 *	@param string $id
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	public function body($id = NULL) {
		$this->body = ($id != NULL) ? (string) " id=\"".$id."\" " : NULL;
		return $this->body;
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
	public function hasTabs($bool = NULL) {
		$input = booleanCheck($bool);
		$this->hasTabs = ($input != NULL) ? (int) $input : (int) 0;
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
	public function trademark($str = NULL) {
		$this->trademark = (string) strip_tags($str, "<a><sup><sub><br>");
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
		$this->report .= "\r\n\t\t\t\t<li><em><em>isLocationPage:</em></em> ".htmlspecialchars(ltrim($this->isLocationPage))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isCampaignPage:</em></em> ".htmlspecialchars(ltrim($this->isCampaignPage))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isHeaderHidden:</em></em> ".htmlspecialchars(ltrim($this->isHeaderHidden))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isContact:</em></em> ".htmlspecialchars(ltrim($this->isContact))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isVSReg:</em></em> ".htmlspecialchars(ltrim($this->isVSReg))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>isCampaignEmail:</em></em> ".htmlspecialchars(ltrim($this->isCampaignEmail))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasRefresh:</em></em> ".htmlspecialchars(ltrim($this->hasRefresh))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>body:</em></em> ".htmlspecialchars(ltrim($this->body))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hasTabs:</em></em> ".htmlspecialchars(ltrim($this->hasTabs))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>trademark:</em></em> ".htmlspecialchars(ltrim($this->trademark))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>trademark:</em></em> ".htmlspecialchars(ltrim($this->enCrypto))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>trademark:</em></em> ".htmlspecialchars(ltrim($this->deCrypto))."</li>";
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