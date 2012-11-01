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
	$page->pageTitle("Campaign Products Page");
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
<div class="buffer campaign-products">
	<?php print $element->image(__S_GLOB_IMAGES__."/build/image-148x148.gif", "left", NULL, ""); ?>
	<h2>Product Name Goes Here</h2>
	<p>Product description should mention direct ties to the campaign. Try to keep product
		descriptions no longer than 500 characters (1-line headline). If there's a sample (Virtual
		Sample, Online Preview, ThinkCentral/myHRW, etc.), be sure to include a Sample Now
		button. If there is a microsite, be sure to include a More Info button. If there are both,
		include both buttons, and emphasize the Sample Now button. Never include more than
		two buttons.</p>
	<div class="multi-buttons-right">
		<span><?php print $element->button("button-opt", "#", "More Info"); ?></span>
		<span><?php print $element->button("button", "#", "Sample Now"); ?></span>
	</div>
</div>
<hr />
<div class="buffer campaign-products">
	<?php print $element->image(__S_GLOB_IMAGES__."/build/image-148x148.gif", "left", NULL, ""); ?>
	<h2>Product Name Goes Here</h2>
	<p>Product description should mention direct ties to the campaign. Try to keep product
		descriptions no longer than 500 characters (1-line headline). If there's a sample (Virtual
		Sample, Online Preview, ThinkCentral/myHRW, etc.), be sure to include a Sample Now
		button. If there is a microsite, be sure to include a More Info button. If there are both,
		include both buttons, and emphasize the Sample Now button. Never include more than
		two buttons.</p>
		<?php print $element->button("button", "#", "Sample Now", "right-align"); ?>
</div>
<hr />
<div class="buffer campaign-products">
	<?php print $element->image(__S_GLOB_IMAGES__."/build/image-148x148.gif", "left", NULL, ""); ?>
	<h2>Product Name Goes Here</h2>
	<p>Product description should mention direct ties to the campaign. Try to keep product
		descriptions no longer than 500 characters (1-line headline). If there's a sample (Virtual
		Sample, Online Preview, ThinkCentral/myHRW, etc.), be sure to include a Sample Now
		button. If there is a microsite, be sure to include a More Info button. If there are both,
		include both buttons, and emphasize the Sample Now button. Never include more than
		two buttons.</p>
	<div class="multi-buttons-right">
		<span><?php print $element->button("button-opt", "#", "More Info"); ?></span>
		<span><?php print $element->button("button", "#", "Sample Now"); ?></span>
	</div>
</div>
<hr />
<div class="buffer campaign-products">
	<?php print $element->image(__S_GLOB_IMAGES__."/build/image-148x148.gif", "left", NULL, ""); ?>
	<h2>Product Name Goes Here</h2>
	<p>Product description should mention direct ties to the campaign. Try to keep product
		descriptions no longer than 500 characters (1-line headline). If there's a sample (Virtual
		Sample, Online Preview, ThinkCentral/myHRW, etc.), be sure to include a Sample Now
		button. If there is a microsite, be sure to include a More Info button. If there are both,
		include both buttons, and emphasize the Sample Now button. Never include more than
		two buttons.</p>
		<?php print $element->button("button", "#", "Sample Now", "right-align"); ?>
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