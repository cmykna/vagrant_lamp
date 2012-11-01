<?php
/**
 * Microsite One Column Template
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
 * @package Microsite Page Templates
 * @subpackage Build
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	FOR HELP DOCUMENTATION
 *	int.hmheducation.com/system/assets/help/help.php
 ***************************************************************************
*/

/*
 ***************************************************************************
 *	CALL APPROPRIATE MENUS FOR PAGES
 *
 *	@var description: $callPage = $str
 *
 *	@var $str
 *	@param string $str
 *	@return correct menu for page
 *	@var default value: NULL
 *
 *	NOT REQUIRED
*/
	$callPage = NULL;
/*
 ***************************************************************************
 *	DO NOT EDIT
 *	LOAD ALL PAGE LIBRARIES
 *
 *	Include Properties file
 *	system/page.properties.php
 ***************************************************************************
*/
	include_once $_SERVER['DOCUMENT_ROOT']."/system/page.properties.php";
/*
 ***************************************************************************
 *	CUSTOM PAGE OVERRIDES SECTION
 *	FOR DOCUMENTATION ON PAGE
 *	int.hmheducation.com/system/assets/help/localIncludes/page.php
 ***************************************************************************
*/
	$page->pageTitle("One Column: Default Homepage");
	$page->isIndexPage(1);
	$page->isFullWidthLayout(1);
/*
 ***************************************************************************
 *	CUSTOM CODA CONFIGURATION OVERRIDES SECTION
 *	FOR DOCUMENTATION ON CODA CONFIGURATION
 *	int.hmheducation.com/system/assets/help/localIncludes/coda.php
 ***************************************************************************
*/
	$coda->hasCoda(1);
/*
 ***************************************************************************
 *	CUSTOM CODA CONFIGURATION OVERRIDES SECTION
 *	FOR DOCUMENTATION ON CODA CONFIGURATION
 *	int.hmheducation.com/system/assets/help/localIncludes/slide.php
 ***************************************************************************
*/
	$slide->slideAlign();
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideHeadLine("Keep HeadLine to 35 Characters Max");
	$slide->slideBodyCopy("Body text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideButton("Learn More", "#", "button");
		
	$slide->slideAlign("left");
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideHeadLine("Keep HeadLine to 35 Characters Max");
	$slide->slideBodyCopy("Body text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideButton("Learn More", "#", "button-alt");
	
	$slide->slideAlign("right");
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideHeadLine("Keep HeadLine to 35 Characters Max");
	$slide->slideBodyCopy("Body text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideButton("Learn More", "#", "button");
	
	$slide->slideAlign("left");
	$slide->slideImage(__S_IMAGES__."/blank.png");
	$slide->slideHeadLine("Keep HeadLine to 35 Characters Max");
	$slide->slideBodyCopy("Body text goes here. Keep all text concise&mdash;250 characters max. Do not change the fonts or add effects to any text. Do not put text on busy backgrounds. Text color, size and position can be adjusted if necessary, but please use this placeholder text as a base.");
	$slide->slideButton("Learn More", "#", "button-alt");
/*
 ***************************************************************************
 *	BUCKET CONFIGURATION OVERRIDES SECTION
 *	FOR DOCUMENTATION ON BUCKET CONFIGURATION
 *	int.hmheducation.com/system/assets/help/localIncludes/buckets.php
 ***************************************************************************
*/
	$bucket->headline("Headline Here");
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
	$bucket->bucketLink("Learn More", "#");
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");
	
	$bucket->headline("Headline Here");
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
	$bucket->bucketLink("Learn More", "#");
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");

	$bucket->headline("Headline Here");
	$bucket->bucketCopy("Do not change font, color or position of any text in bucket ads.");
	$bucket->bucketLink("Learn More", "#");
	$bucket->image(__S_GLOB_IMAGES__."/build/bucket-image.png", "Alt Tag");
/*
 ***************************************************************************
 *	ERROR REPORTING
 ***************************************************************************
*/
	$settings->errorReport(1);
	$page->errorReport(1);
	$coda->errorReport(1);
	$slide->errorReport(1);
	$bucket->errorReport(1);
	$coverflow->errorReport(1);
/*
 ***************************************************************************
 *	DO NOT EDIT
 *	LOAD TEMPLATE HEADER
 ***************************************************************************
*/
	include_once __TEMPLATES__."/header.tpl.php";
/*
 ***************************************************************************
 *	BUILD OUT THE PAGE DYNAMICALLY WITH OBJECTS
 ***************************************************************************
*/
	print $slide->codaBuild()
		  .$bucket->bucketBuild();
/*
 ***************************************************************************
 *	DO NOT EDIT
 *	LOAD TEMPLATE FOOTER
 ***************************************************************************
*/
	include_once __TEMPLATES__."/footer.tpl.php";
/*
 ***************************************************************************
 *	End of file: Microsite One Column Template
 ***************************************************************************
*/
?>