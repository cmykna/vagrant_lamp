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
	$page->pageTitle("One Column: Tabs and Text");
	$page->isFullWidthLayout(1);
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
	<h1>One Column: <a href="#">Tabs and Text</a></h1>
	<h2>H2 Secondary Feature <a href="#">Headline</a></h2>
	<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
	<blockquote>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed ligula auctor nisl molestie consequat eget et augue. Vivamus commodo urna non metus auctor posuere. Fusce a lobortis est. Integer lectus risus, dictum quis mattis eu, feugiat vitae dolor. Donec ligula nulla, iaculis vel luctus eget, mattis eget erat.</p>
		<span class="attribution">Quisque sed ligula auctor<br />
			Quisque sed ligula auctor</span>
	</blockquote>
	<div class="tabNav">
		<ul class="h-tabs">
			<li><a href="#tab01">Tab 1</a></li> 
			<li><a href="#tab02">Tab 2</a></li> 
			<li><a href="#tab03">Tab 3</a></li> 
		</ul>
	</div>
	<div class="tabCont">
		<div id="tab01">
			<h2>H2 Secondary Feature <a href="#">Headline</a></h2>
			<?php print $element->image(__S_GLOB_IMAGES__."/build/large-image-875x300.gif", "center", NULL, "Large Image 875 x 300 max"); ?>
			<h3>H3 Subhead Goes <a href="#">Here</a></h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
				pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
			<hr />
		</div>
		<div id="tab02">
			<h2>H2 Secondary Feature <a href="#">Headline</a></h2>
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "left", NULL, "Small Image 300 x 300 max"); ?>
			<h3>H3 Subhead Goes <a href="#">Here</a></h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
				pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
			<hr />
		</div>
		<div id="tab03">
			<h2>H2 Secondary Feature <a href="#">Headline</a></h2>
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-300x300.gif", "right", NULL, "Small Image 300 x 300 max"); ?>
			<h3>H3 Subhead Goes <a href="#">Here</a></h3>
			<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
				eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
				pellentesque <em><em><em>bold italic text</em></em></em> here parturient?</p>
			<hr />
		</div>
	</div>
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