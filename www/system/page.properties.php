<?php
/**
 * Microsite Page Properties Includes
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
 * @subpackage System
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	include_once __APPLOC__."/settings.php";
	include_once $_SERVER['DOCUMENT_ROOT'].__DIRECTORY__."localIncludes/settings.php";
	include_once __APPLOC__."/page.php";
	include_once __APPLOC__."/menus.php";
	$leftNav->groupItems($callPage);
	include_once $_SERVER['DOCUMENT_ROOT'].__DIRECTORY__."localIncludes/menus.php";
	include_once __APPLOC__."/coda.php";
	include_once __APPLOC__."/slide.php";
	include_once __APPLOC__."/coverflow.php";
	include_once __APPLOC__."/buckets.php";
	include_once __APPLOC__."/elements.php";
	include_once __APPLOC__."/forms.php";
	include_once __APPLOC__."/cryptastic.php";
/* End of file page.properties.php */
/* Location: system/page.properties.php */
?>
