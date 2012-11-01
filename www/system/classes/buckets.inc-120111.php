<?php
/**
 * Microsite Buckets Class
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
	// Headline Array
	private $headline = array();
	// BucketCopy Array
	private $bucketCopy = array();
	// BucketLink Array
	private $bucketLink = array();
	// Image Array
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
	public function errorReport($bool) {
		$this->reporter = (int) booleanCheck($bool);
		if ($this->reporter == 1) {
			$this->_generateReport();
		}
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
	public function bucketCount($str) {
		if((int) $str) {
			switch($str) {
				case (int) 3:
					$this->bucketCount = (string) "three";
				break;
				case (int) 4:
					$this->bucketCount = (string) "four";
				break;
				default:
					$this->bucketCount = (string) "three";
				break;
			}
		} else {
			if ((string) $str == "three" || (string) $str == "four") {
				$this->bucketCount = (string) $str;
			} else {
				$this->bucketCount = (string) "three";
			}
		}
		$bucketStr = (string) "\r\n\t\t\t\t<aside class=\"%s-space-bucket\">";
		$bucketCompiled = sprintf($bucketStr, $this->bucketCount);
		$this->bucket = (string) $bucketCompiled;
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
	public function headline($str, $class) {
		$this->headlineStr = (string) $str;
		$this->headlineClass = (string) $class;
		if($this->headlineClass != NULL) {
			$this->headlineClass = (string) " class=\"".$class."\"";	
		} else {
			$this->headlineClass;
		}
		$headlineStr = (string) "<h3%s>%s</h3>";
		$headlineCompiled = sprintf($headlineStr, $this->headlineClass, $this->headlineStr);
		$this->headline[] = (string) $headlineCompiled;
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
	public function bucketCopy($str, $class) {
		$this->bucketCopyStr = (string) $str;
		$this->bucketCopyClass = (string) $class;
		if($this->bucketCopyClass != NULL) {
			$this->bucketCopyClass = (string) " class=\"".$class."\"";
		} else {
			$this->bucketCopyClass;
		}
		$bucketCopyStr = (string) "<p%s>%s</p>";
		$bucketCopyCompiled = sprintf($bucketCopyStr, $this->bucketCopyClass, $this->bucketCopyStr);
		$this->bucketCopy[] = (string) $bucketCopyCompiled;
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
	public function bucketLink($str, $href, $class) {
		booleanCheck($multiLink);
		$this->bucketLinkStr = (string) $str;
		$this->bucketLinkHref = (string) stripHTTP($href);
		$this->bucketLinkClass = (string) $class;
		if($this->bucketLinkClass != NULL) {
			$this->bucketLinkClass = (string) " class=\"".$class."\" ";
		} else {
			$this->bucketLinkClass = (string) " class=\"call-out-link\" ";
		}
		$bucketLinkStr = (string) "<a%shref=\"%s\">%s</a>";
		$bucketLinkCompiled = sprintf($bucketLinkStr, $this->bucketLinkClass, $this->bucketLinkHref, $this->bucketLinkStr);
		$this->bucketLink[] = (string) $bucketLinkCompiled;
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
	public function image($file, $alt, $class) {
		$this->imageFile = (string) stripHTTP($file);
		$this->imageAlt = (string) $alt;
		$this->imageClass = (string) $class;
		if($this->imageClass != NULL) {
			$this->imageClass = (string) " class=\"".$class."\" ";
		} else {
			$this->imageClass = (string) " class=\"call-out\" ";
		}
		if($this->imageAlt == NULL) {
			$this->imageAlt = $this->imageFile;
		}
		$imageStr = (string) "<img%ssrc=\"%s\" alt=\"%s\" />";
		$imageCompiled = sprintf($imageStr, $this->imageClass, $this->imageFile, $this->imageAlt);
		$this->image[] = (string) $imageCompiled;
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	public function bucketBuild() {
		return $this->_build();
	}
	
	private function _build() {
		$i = (int) 3;	// offset default buckets
		$bucketCount = (int) $this->bucketCount;
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
print
"<pre>
\r\nBucket Values
\r\nVersion: ".$this->version.
"\r\n</pre>";		
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