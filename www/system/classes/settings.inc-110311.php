<?php
/**
 * Microsite Settings Class
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
 *	This class contains all the methods needed to construct a local settings
 *	file for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS SETTINGS
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/settings.php
 ***************************************************************************
*/
class Settings
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Settings Version 3.0.0";
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
	public function errorReport($bool = NULL) {
		$input = booleanCheck($bool);
		$this->reporter = ($input != NULL) ? (int) $input : (int) 0;
		return ($this->reporter == 1) ? $this->_generateReport() : error_reporting(0);
	}
/*
 ***************************************************************************
 *	IS THIS A ROOT LEVEL MICROSITE?
 *	@method: rootLevel($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function rootLevel($bool = NULL) {
		$input = booleanCheck($bool);
		$this->level = ($input != NULL) ? (int) $input : (int) 0;
		return $this->level;
	}
/*
 ***************************************************************************
 *	WHAT IS THE FOLDER LOCATION OF THE MICROSITE?
 *	MAKE SURE THERE ARE LEADING AND TRAILING SLASHES
 *	AND INCLUDE FULL PATH AND SUBPATH IF APPLICABLE
 *	@method: documentFolder($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string param: '/directory/'
 *	@var string param: '/directory/subdirectory/'
 *	@var default param: /build/
 *
 *	NOT REQUIRED
*/
	public function documentFolder($str = NULL) {
		$this->docFolder = ($str != NULL) ? (string) $str : (string) __DIRECTORY__;
		$docCodeStr = (string) "\r\n\t\t<base href=\"%s\" />";
		$docCompiled = sprintf($docCodeStr, __SERVER__.__DIRECTORY__);
		$this->documentBase = (string) $docCompiled;
		return $this->docFolder;
		return $this->documentBase;
	}
/*
 ***************************************************************************
 *	MOBILE DEVICE ICON
 *	@method: hmhIcon($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/system/assets/icons/HMHed-icon-114.png'
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 5
*/
	public function hmhIcon($file = NULL) {
		$this->iconFile = ($file != NULL) ? (string) stripHTTP($file) : __S_ICONS__."/HMHed-icon-114.png";
		$iconCodeStr = "\r\n\t\t<link href=\"%s\" rel=\"apple-touch-icon\" />";
		$iconCompiled = sprintf($iconCodeStr, $this->iconFile);
		$this->hmhIcon = (string) $iconCompiled;
		return $this->hmhIcon;
	}
/*
 ***************************************************************************
 *	FAVORITES ICON
 *	@method: favIcon($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/system/assets/icons/favicon.ico'
 *
 *	NOT REQUIRED
*/
	public function favIcon($file = NULL) {
		$this->iconFile = ($file != NULL) ? (string) stripHTTP($file) : (string) __S_ICONS__."/favicon.ico";	
		$iconCodeStr = "\r\n\t\t<link href=\"%s\" rel=\"shortcut icon\" type=\"image/x-icon\" />";
		$iconCompiled = sprintf($iconCodeStr, $this->iconFile);
		$this->favIcon = (string) $iconCompiled;
		return $this->favIcon;
	}
/*
 ***************************************************************************
 *	PER MICROSITE GOOGLE ANALYTICS STRING
 *	IF YOU DO NOT HAVE A GOOGLE ANALYTICS
 *	CONTACT THE EMARKETING SEO PERSONNEL @ joe.bennet@hmhpub.com
 *	@method: gaTracker($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'UA-1008971-6'
 *
 *	NOT REQUIRED
*/	
	public function gaTracker($str = NULL) {
		$this->gaTracker = ($str != NULL) ? (string) $str : (string) "UA-1008971-6";
		$gaCodeStr  = (string) "\r\n\t\t<script type=\"text/javascript\">";
		$gaCodeStr .= (string) "\r\n\t\t/* <![CDATA[ */";
		$gaCodeStr .= (string) "\r\n\t\t\tvar _gaq = _gaq || [];";
		$gaCodeStr .= (string) "\r\n\t\t\t_gaq.push(['_setAccount', '%s']);";
		$gaCodeStr .= (string) "\r\n\t\t\t_gaq.push(['_setDomainName', '.hmheducation.com']);";
		$gaCodeStr .= (string) "\r\n\t\t\t_gaq.push(['_trackPageview']);";
		$gaCodeStr .= (string) "\r\n\t\t\t(function() {";
		$gaCodeStr .= (string) "\r\n\t\t\t\tvar ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
		$gaCodeStr .= (string) "\r\n\t\t\t\tga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
		$gaCodeStr .= (string) "\r\n\t\t\t\tvar s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
		$gaCodeStr .= (string) "\r\n\t\t\t})();";
		$gaCodeStr .= (string) "\r\n\t\t/* ]]> */";
		$gaCodeStr .= (string) "\r\n\t\t</script>";
		$gaCompiled = sprintf($gaCodeStr, $this->gaTracker);
		$this->gaCompiled = (string) $gaCompiled;
		return $this->gaCompiled;
	}
