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
	$page->pageTitle("Campaign Homepage");
	$page->isFullWidthLayout(1);
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
<div class="campaign">
	<div class="home-header">
		<div class="slide">
			<div class="copy-block">
				<h1>Headline Here Max length: 38</h1>
				<p>This is a brief blurb/overview of the Campaign.
					Character limit: 350. Do not change the fonts or add
					effects. Do not put text on busy backgrounds. Do
					not adjust the size or position of the text. Text color
					can be changed, but be sure there's enough contrast
					between the text and the background. Button is
					optional.</p>
			</div>
			<?php print $element->button("button", "#", "Button"); ?>
			<a href="#"><img src="<?php print __S_GLOB_IMAGES__;?>/build/campaign-home-slide.gif" alt="Image Max: 946px x 350px"></a>
		</div>
	</div>
	<h2 class="campaign-header">Catch the Latest Buzz&hellip;</h2>
	<section class="one-space-bucket">
		<ul>
			<li class="bucket">
				<?php print $element->image(__S_GLOB_IMAGES__."/build/campaign-home.gif", "right", NULL, "Campaign Home 370px X 236px"); ?>
				<h3>H3 Goes Here. Try to Keep it to 1 Line. Max Characters (1 line): Approx. 72</h3>
				<p>This is a blurb about news, an event, or a special product feature and how it directly
					relates to the campaign. Max character limit: approx. 775 (shorter if H3 is 2 lines). This
					entire box is a link and will get a light grey background on hover. The image to the right
					can be an image or a poster frame to a video (be sure to add the standard play button).
					quiaeperum nullupti volorep erchill igentiis unt maximil et et ut id unt lia qui doluptatiis
					atin reium et occusaectum dicitis exceperior soluptatur, sitia pa nihitat empora dellam
					expligent, utaquos quidelecus, cum di asitat a sectia consedi quiaeperum nullupti volorep
					erchill igentiis sant ad qui susam erumenimus conse venimin ullaborrunt dolum dolorecae
					plam estis il molorerum et, et que ad que autempore eaqui consecestem.</p>
				<a class="call-out-link" href="#">Learn More</a>
			</li>
			<li class="bucket">
				<?php print $element->image(__S_GLOB_IMAGES__."/build/campaign-home.gif", "right", NULL, "Campaign Home 370px X 236px"); ?>
				<h3>H3 Goes Here. Try to Keep it to 1 Line. Max Characters (1 line): Approx. 72</h3>
				<p>This is a blurb about news, an event, or a special product feature and how it directly
					relates to the campaign. Max character limit: approx. 775 (shorter if H3 is 2 lines). This
					entire box is a link and will get a light grey background on hover. The image to the right
					can be an image or a poster frame to a video (be sure to add the standard play button).
					quiaeperum nullupti volorep erchill igentiis unt maximil et et ut id unt lia qui doluptatiis
					atin reium et occusaectum dicitis exceperior soluptatur, sitia pa nihitat empora dellam
					expligent, utaquos quidelecus, cum di asitat a sectia consedi quiaeperum nullupti volorep
					erchill igentiis sant ad qui susam erumenimus conse venimin ullaborrunt dolum dolorecae
					plam estis il molorerum et, et que ad que autempore eaqui consecestem.</p>
				<a class="call-out-link" href="#">Learn More</a>
			</li>
			<li class="bucket">
				<?php print $element->image(__S_GLOB_IMAGES__."/build/campaign-home.gif", "right", NULL, "Campaign Home 370px X 236px"); ?>
				<h3>H3 Goes Here. Try to Keep it to 1 Line. Max Characters (1 line): Approx. 72</h3>
				<p>This is a blurb about news, an event, or a special product feature and how it directly
					relates to the campaign. Max character limit: approx. 775 (shorter if H3 is 2 lines). This
					entire box is a link and will get a light grey background on hover. The image to the right
					can be an image or a poster frame to a video (be sure to add the standard play button).
					quiaeperum nullupti volorep erchill igentiis unt maximil et et ut id unt lia qui doluptatiis
					atin reium et occusaectum dicitis exceperior soluptatur, sitia pa nihitat empora dellam
					expligent, utaquos quidelecus, cum di asitat a sectia consedi quiaeperum nullupti volorep
					erchill igentiis sant ad qui susam erumenimus conse venimin ullaborrunt dolum dolorecae
					plam estis il molorerum et, et que ad que autempore eaqui consecestem.</p>
				<a class="call-out-link" href="#">Learn More</a>
			</li>
			<li class="bucket">
				<?php print $element->image(__S_GLOB_IMAGES__."/build/campaign-home.gif", "right", NULL, "Campaign Home 370px X 236px"); ?>
				<h3>H3 Goes Here. Try to Keep it to 1 Line. Max Characters (1 line): Approx. 72</h3>
				<p>This is a blurb about news, an event, or a special product feature and how it directly
					relates to the campaign. Max character limit: approx. 775 (shorter if H3 is 2 lines). This
					entire box is a link and will get a light grey background on hover. The image to the right
					can be an image or a poster frame to a video (be sure to add the standard play button).
					quiaeperum nullupti volorep erchill igentiis unt maximil et et ut id unt lia qui doluptatiis
					atin reium et occusaectum dicitis exceperior soluptatur, sitia pa nihitat empora dellam
					expligent, utaquos quidelecus, cum di asitat a sectia consedi quiaeperum nullupti volorep
					erchill igentiis sant ad qui susam erumenimus conse venimin ullaborrunt dolum dolorecae
					plam estis il molorerum et, et que ad que autempore eaqui consecestem.</p>
				<a class="call-out-link" href="#">Learn More</a>
			</li>
			<li class="bucket">
				<?php print $element->image(__S_GLOB_IMAGES__."/build/campaign-home.gif", "right", NULL, "Campaign Home 370px X 236px"); ?>
				<h3>H3 Goes Here. Try to Keep it to 1 Line. Max Characters (1 line): Approx. 72</h3>
				<p>This is a blurb about news, an event, or a special product feature and how it directly
					relates to the campaign. Max character limit: approx. 775 (shorter if H3 is 2 lines). This
					entire box is a link and will get a light grey background on hover. The image to the right
					can be an image or a poster frame to a video (be sure to add the standard play button).
					quiaeperum nullupti volorep erchill igentiis unt maximil et et ut id unt lia qui doluptatiis
					atin reium et occusaectum dicitis exceperior soluptatur, sitia pa nihitat empora dellam
					expligent, utaquos quidelecus, cum di asitat a sectia consedi quiaeperum nullupti volorep
					erchill igentiis sant ad qui susam erumenimus conse venimin ullaborrunt dolum dolorecae
					plam estis il molorerum et, et que ad que autempore eaqui consecestem.</p>
				<a class="call-out-link" href="#">Learn More</a>
			</li>
		</ul>
	</section>
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