<?php
/**
 * Microsite Page Properties Includes
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Graham Lambertson graham.lambertson@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
 	$getDir = pathinfo($_SERVER['PHP_SELF']);
	print $_SERVER['DOCUMENT_ROOT'];
	print $getDir["dirname"];
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	include_once __APPLOC__."/settings.php";
	include_once $_SERVER['DOCUMENT_ROOT'].$getDir."/localIncludes/settings.php";
	include_once __APPLOC__."/page.php";
	include_once __APPLOC__."/menus.php";
	$leftNav->groupItems($callPage);
	include_once $_SERVER['DOCUMENT_ROOT'].$settings->documentFolder."/localIncludes/menus.php";
	include_once __APPLOC__."/coda.php";
	include_once __APPLOC__."/slide.php";
	include_once __APPLOC__."/coverflow.php";
	include_once __APPLOC__."/buckets.php";
	include_once __APPLOC__."/elements.php";
/* End of file page.properties.php */
/* Location: system/page.properties.php */
?>