/*
 ***************************************************************************
 *	BASE CSS FILE
 *	@method: baseCSS($file)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/css.ext'
 *	@var default param: "/system/assets/css/base.css.php"
 *
 *	NOT REQUIRED
*/
	public function baseCSS($file = NULL) {
		$this->baseCSS = ($file != NULL) ? (string) stripHTTP($file) : (string) __S_CSS__."/base.css.php";
		return $this->baseCSS;
	}
/*
 ***************************************************************************
 *	HAS LOCAL CSS?
 *	@method: displayLocalCSS($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 1
 *
 *	NOT REQUIRED
*/	
	public function displayLocalCSS($bool = NULL) {
		$input = booleanCheck($bool);
		$this->displayLocalCSS = ($input != NULL) ? (int) $input : (int) 1;
		if($this->displayLocalCSS != 0) {
			$cssCodeStr = (string) "\r\n\t\t<link href=\"%s?df=%s\" rel=\"stylesheet\" type=\"text/css\" />";
			$cssCompiled = sprintf($cssCodeStr, $this->baseCSS, __DIRECTORY__);
		} else {
			$cssCodeStr = (string) "\r\n\t\t<link href=\"%s\" rel=\"stylesheet\" type=\"text/css\" />";
			$cssCompiled = sprintf($cssCodeStr, $this->baseCSS);
		}
		$this->masterCSS = (string) $cssCompiled;
		return $this->masterCSS;
	}
/*
 ***************************************************************************	
 *	IS THIS A NATIONAL OR STATE MICROSITE?
 *	@method: nationalState($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'alabama', 'alaska', 'arizona', 'arkansas', 'california' 
 *	@var string params: 'colorado', 'connecticut', 'delaware', 'district of columbia'
 *	@var string params: 'florida', 'georgia', 'hawaii', 'idaho', 'illinois', 'indiana'
 *	@var string params: 'iowa', 'kansas', 'kentucky', 'louisiana', 'maine', 'maryland'
 *	@var string params: 'massachusetts', 'michigan', 'minnesota', 'mississippi'
 *	@var string params: 'missouri', 'montana', 'nebraska', 'nevada', 'new hampshire'
 *	@var string params: 'new jersey', 'new mexico', 'new york', 'north carolina'
 *	@var string params: 'north dakota', 'ohio', 'oklahoma', 'oregon', 'pennsylvania'
 *	@var string params: 'rhode island', 'south carolina', 'south dakota', 'tennessee'
 *	@var string params: 'texas', 'utah', 'vermont', 'virginia', 'washington'
 *	@var string params: 'west virginia', 'wisconsin', 'wyoming', 'national'
 *	@var string params: 'international'
 *	@var string params: 'ak', 'al', 'ar', 'az', 'ca', 'co', 'ct', 'dc', 'de', 'fl'
 *	@var string params: 'ga', 'hi', 'ia', 'id', 'il', 'in', 'ks', 'ky', 'la', 'ma'
 *	@var string params: 'md', 'me', 'mi', 'mn', 'mo', 'ms', 'mt', 'nc', 'nd', 'ne'
 *	@var string params: 'nh', 'nj', 'nm', 'nv', 'ny', 'oh', 'ok', 'or', 'pa', 'ri'
 *	@var string params: 'sc', 'sd', 'tn', 'tx', 'ut', 'va', 'vt', 'wa', 'wi', 'wv'
 *	@var string params: 'wy', 'na', 'int'
 *	@var default param: 'national'
 *
 *	NOT REQUIRED
*/
	public function nationalState($str = NULL) {
		$this->nationalState = ($str != NULL) ? (string) checkState(strtolower($str)) : (string) "na";
		return $this->nationalState;
	}
