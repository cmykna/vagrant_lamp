<?php
/**
 * Microsite Menus Class
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
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/
	// Setup the arrays needed by this class
	private $topNavLink = array();
	private $topNavSocialLink = array();

	// Setting this guy to public temporarily for access to 
	// nav items.
	public $leftNavItem = array();

	protected $menuStyle;

	function __construct($menuStyle)
	{
		$this->menuStyle = $menuStyle;
	}
/*
 ***************************************************************************
 *	TOP NAV METHODS
 ***************************************************************************
*/
/*
 ***************************************************************************
 *	@method: topNavLink($str, $href, $class, $external, $gaLinkTrack)
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
 *	@var $external
 *	@param boolean $external
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	@var $gaLinkTrack
 *	@param string $gaLinkTrack
 *	@var default param: NULL
 *
 *	REQUIRED
*/
	public function topNavLink($str = NULL, $href = NULL, $class = NULL, $external = NULL, $gaLinkTrack = NULL) {
		$this->linkStr = ($str != NULL) ? (string) $str : NULL;
		$this->linkHref = ($href != NULL) ? (string) stripHTTP($href) : (string) "#";
		$this->gaLinkTrack = ($gaLinkTrack != NULL) ? (string) " onclick=\"recordOutboundLink(this, 'Outbound Links', '".$gaLinkTrack."');return false;\"" : NULL;
		$this->external = (int) booleanCheck($external);
		$this->rel = ($this->external == 1) ? (string) " rel=\"external\" " : (string) " ";
		$this->linkClass = ($class != NULL) ? (string) " class=\"".$class."\"" : (string) " class=\"right-split\"";
        $this->topNavLink[] = (string) sprintf("<li%s><a%s href=\"%s\"%s>%s</a></li>", $this->linkClass, $this->gaLinkTrack, $this->linkHref, $this->rel, $this->linkStr);
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
 *	DEPRICATED
*/
	public function topNavSocialLink($type = NULL, $href = NULL, $class = NULL) {
		$this->linkType = (string) strtolower($type);
		$this->linkHref = (string) stripHTTP($href);
		$this->linkClass = ($class != NULL) ? (string) " class=\"".$class."\"" : (string) " class=\"social-network\"";
		switch($this->linkType) {
			case "blogger":
				$this->linkIcon = (string) __S_ICONS__."/blogger.png";
				$this->linkType = (string) "Blogger";
			break;
			case "facebook":
				$this->linkIcon = (string) __S_ICONS__."/facebook.png";
				$this->linkType = (string) "Facebook";
			break;
			case "linkedin":
				$this->linkIcon = (string) __S_ICONS__."/linkedin.png";
				$this->linkType = (string) "LinkedIn";
			break;
			case "rss":
				$this->linkIcon = (string) __S_ICONS__."/rss.png";
				$this->linkType = (string) "RSS";
			break;			
			case "scribd":
				$this->linkIcon = (string) __S_ICONS__."/scribd.png";
				$this->linkType = (string) "Scribd";
			break;	
			case "twitter":
				$this->linkIcon = (string) __S_ICONS__."/twitter.png";
				$this->linkType = (string) "Twitter";
			break;
			case "wordpress":
				$this->linkIcon = (string) __S_ICONS__."/wordpress.png";
				$this->linkType = (string) "WordPress";
			break;
			case "youtube":
				$this->linkIcon = (string) __S_ICONS__."/youtube.png";
				$this->linkType = (string) "YouTube";
			break;	
		}
		$this->topNavSocialLink[] = (string) sprintf("<li%s><a rel=\"external\" href=\"%s\"><img src=\"%s\" alt=\"Follow us on %s\" /></a></li>", $this->linkClass, $this->linkHref, $this->linkIcon, $this->linkType);
		return $this->topNavSocialLink;
	}
/*
 ***************************************************************************
 *	Method for building out the top navigation on the page
*/
	public function topNav() {
		return $this->_topNavBuild();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS FOR TOP NAV
*/
	private function _topNavBuild() {
		$i = (int) 3;	// offset default items
		$j = (int) 2;	// offset default items
		$topNavLink = (int) count($this->topNavLink);
		$topNavStop = (int) (count($this->topNavLink) - 1);
		//$topNavSocialLink = (int) count($this->topNavSocialLink);
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
		//for ($j; $j < $topNavSocialLink; $j++) {
			//$this->topNavBuild .=  "\r\n\t\t\t\t\t\t".$this->topNavSocialLink[$j];
		//}
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
/*
 ***************************************************************************
 *	LEFT HAND NAVIGATION
 *
 *	@method: leftNavItem($group, $str, $href)
 *
 *	@var $group
 *	@param string $str
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	REQUIRED
 *	ORDER NUMBER 3
*/
	public function leftNavItem($group, $str, $href = NULL, $external = NULL) {
		$this->groupStr = (string) $group;
		$this->linkStr = (string) $str;
		$this->linkHref = (string) stripHTTP($href);
		// @TODO add fix null href and generate slug from str
		$this->leftNavItem["$this->groupStr"][] = array("item" => $this->linkStr, "slug" => $this->linkHref);
		return $this->leftNavItem;
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS FOR LEFT NAV
*/
	public function leftNav() {
		return $this->_leftNavBuild();
	}
/*
 ***************************************************************************
 *	PRIVATE METHODS FOR LEFT NAV
*/



	private function _itemLink($text, $href) {
		if ($href == pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_BASENAME)) {
			return "<a href=\"$href\" class=\"active\">$text</a>";
		}
		return "<a href=\"$href\">$text</a>";
	}

	private function _leftNavBuild() {
		$navGroup = $this->leftNavItem["$this->groupItems"];
		ob_start();
		echo "<nav id=\"section-nav\">\n";
		$i = 0;
		foreach ($navGroup as $arr) {

			$text = $arr['item'];
			$href = $arr['slug'];

			// First item is the category name
			if ($i == 0) {
				echo "<h2>$text</h2>\n";
			}

			// If href is blank and we're on item 2, it's a subhead
			elseif ($href == "" && $i == 1) {
				echo "<h3>$text</h3>\n<ul class=\"tabs\">\n";
			} 

			// If href isn't blank and we're on item 2, start the nav list
			elseif ($href != "" && $i == 1) {
				echo "<ul class=\"tabs\"><li>".$this->_itemLink($text, $href)."</li>\n";
			}

			// End the latest list and spit out a subhead
			elseif ($href == "" && $i > 1) {
				echo "</ul>\n<h3>$text</h3>\n<ul class=\"tabs\">\n";
			} 

			// Last nav item
			elseif ($i == count($navGroup)-1) {
				echo "<li>".$this->_itemLink($text, $href)."</li>\n</ul>\n";
			} 

			// All other items
			else {
				echo "<li>".$this->_itemLink($text, $href)."</li>\n";
			}

			$i++;

		}
		echo "</nav>";
		$nav = ob_get_clean();
		return $nav;
	}

/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
/**
	NavTree class generates top and left menus with the addNode function.
	Menu style options will include accordian and dropdown.
	More documentation forthcoming.
*/
}

class NavTree extends Menu {

	public function groupItems($callPage) {
		$this->groupItems = (string) $callPage;
		return $this->groupItems;
	}

	public function leftNav($style) {
		return $this->_flatTree($style);
	}

	public function topNav($style) {
		return $this->_nestedTree($style);
	}
/**
	Stub for new addNode function. Combines functionality of Menu's topNavLink and leftHandItem
*/
/*	function addNode(array $array){
		// hacky way to emulate named parameters with PHP
		$args = array('group', 'str', 'slug', 'ext', 'class', 'ga', 'lvl');
		foreach($args as $arg){
			$$arg = array_key_exists($arg, $array)? $array[$arg]:null;
		}
		// construct node array here
	}
*/
/*
 ***************************************************************************
 *	LEFT HAND NAVIGATION
 *
 *	@method: addNode($group, $str, $href)
 *
 *	@var $group
 *	@param string $str
 *
 *	@var $str
 *	@param string $str
 *
 *	@var $href
 *	@param string $href
 *	@var default param: #
 *
 *	REQUIRED
 *	ORDER NUMBER 3
*/
	public function addNode($group, $str, $href = NULL) {
		$this->groupStr = (string) $group;
		$this->linkStr = (string) $str;
		$this->linkHref = (string) stripHTTP($href);
		$this->nodes["$this->groupStr"][] = array("item" => $this->linkStr, "slug" => $this->linkHref);
		return $this->nodes;
	}

	private function _nodeLink($text, $href) {
		// Do we need to parse a query string?
		if (empty($_SERVER['QUERY_STRING'])) {
			$category = $_SERVER['SCRIPT_NAME'];
		} else {
			$uri_clean = ltrim(str_replace(".php?q=", "/", $_SERVER['REQUEST_URI']), "/");
			$uri_split = explode("/", $uri_clean);
			$slug = $uri_split[2]."/".$uri_split[3];
			$category = $uri_split[1].".php";
		}
		if ($href == $slug) {
			return "<a href=\"{$category}?q=$href\" class=\"active\">$text</a>";
		}
		return "<a href=\"{$category}?q=$href\">$text</a>";
	}

	private function _flatTree() {
		/**
		Need to make accordian-specific classes conditional
		*/
		$navGroup = $this->nodes["$this->groupItems"];
		ob_start();
		echo "<nav id=\"section-nav\" class=\"acc\">\n";
		$i = 0;
		foreach ($navGroup as $arr) {

			$text = $arr['item'];
			$href = $arr['slug'];

			// First item is the category name
			if ($i == 0) {
				echo "<h2>$text</h2>\n";
			}

			// If href is blank and we're on item 2, it's a subhead
			elseif ($href == "" && $i == 1) {
				echo "<h3><span class=\"acc-icon acc-icon-tri-c\"></span>$text</h3>\n<ul class=\"tabs\">\n";
			} 

			// If href isn't blank and we're on item 2, start the nav list
			elseif ($href != "" && $i == 1) {
				echo "<ul class=\"tabs\"><li>".$this->_nodeLink($text, $href)."</li>\n";
			}

			// End the latest list and spit out a subhead
			elseif ($href == "" && $i > 1) {
				echo "</ul>\n<h3><span class=\"acc-icon acc-icon-tri-c\"></span>$text</h3>\n<ul class=\"tabs\" class=\"active\">\n";
			} 

			// Last nav item
			elseif ($i == count($navGroup)-1) {
				echo "<li>".$this->_nodeLink($text, $href)."</li>\n</ul>\n";
			} 

			// All other items
			else {
				echo "<li>".$this->_nodeLink($text, $href)."</li>\n";
			}

			$i++;

		}
		echo "</nav>";
		$nav = ob_get_clean();
		return $nav;
	}

	private function _nestedTree() {
		return;
	}
}

/* End of file menu.inc.php */
/* Location: system/classes/menu.inc.php */
?>
