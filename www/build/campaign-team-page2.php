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
	$page->pageTitle("Campaign Team Page 2");
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
<div class="campaign-sales">
	<div class="buffer">
		<h1>&lt; Insert State Name &gt; Sales Team</h1>
		<h2>&lt; Insert County Name &gt;</h2>
		<ul class="unstyled">
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
					<span class="fn n">
						<h3>
							<span class="given-name">Firstname</span> 
							<span class="additional-name"></span> 
							<span class="family-name">Lastname</span>
						</h3>
					</span>
					<p class="title">Job Title</p>
					<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
					<p class="tel">555-555-5555</p>
				</div></li>
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
				<span class="fn n">
					<h3>
						<span class="given-name">Firstname</span> 
						<span class="additional-name"></span> 
						<span class="family-name">Lastname</span>
					</h3>
				</span>
				<p class="title">Job Title</p>
				<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
				<p class="tel">555-555-5555</p>
			</div></li>
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
				<span class="fn n">
					<h3>
						<span class="given-name">Firstname</span> 
						<span class="additional-name"></span> 
						<span class="family-name">Lastname</span>
					</h3>
				</span>
				<p class="title">Job Title</p>
				<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
				<p class="tel">555-555-5555</p>
			</div></li>
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
				<span class="fn n">
					<h3>
						<span class="given-name">Firstname</span> 
						<span class="additional-name"></span> 
						<span class="family-name">Lastname</span>
					</h3>
				</span>
				<p class="title">Job Title</p>
				<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
				<p class="tel">555-555-5555</p>
			</div></li>
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
				<span class="fn n">
					<h3>
						<span class="given-name">Firstname</span> 
						<span class="additional-name"></span> 
						<span class="family-name">Lastname</span>
					</h3>
				</span>
				<p class="title">Job Title</p>
				<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
				<p class="tel">555-555-5555</p>
			</div></li>
			<li><div id="hcard USE FIRST NAME AND LAST NAME OF PERSON HERE" class="vcard">
				<span class="fn n">
					<h3>
						<span class="given-name">Firstname</span> 
						<span class="additional-name"></span> 
						<span class="family-name">Lastname</span>
					</h3>
				</span>
				<p class="title">Job Title</p>
				<a class="email" href="mailto:#">firstname.lastname@hmhpub.com</a>
				<p class="tel">555-555-5555</p>
			</div></li>
		</ul>
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
 *	End of file: Microsite Two Column Template
 ***************************************************************************
*/
?>