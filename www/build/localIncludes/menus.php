<?php
/**
 * Microsite Menu Settings
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
 * @package Microsite Templates
 * @subpackage Build/LocalIncludes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	FOR DOCUMENTATION ON MENUS
 *	int.hmheducation.com/system/assets/help/localIncludes/menus.php
 ***************************************************************************
*/
	$headerNav->topNavLink("Program Templates", "two-column-text-only.php");
	//$headerNav->topNavLink("Team / Rep / Author Templates", "two-column-right-img-team.php");
	$headerNav->topNavLink("Campaign Templates", "campaign-products-page.php");
	$headerNav->topEmailLink("Email Us", "campaign-email.php");
	//$headerNav->topNavLink("Contact Us", "contact-us.php");
	
	$leftNav->leftNavItem("programs", "Program Templates<br />Character Limit: 44");
	$leftNav->leftNavItem("programs", "Two Column Program Templates<br />Character Limit: 27");
	$leftNav->leftNavItem("programs", "Two Column: Text Only", "two-column-text-only.php");
	$leftNav->leftNavItem("programs", "Two Column: Centered Large Image and Text", "two-column-cent-img-text.php");
	$leftNav->leftNavItem("programs", "Two Column: Left Image and Text", "two-column-left-img-text.php");
	$leftNav->leftNavItem("programs", "Two Column: Right Image and Text", "two-column-right-img-text.php");
	$leftNav->leftNavItem("programs", "Two Column: Coverflow and Text", "two-column-coverflow.php");
	//$leftNav->leftNavItem("programs", "Two Column: Tabs and Text", "two-column-tabs.php");
	$leftNav->leftNavItem("programs", "One Column Program Templates");
	$leftNav->leftNavItem("programs", "One Column: Text Only", "one-column-text-only.php");
	$leftNav->leftNavItem("programs", "One Column: Centered Large Image and Text", "one-column-cent-img-text.php");
	$leftNav->leftNavItem("programs", "One Column: Left Image and Text", "one-column-left-img-text.php");
	$leftNav->leftNavItem("programs", "One Column: Right Image and Text", "one-column-right-img-text.php");
	$leftNav->leftNavItem("programs", "One Column: Coverflow and Text", "one-column-coverflow.php");
	//$leftNav->leftNavItem("programs", "One Column: Tabs and Text", "one-column-tabs.php");
	$leftNav->leftNavItem("programs", "Misc One Column Templates");
	$leftNav->leftNavItem("programs", "Microsite Home Page", "index.php");
	$leftNav->leftNavItem("programs", "Product Landing Page", "product-landing-page.php");
	//$leftNav->leftNavItem("programs", "Contact Form", "contact-us.php");
	//$leftNav->leftNavItem("programs", "Contact Response", "contact-response.php");
	$leftNav->leftNavItem("programs", "Virtual Sampling Form", "vs-registration.php");
	$leftNav->leftNavItem("programs", "Virtual Sampling Response", "vs-thankyou.php");

	//$leftNav->leftNavItem("teams", "Team / Rep / Author Templates<br />Character Limit: 44");
	//$leftNav->leftNavItem("teams", "Two Column Team Templates Character Limit: 27");
	//$leftNav->leftNavItem("teams", "Two Column: Right Image Team and Text", "two-column-right-img-team.php");
	//$leftNav->leftNavItem("teams", "Two Column: Left Image Team and Text", "two-column-left-img-team.php");
	
	$leftNav->leftNavItem("campaign", "Campaign Templates<br />Character Limit: 44");
	$leftNav->leftNavItem("campaign", "Campaign Location Page", "campaign-location-page.php");
	$leftNav->leftNavItem("campaign", "Campaign Homepage", "campaign-home-page.php");
	$leftNav->leftNavItem("campaign", "Campaign Products Page", "campaign-products-page.php");
	$leftNav->leftNavItem("campaign", "Campaign Events Page", "campaign-events-page.php");
	$leftNav->leftNavItem("campaign", "Campaign Team Page 1", "campaign-team-page1.php");
	$leftNav->leftNavItem("campaign", "Campaign Team Page 2", "campaign-team-page2.php");
	$leftNav->leftNavItem("campaign", "Campaign Email Page", "campaign-email.php");
	$leftNav->leftNavItem("campaign", "Campaign Email Response", "campaign-email-response.php");
	
/*
 ***************************************************************************
 *	SOCIAL NETWORK ICONS FOR FOOTER
 ***************************************************************************
*/
	//$footerSocialNav->topNavSocialLink("Blogger", "#Link");
	//$footerSocialNav->topNavSocialLink("Facebook", "#Link");
	//$footerSocialNav->topNavSocialLink("LinkedIn", "#Link");
	//$footerSocialNav->topNavSocialLink("RSS", "#Link");
	//$footerSocialNav->topNavSocialLink("Scribd", "#Link");
	//$footerSocialNav->topNavSocialLink("Twitter", "#Link");
	//$footerSocialNav->topNavSocialLink("WordPress", "#Link");
	//$footerSocialNav->topNavSocialLink("YouTube", "#Link");
	
	

/* End of file menus.php */
/* Location: build/localIncludes/menus.php */
?>