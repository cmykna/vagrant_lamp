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
	$page->pageTitle("Campaign Location Page");
	$page->isFullWidthLayout(1);
	$page->isLocationPage(1);
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
	<div class="location-header">
		<div class="slide">
			<div class="copy-block">
				<h1>Span for Emphasis
				<span>Regular Headline <em>Size</em></span></h1>
				<p>Headline max length: approx. 46 characters. Body copy should be no longer than 270
					characters. Dunt laborro blab ium culliquiate expeles eumqui omnientur? Quissim
					porepudisit mo to volum alibusa piednis ea quatusam accus, temquias doluptatem que
					volo bere plabor am expellaute nimenda plat.</p>
			</div>
			<img src="<?php print __S_GLOB_IMAGES__;?>/build/stslide-fpo.jpg" alt="Image Max: 748px x 348px">
		</div>
		<aside class="two-space-bucket-stacked">
			<ul>
				<li><h2>H2: 18 Char. <em>Max</em></h2>
					<p>Ad copy goes here. Approx. 50 characters max.</p>
					<a class="call-out-link" href="#"><img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/shbk-fpo.png" alt="Image Max: 162px x 80px" /></a></li>
				<li><h2>H2: 18 Char. <em>Max</em></h2>
					<p>Ad copy goes here. Approx. 50 characters max.</p>
					<a class="call-out-link" href="#"><img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/shbk-fpo.png" alt="Image Max: 162px x 80px" /></a></li>
			</ul>
		</aside>
	</div>
	<h2 class="campaign-header">For &lt; Insert State Here &gt; Educators</h2>
	<section class="two-space-bucket">
		<ul>
			<li><div class="bucket">
				<img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/fbk-fpo.jpg" alt="Image Max: 118px x 118px" />
				<h3>H3 Goes Here. Max Characters: 39</h3>
				<p>Body copy goes here. Max character count: approx. 212 (1-line headline) or 168 
					(2-line headline). Grey box only appears on hover. Entire box is a link. Nus
					vercipsamus voluptatis sin re volorru mquatem et sundit voloribus con pre.</p>
					<a class="call-out-link" href="#">Learn More</a>
				</div></li>
			<li><div class="bucket">
				<img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/fbk-fpo.jpg" alt="Image Max: 118px x 118px" />
				<h3>H3 Goes Here. Max Characters: 39</h3>
				<p>Body copy goes here. Max character count: approx. 212 (1-line headline) or 168 
					(2-line headline). Grey box only appears on hover. Entire box is a link. Nus
					vercipsamus voluptatis sin re volorru mquatem et sundit voloribus con pre.</p>
					<a class="call-out-link" href="#">Learn More</a>
				</div></li>
			<li><div class="bucket">
				<img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/fbk-fpo.jpg" alt="Image Max: 118px x 118px" />
				<h3>H3 Goes Here. Max Characters: 39</h3>
				<p>Body copy goes here. Max character count: approx. 212 (1-line headline) or 168 
					(2-line headline). Grey box only appears on hover. Entire box is a link. Nus
					vercipsamus voluptatis sin re volorru mquatem et sundit voloribus con pre.</p>
					<a class="call-out-link" href="#">Learn More</a>
				</div></li>
			<li><div class="bucket">
				<img class="call-out" src="<?php print __S_GLOB_IMAGES__;?>/build/fbk-fpo.jpg" alt="Image Max: 118px x 118px" />
				<h3>H3 Goes Here. Max Characters: 39</h3>
				<p>Body copy goes here. Max character count: approx. 212 (1-line headline) or 168 
					(2-line headline). Grey box only appears on hover. Entire box is a link. Nus
					vercipsamus voluptatis sin re volorru mquatem et sundit voloribus con pre.</p>
					<a class="call-out-link" href="#">Learn More</a>
				</div></li>
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