<?php
/**
 * Microsite Buckets Class
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
 *	This class contains all the methods needed to construct the index ad buckets
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS BUCKETS
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/buckets.php
 ***************************************************************************
*/
class Buckets
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Bucket Version 3.0.0";
	// Return the version of the class
	private function _getVersion() {
		return (string) $this->version;
	}
	// Setup the arrays needed by this class
	private $headline = array();
	private $bucketCopy = array();
	private $bucketLink = array();
	private $image = array();
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
 *	HOW MANY BUCKETS DO YOU WNT ON YOUR INDEX PAGE?
 *	@method: bucketCount($str)
 *
 *	@var $str
 *	@param mixed $str
 *	@var string params: 'three', 'four 
 *	@var integer params: 3, 4
 *	@var default param: 3
 *
 *	NOT REQUIRED
*/
	public function bucketCount($str = NULL) {
		$this->bucketCount = ($str === 3 || $str === "three") ? (string) "three" :
			(($str === 4 || $str === "four") ? (string) "four" : (string) "three");
		$this->bucket = (string) sprintf("\r\n\t\t\t\t<aside class=\"%s-space-bucket\">", $this->bucketCount);
		return $this->bucket;
	}
/*
 ***************************************************************************
 *	@method: headLine($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Headline Here'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	public function headline($str = NULL, $class = NULL) {
		$this->headlineStr = ($str != NULL) ? (string) $str : (string) "Headline Here";
		$this->headlineClass = ($class != NULL) ? (string) " class=\"".$class."\"" : NULL;
		$this->headline[] = (string) sprintf("<h3%s>%s</h3>", $this->headlineClass, $this->headlineStr);
		return $this->headline;
	}
/*
 ***************************************************************************
 *	@method: bucketCopy($str, $class)
 *
 *	@var $str
 *	@param string $str
 *	@var default param: 'Do not change font, color or position of any text in bucket ads.'
 *
 *	@var $class
 *	@param string $class
 *	@var default param: NULL
 *
 *	NOT REQUIRED
*/
	public function bucketCopy($str = NULL, $class = NULL) {
		$this->bucketCopyStr = ($str != NULL) ? (string) $str : (string) "Do not change font, color or position of any text in bucket ads.";
		$this->bucketCopyClass = ($class != NULL) ? (string) " class=\"".$class."\"" : NULL;
		$this->bucketCopy[] = (string) sprintf("<p%s>%s</p>", $this->bucketCopyClass, $this->bucketCopyStr);		
		return $this->bucketCopy;
	}
/*
 ***************************************************************************
 *	@method: bucketLink($str, $href, $class)
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
 *	@var default param: 'call-out-link'
 *
 *	NOT REQUIRED
*/
	public function bucketLink($str = NULL, $href = NULL, $class = NULL) {
		//booleanCheck($multiLink);
		$this->bucketLinkStr = ($str != NULL) ? (string) $str : (string) "Learn More";
		$this->bucketLinkHref = ($href != NULL) ? (string) stripHTTP($href) : (string) "#";
		$this->bucketLinkClass = ($class != NULL) ? (string) " class=\"".$class."\" " : (string) " class=\"call-out-link\" ";
		$this->bucketLink[] = (string) sprintf("<a%shref=\"%s\">%s</a>", $this->bucketLinkClass, $this->bucketLinkHref, $this->bucketLinkStr);
		return $this->bucketLink;
	}
/*
 ***************************************************************************
 *	@method: image($file, $alt, $class)
 *
 *	@var $file
 *	@param string $file
 *	@var file param: '/directory/to/image.ext'
 *	@var default param: '/assets/images/build/bucket-image.png'
 *
 *	@var $alt
 *	@param string $alt
 *	@var limitation: 5-10 Words max (175 characters max) 65 Characters (Including Spaces)
 *	@var default param: NULL
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'call-out'
 *
 *	NOT REQUIRED
*/
	public function image($file = NULL, $alt = NULL, $class = NULL) {
		$this->imageFile = ($file != NULL) ? (string) stripHTTP($file) : (string) __SERVER__."/assets/images/build/bucket-image.png";
		$this->imageAlt = ($alt != NULL) ? (string) $alt : NULL;
		$this->imageClass = ($class != NULL) ? (string) " class=\"".$class."\" " : (string) " class=\"call-out\" ";
		$this->image[] = (string) sprintf("<img%ssrc=\"%s\" alt=\"%s\">", $this->imageClass, $this->imageFile, $this->imageAlt);
		return $this->image;
	}
/*
 ***************************************************************************
 *	Method for building out the buckets on the page
*/
	public function bucketBuild() {
		return $this->_build();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _build() {
		$i = (int) 3;	// offset default buckets
		
		//$bucketCount = (int) $this->bucketCount;
		$headlineCount = (int) count($this->headline);
		$bucketCopyCount = (int) count($this->bucketCopy);
		$bucketLinkCount = (int) count($this->bucketLink);
	
		$this->bucketBuild = $this->bucket;
		$this->bucketBuild .= (string) "\r\n\t\t\t\t\t<ul>";
		for ($i; $i < $headlineCount; $i++) {
			$this->bucketBuild .= (string) "\r\n\t\t\t\t\t\t<li>";
			$this->bucketBuild .= $this->headline[$i];
			$this->bucketBuild .= $this->bucketCopy[$i];
			$this->bucketBuild .= $this->bucketLink[$i];
			$this->bucketBuild .= $this->image[$i];
			$this->bucketBuild .= (string) "</li>";
		}
		$this->bucketBuild .= (string) "\r\n\t\t\t\t\t</ul>";
		$this->bucketBuild .= (string) "\r\n\t\t\t\t</aside>";
		return $this->bucketBuild;
	}
	
	private function _generateReport() {
		$i = (int) 3;	// offset default buckets
			
		foreach ($this->headline as $k => $v) {
			$headline .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->bucketCopy as $k => $v) {
			$bucketCopy .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->bucketLink as $k => $v) {
			$bucketLink .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		foreach ($this->image as $k => $v) {
			$bucketImg .= ($k >= $i) ? "<li>".htmlspecialchars(ltrim($v))."</li>" : NULL;
		}
		unset($v);
		
		$this->report = "\r\n\t\t\t<h1><em><em>Bucket Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>bucketCount:</em></em> ".htmlspecialchars(ltrim($this->bucketCount))."</li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>headline:</em></em> <ol>".$headline."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>bucketCopy:</em></em> <ol>".$bucketCopy."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>bucketLink:</em></em> <ol>".$bucketLink."</ol></li>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>images:</em></em> <ol>".$bucketImg."</ol></li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;		
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file buckets.inc.php */
/* Location: system/classes/buckets.inc.php */
?>