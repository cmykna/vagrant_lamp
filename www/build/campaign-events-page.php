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
	$callPage = "campaign";
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
	$page->pageTitle("Campaign Events Page");
	$page->isCampaignPage(1);

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
	<h1>H1 Headline Goes Here</h1>
</div>
<div class="buffer campaign-events">
	<?php print $element->image(__S_GLOB_IMAGES__."/build/image-148x148.gif", "right", NULL, ""); ?>
	<h2>Event Details</h2>
	<p>When: Month Day-Day, Year</p>
	<p>Where: City, State</p>
	<?php print $element->iconButton("more-info", "#", "More Info"); ?>
</div>
<div class="buffer campaign-events">
	<h2>Presentation Schedule</h2>
	<h3>WeekDay, Month Day, Year</h3>
	<p class="presentation">The first line is the presentation title</p>
	<p class="presenter">2nd line is the presenter</p>
	<p class="presentation-time">3rd line is the time</p>
	
	<h3>WeekDay, Month Day, Year</h3>
	<p class="presentation">Presentation Title</p>
	<p class="presenter">First Name Last Name</p>
	<p class="presentation-time">00:00 - 00:00 AM</p>
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