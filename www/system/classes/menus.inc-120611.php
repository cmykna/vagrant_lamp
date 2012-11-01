<?php
/**
 * Microsite Menus Class
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
 *	This class contains all the methods needed to construct a local menus file
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS MENU
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/menu.php
 ***************************************************************************
*/
class Menu
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/
	// Setup the arrays needed by this class
	private $topNavLink = array();
	private $topNavSocialLink = array();
	private $leftNavItem = array();
/*
 ***************************************************************************
 *	TOP NAV METHODS
 ***************************************************************************
*/
/*
 ***************************************************************************
 *	@method: topNavLink($str, $href, $class)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'right-split'
 *
 *	REQUIRED
*/
	public function topNavLink($str = NULL, $href = NULL, $class = NULL) {
		$this->linkStr = ($str != NULL) ? (string) $str : NULL;
		$this->linkHref = ($href != NULL) ? (string) stripHTTP($href) : (string) "#";
		$this->linkClass = ($class != NULL) ? (string) " class=\"".$class."\"" : (string) " class=\"right-split\"";
		$this->topNavLink[] = (string) sprintf("<li%s><a href=\"%s\">%s</a></li>", $this->linkClass, $this->linkHref, $this->linkStr);
		return $this->topNavLink;
	}
/*
 ***************************************************************************
 *	@method: topNavSocialLink($str, $href, $class)
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	@var $class
 *	@param string $class
 *	@var default param: 'social-network'
 *
 *	REQUIRED
*/
	public function topNavSocialLink($type = NULL, $href = NULL, $class = NULL) {
		$this->linkType = (string) strtolower($type);
		$this->linkHref = (string) stripHTTP($href);
		$this->linkClass = (string) $class;
		if($this->linkClass != NULL) {
			$this->linkClass = (string) " class=\"".$class."\"";
		} else {
			$this->linkClass = (string) " class=\"social-network\"";
		}
		switch($this->linkType) {
			case "facebook":
				$this->linkIcon = (string) __S_ICONS__."/facebook.png";
			break;
			case "twitter":
				$this->linkIcon = (string) __S_ICONS__."/twitter.png";
			break;
		}
		$topNavSocialLinkStr = (string) "<li%s><a rel=\"external\" href=\"%s\"><img src=\"%s\" alt=\"Follow us on %s\" /></a></li>";
		$topNavSocialLinkCompiled = sprintf($topNavSocialLinkStr, $this->linkClass, $this->linkHref, $this->linkIcon, ucfirst($this->linkType));
		$this->topNavSocialLink[] = (string) $topNavSocialLinkCompiled;
	}
	
	public function topNav() {
		return $this->_topNavBuild();
	}

	private function _topNavBuild() {
		$i = (int) 3;	// offset default items
		$j = (int) 2;	// offset default items
		$topNavLink = (int) count($this->topNavLink);
		$topNavStop = (int) (count($this->topNavLink) - 1);
		$topNavSocialLink = (int) count($this->topNavSocialLink);
		$this->topNavBuild = (string) "\r\n\t\t\t\t\t<ul>";
		for ($i; $i < $topNavLink; $i++) {
			if ($i < $topNavStop) {
				$this->topNavBuild .=  "\r\n\t\t\t\t\t\t".$this->topNavLink[$i];
			} else {
				$toReplace = (string) " class=\"right-split\"";
				$replaceWith = (string) " class=\"split\"";
				$emptyClass = str_replace($toReplace, $replaceWith, $this->topNavLink[$i]);
				$this->topNavBuild .= (string) "\r\n\t\t\t\t\t\t".$emptyClass;
			}
		}
		for ($j; $j < $topNavSocialLink; $j++) {
			$this->topNavBuild .=  "\r\n\t\t\t\t\t\t".$this->topNavSocialLink[$j];
		}
		$this->topNavBuild .= (string) "\r\n\t\t\t\t\t</ul>";
		return $this->topNavBuild;		
	}