/*
 ***************************************************************************		
 *	PROGRAM / STATE TAG?
 *	@method: programState($str, $file)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Beta Microsite'
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/file.ext'
 *	@var default param: NULL
 *
 *	REQUIRED
*/
	public function programState($str = NULL, $file = NULL) {
		$this->programStateTag = ($str != NULL) ? (string) $str : (string) "Microsite Name Undefined";
		$this->programStateFileName = ($file != NULL) ? (string) stripHTTP($file) : NULL;
		if(__FILE_NAME__ == "index.php" || __FILE_NAME__ == "index.html") {
			if ($this->programStateFileName == NULL) {
				$programCodeStr = (string) "<div id=\"program-state\">%s</div>";
				$programCompiled = sprintf($programCodeStr, $this->programStateTag);
			} else {
				$programCodeStr = (string) "<div id=\"program-logo\"><img src=\"%s\" alt=\"%s\" /></div>";
				$programCompiled = sprintf($programCodeStr, $this->programStateFileName, $this->programStateTag, $this->programStateTag);
			}	
		} else {
			if ($this->programStateFileName == NULL) {
				$programCodeStr = (string) "<div id=\"program-state\"><a href=\"index.php\" title=\"%s\">%s</a></div>";
				$programCompiled = sprintf($programCodeStr, $this->programStateTag, $this->programStateTag);
			} else {
				$programCodeStr = (string) "<div id=\"program-logo\"><a href=\"index.php\" title=\"%s\"><img src=\"%s\" alt=\"%s\" /></a></div>";
				$programCompiled = sprintf($programCodeStr, $this->programStateTag, $this->programStateFileName, $this->programStateTag);
			}
		}
		$this->programState = (string) $programCompiled;
		return $this->programState;
	}
/*
 ***************************************************************************
 *	ELOQUA FORM REQUEST NAME
 *	@method: request($str)
 *
 *	@var $str
 *	@param string $str
 *	@var string params: 'hmd_request', 'gs_request', 'rigby_request'
 *	@var string params: 'saxon_request', 'sv_request', 'hmhschool_request'
 *	@var default param: 'Contact_us'
 *
 *	NOT REQUIRED
*/
	public function request($str = NULL) {
		$array 	= array("Contact_us", "Vs_registration", "hmd_request", "gs_request", "rigby_request", "saxon_request", "sv_request", "hmhschool_request");
		$this->request = (in_array($str, $array, true)) ? (string) $str : (string) "Contact_us";
		return $this->request;
	}
/*
 ***************************************************************************
 *	ELOQUA CAMPAIGN CODE
 *	@method: campaignCode($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'mstest'
 *
 *	REQUIRED - STRING
*/
	public function campaignCode($str = NULL) {
		$this->campaignCode = ($str != NULL) ? (string) $str : NULL;
		return $this->campaignCode;
	}
/*
 ***************************************************************************
 *	GLOBAL TRADEMARK FOR MICROSITE
 *	This will not override the per page trademark if the 
 *	$page->trademark is defined
 *	@method: trademark($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	NOT REQUIRED - STRING
*/
	public function trademark($str = NULL) {
		$this->trademark = (string) strip_tags($str, "<a><sup><sub>");
		return $this->trademark;
	}
/*
 ***************************************************************************
 *	DEVELOPER FOR MICROSITE
 *	@method: developer($str)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: NULL
 *
 *	REQUIRED - STRING
*/
	public function developer($str = NULL) {
		$this->developer = ($str != NULL) ? (string) $str : NULL;
		return $this->developer;
	}
/*
 ***************************************************************************
 *	Set Contact Page
 *	@method: setContact($href)
 *
 *	@var $href
 *	@param string $href
 *	@var default param: NULL
 *
 *	REQUIRED - STRING
*/
	public function setContact($href = NULL) {
		$this->setContact = ($href != NULL) ? (string) stripHTTP($href) : (string) "contact-us.php";
		return $this->setContact;
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _generateReport() {
		$this->report = "\r\n\t\t\t<h1><em><em>Settings Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>rootLevel:</em></em> ".htmlspecialchars(ltrim($this->level))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>documentFolder:</em></em> ".htmlspecialchars(ltrim($this->docFolder))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>documentBase:</em></em> ".htmlspecialchars(ltrim($this->documentBase))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>hmhIcon:</em></em> ".htmlspecialchars(ltrim($this->hmhIcon))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>favIcon:</em></em> ".htmlspecialchars(ltrim($this->favIcon))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>gaTracker:</em></em> ".htmlspecialchars(ltrim($this->gaTracker))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>baseCSS:</em></em> ".htmlspecialchars(ltrim($this->masterCSS))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>displayLocalCSS:</em></em> ".htmlspecialchars(ltrim($this->displayLocalCSS))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>nationalState:</em></em> ".htmlspecialchars(ltrim($this->nationalState))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>programState:</em></em> ".htmlspecialchars(ltrim($this->programState))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>request:</em></em> ".htmlspecialchars(ltrim($this->request))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>campaignCode:</em></em> ".htmlspecialchars(ltrim($this->campaignCode))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>trademark:</em></em> ".htmlspecialchars(ltrim($this->trademark))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>developer:</em></em> ".htmlspecialchars(ltrim($this->developer))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>setContact:</em></em> ".htmlspecialchars(ltrim($this->setContact))."</li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;	
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/	
}
/* End of file settings.inc.php */
/* Location: system/classes/settings.inc.php */
?>