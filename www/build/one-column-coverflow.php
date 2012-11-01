<?php
/**
 * Microsite One Column Template
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
	$page->pageTitle("One Column: Coverflow and Text");
	$page->isFullWidthLayout(1);
/*
 +--------------------------------------------------------------------------
 *	CUSTOM COVERFLOW CONFIGURATION OVERRIDES SECTION
 *	FOR DOCUMENTATION ON COVERFLOW CONFIGURATION
 *	int.hmheducation.com/system/assets/help/localIncludes/coverflow.php
 +--------------------------------------------------------------------------
*/
	$coverflow->hasCoverflow(1);

	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
	$coverflow->coverFlowItem(__S_GLOB_IMAGES__."/build/generic-image-cf.gif", "Image Caption");
/*
 ***************************************************************************
 *	DO NOT EDIT
 *	LOAD TEMPLATE HEADER
 ***************************************************************************
*/
	include_once __TEMPLATES__."/header.tpl.php";
/*
 ***************************************************************************
 *	
 ***************************************************************************
*/
?>

<div class="buffer">
	<h1>One Column: <a href="#">Coverflow and Text</a></h1>
	<?php print $coverflow->coverFlowBuild(); ?>
	<h2>H2 Secondary Feature <a href="#">Headline</a></h2>
	<h3>H3 Subhead Goes <a href="#">Here</a></h3>
	<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
	<blockquote>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed ligula auctor nisl molestie consequat eget et augue. Vivamus commodo urna non metus auctor posuere. Fusce a lobortis est. Integer lectus risus, dictum quis mattis eu, feugiat vitae dolor. Donec ligula nulla, iaculis vel luctus eget, mattis eget erat.</p>
		<span class="attribution">Quisque sed ligula auctor<br />
			Quisque sed ligula auctor</span>
	</blockquote>
	<p>This is body copy platea magna, in diam, tortor</p>
	<ul>
		<li>Bullet One<sup>&reg;</sup><br />
			the second line should hang under the first line</li>
		<li><a href="#">Bullet Two</a></li>
		<li>Bullet Three<sup>&trade;</sup></li>
	</ul>
	<h3>H3 Subhead Goes Here</h3>
	<ol>
		<li>Bullet One<sup>&reg;</sup><br />
			the second line should hang under the first line</li>
		<li><a href="#">Number Two</a></li>
		<li>Number Three</li>
	</ol>
	<p>This is body copy platea magna, in diam, tortor</p>
		
	<?php print $element->iconButton("download", "#", "Download PDF", "1.36mb"); ?>
	<?php print $element->iconButton("video", "#", "Watch a video"); ?>
	<?php print $element->iconButton("more-info", "#", "More Info"); ?>
	<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
    <h3>Application Icons</h3>
    <?php print $element->iconButton("app-icon", "404.pdf", "Download PDF File", "1.36mb"); ?><br/>
	<?php print $element->iconButton("app-icon", "404.doc", "Download Word Document"); ?><br/>
	<?php print $element->iconButton("app-icon", "404.xls", "Download Excel Spreadsheet"); ?><br/>
	<?php print $element->iconButton("app-icon", "404.ppt", "Download Powerpoint Presentation"); ?><br/>
	<?php print $element->iconButton("app-icon", "404.zip", "Download Zip File"); ?>
	
	<?php print $element->disclaimer("This is caption/disclaimer text"); ?>
	
	<?php print $element->button("button", "#", "Button", "right-align"); ?>
	<?php print $element->button("button", "#", "Button"); ?>
	<?php print $element->button("button-alt", "#", "Button Alt", "right-align"); ?>
	<?php print $element->button("button-alt", "#", "Button"); ?>
	<?php print $element->button("button-opt", "#", "Button Opt", "right-align"); ?>
	<?php print $element->button("button-opt", "#", "Button Opt"); ?>
	<?php print $element->button("app-store", "#", "App Store", "left-align"); ?>
	<?php print $element->button("app-store", "#", "App Store", "right-align"); ?>
	
</div>
<hr />

<?php
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