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
	$page->pageTitle("One Column: Program Landing Page");
	$page->isFullWidthLayout(1);
	$page->isProductLandingPage(1);
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
<section class="product-page-content">
	<div class="buffer">
		<h1><a href="#">Discipline</a> Category<sup>&reg;</sup></h1>
		<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-340x150.gif", "right", NULL, "Small Image 340 x 150 max"); ?>
		<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
		eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
		pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
	</div>
	<hr />
	<div class="buffer">
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name<sup>&reg;</sup></h3>
			<p>This is body<sup>&reg;</sup> copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name<br/>Second Line for Longer Names</h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name</h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name<br/>Second Line for Longer Names</h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name</h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
		<div class="program-item">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-138x175.gif", "left", NULL, "Small Image 138 x 175 max"); ?>
			<h3>Program Name<br/>Second Line for Longer Names</h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut.</p>
				<?php print $element->iconButton("more-info", "#", "More Info"); ?>
				<?php print $element->iconButton("purchase", "#", "Purchase"); ?>
		</div>
	</div>
	<hr />	
</section>

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