/*
 ***************************************************************************
 *	LEFT NAV METHODS
 ***************************************************************************
*/
	public function groupItems($callPage) {
		$this->groupItems = (string) $callPage;
		return $this->groupItems;
	}
	
	public function leftNavItem($group, $str, $href = NULL) {
		$this->groupStr = (string) $group;
		$this->linkStr = (string) $str;
		$this->linkHref = (string) stripHTTP($href);
		// @TODO add fix null href and generate slug from str
		$this->leftNavItem["$this->groupStr"][] = array("item" => $this->linkStr, "slug" => $this->linkHref);
	}
	
	public function leftNav() {
		return $this->_leftNavBuild();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _leftNavBuild() {
		$i = (int) 0;	// offset default items
		$j = (int) 0;	// offset default items
		$k = (int) 0;	// offset default items
		// count the items in the array and add the $i offset
		$groupCount = (int) (count($this->leftNavItem["$this->groupItems"]) + $i);
		// return the offset $i to zero for /build
		$resetCount = (int) ($groupCount - $groupCount);
		// get the page name and extension
		$fileName = (string) substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], '/') + 1);
		$ext = (string) substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],'.') + 1);
		// get extension length
		$extInt = (int) strlen($ext) + 1;
		// return page name minus extension
		$fileNameNX = (string) substr($fileName, 0, -$extInt);
		// make an array to figure out which are headlines or links
		$navArray = array();
		
		for($i; $i < $groupCount; $i++) {
			// count the items in the array
			if($this->leftNavItem["$this->groupItems"][$i]["item"]) {
				$itemCount++;
				if($this->leftNavItem["$this->groupItems"][$i]["slug"] != NULL) {
					$navArray["navItem"][$i] = (int) 1; //(string) "slug";
				} else {
					$navArray["navItem"][$i] = (int) 0; //(string) "header";
				}
			}
		}
		$this->leftNavBuild = (string) "\r\n\t\t\t\t\t\t<nav id=\"section-nav\">";
		for($j; $j < $groupCount; $j++) {
			$next = $navArray["navItem"][($j+1)];
			$prev = $navArray["navItem"][($j-1)];
			if($j == $resetCount && $navArray["navItem"][$j] == 0) {
				$leftNavHeaderStr = (string) "\r\n\t\t\t\t\t\t\t<h2>%s</h2>";
				$leftNavHeaderCompiled = sprintf($leftNavHeaderStr, $this->leftNavItem["$this->groupItems"][$j]["item"]);
				$this->leftNavBuild .= (string) $leftNavHeaderCompiled;			
			}
			if($j != $resetCount && $navArray["navItem"][$j] == 0) {
					$leftNavHeaderStr = (string) "\r\n\t\t\t\t\t\t\t<h3>%s</h3>";
					$leftNavHeaderCompiled = sprintf($leftNavHeaderStr, $this->leftNavItem["$this->groupItems"][$j]["item"]);
					$this->leftNavBuild .= (string) $leftNavHeaderCompiled;
			}
			if($j != $resetCount && $navArray["navItem"][$j] == 1) {
				if($prev == 0 && $next == 1) {
					$this->leftNavBuild .= (string) "\r\n\t\t\t\t\t\t\t<ul class=\"tabs\">";
					if($this->leftNavItem["$this->groupItems"][$j]["slug"] == $fileName) {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a class=\"active\" href=\"%s\">%s</a></li>";	
					} else {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a href=\"%s\">%s</a></li>";
					}
					$leftNavItemCompiled = sprintf($leftNavItemStr, $this->leftNavItem["$this->groupItems"][$j]["slug"], $this->leftNavItem["$this->groupItems"][$j]["item"]);
					$this->leftNavBuild .= (string) $leftNavItemCompiled;
				} else if($prev == 1 && $next == 1) {
					if($this->leftNavItem["$this->groupItems"][$j]["slug"] == $fileName) {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a class=\"active\" href=\"%s\">%s</a></li>";	
					} else {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a href=\"%s\">%s</a></li>";
					}		
					$leftNavItemCompiled = sprintf($leftNavItemStr, $this->leftNavItem["$this->groupItems"][$j]["slug"], $this->leftNavItem["$this->groupItems"][$j]["item"]);
					$this->leftNavBuild .= (string) $leftNavItemCompiled;
				} else if($prev == 1 && $next == 0) {
					if($this->leftNavItem["$this->groupItems"][$j]["slug"] == $fileName) {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a class=\"active\" href=\"%s\">%s</a></li>";	
					} else {
						$leftNavItemStr = "\r\n\t\t\t\t\t\t\t\t<li><a href=\"%s\">%s</a></li>";
					}
					$leftNavItemCompiled = sprintf($leftNavItemStr, $this->leftNavItem["$this->groupItems"][$j]["slug"], $this->leftNavItem["$this->groupItems"][$j]["item"]);
					$this->leftNavBuild .= (string) $leftNavItemCompiled;
					$this->leftNavBuild .= (string) "\r\n\t\t\t\t\t\t\t</ul>";
				}
			}
		}
		$this->leftNavBuild .= (string) "\r\n\t\t\t\t\t\t</nav>";
		return $this->leftNavBuild;
	}	
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file menu.inc.php */
/* Location: system/classes/menu.inc.php */
?>