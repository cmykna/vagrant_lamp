<?php
/**
 * Microsite Two Column Template
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
	$callPage = "teams";
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
	$page->pageTitle("Two Column: Left Image Team and Text");
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
	<h1>Two Column: <a href="#">Left Image Team and Text</a></h1>
	<div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
		<div class="team-rep-left">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-180x180.gif", "left", "rep", "Small Image 180 x 180 max"); ?>
			<a class="small-button" href="#">Contact Me</a>
			<a href="//www.facebook.com/HMHeducation"><img class="social-icon" src="<?php print __S_ICONS__; ?>/facebook.png" alt="Follow us on Facebook" /></a>
			<a href="//www.twitter.com/hmheducation"><img class="social-icon" src="<?php print __S_ICONS__; ?>/twitter.png" alt="Follow us on Twitter" /></a>
		</div>	
		<ul class="book-list">
			<li>Book Title Goes Here</li>
			<li><a href="#">Book Title Goes Here</a></li>
			<li><a href="#">Really, Really Long Book Title Goes Here</a></li>
			<li>Book Title Goes Here</li>
		</ul>
		<span class="fn n">
		<h2>
			<span class="given-name">Firstname</span> 
			<span class="additional-name"></span> 
			<span class="family-name">Lastname</span>
		</h2>
		</span>
		<h3 class="org">Job Title Goes Here</h3>
		<p>Territories: Territory 1, Territory 2, Territory 3, Territory 4</p>
		<p class="tel">555-555-5555</p>
		<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
		<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
			eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
			pellentesque <em><em><em>bold ital text here</em></em></em> parturient?</p>
	</div>
	<hr />
	<div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
		<div class="team-rep-left">
			<?php print $element->image(__S_GLOB_IMAGES__."/build/small-image-180x180.gif", "left", "rep", "Small Image 180 x 180 max"); ?>
			<a class="small-button" href="#">Contact Me</a>
			<a href="//www.facebook.com/HMHeducation"><img class="social-icon" src="<?php print __S_ICONS__; ?>/facebook.png" alt="Follow us on Facebook" /></a>
			<a href="//www.twitter.com/hmheducation"><img class="social-icon" src="<?php print __S_ICONS__; ?>/twitter.png" alt="Follow us on Twitter" /></a>
		</div>	
		<ul class="book-list">
			<li>Book Title Goes Here</li>
			<li><a href="#">Book Title Goes Here</a></li>
			<li><a href="#">Really, Really Long Book Title Goes Here</a></li>
			<li>Book Title Goes Here</li>
		</ul>
		<span class="fn n">
		<h2>
			<span class="given-name">Firstname</span> 
			<span class="additional-name"></span> 
			<span class="family-name">Lastname</span>
		</h2>
		</span>
		<h3 class="org">Job Title Goes Here</h3>
		<p>Territories: Territory 1, Territory 2, Territory 3, Territory 4</p>
		<p class="tel">555-555-5555</p>
		<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
		<p>This is body copy platea magna, in diam, tortor a pulvinar <em><em>strong text here</em></em> nunc diam ac lundium egestas penatibus
			eu et in dignissim dolor, <a href="#">this is a link within the body copy</a> ut, mauris ultricies mattis, tempor, pid, enim. Aenean
			pellentesque <em><em><em>bold ital text here</em></em></em> parturient?</p>
	</div>
</div>

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
 *	End of file: Microsite Two Column Template
 ***************************************************************************
*/
?>