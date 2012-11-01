<?php
		print "\r\n<!--// End: Microsite ".$settings->docFolder.__FILE_NAME__." Data Area //-->\r\n";
		print ($page->isFullWidthLayout == 1) ? "\r\n\t\t\t\t</section>\r\n\t\t\t</div>\r\n" : "\r\n\t\t\t\t\t\t</section>\r\n\t\t\t\t\t</div>\r\n\t\t\t\t\t<aside id=\"col-two\">".$leftNav->leftNav()."\r\n\t\t\t\t\t</aside>\r\n\t\t\t\t</div>\r\n\t\t\t</div>\r\n"; ?>
		</section>
		<?php print ($page->trademark != NULL) ? "\r\n\t\t<small class=\"trademark-credits\">".$page->trademark."</small>\r\n" : (($settings->trademark != NULL) ? "\r\n\t\t<small class=\"trademark-credits\">".$settings->trademark."</small>\r\n" : "\r\n"); ?>
		<footer id="footer">
			<nav id="social-media">
				<ul>
<?php if($footerSocialNav->social() != NULL) { print $footerSocialNav->social(); } else { ?>
					<li><a rel="external" href="http://www.facebook.com/HMHeducation"><img src="<?php print __S_ICONS__; ?>/facebook.png" alt="Follow us on Facebook" /></a></li>
					<li><a rel="external" href="http://www.twitter.com/hmheducation"><img src="<?php print __S_ICONS__; ?>/twitter.png" alt="Follow us on Twitter" /></a></li>
<?php } ?>		
				</ul>
			</nav>
			<nav id="contact">
				<ul>
<?php if($settings->setContact != NULL) { ?>
					<li><a rel="external" href="<?php print $settings->setContact; ?>">Contact Us</a></li>
<?php } ?>
					<li><a rel="external" href="http://customercare.hmhco.com/contactus/customer_service/index.html">Customer Care</a></li>
				</ul>
			</nav>
			<nav id="terms-copyright">
				<ul>
					<li><small><a rel="external" href="http://www.hmhco.com/terms-and-conditions.html">Terms &amp; Conditions of Use</a></small></li>
					<li><small><a rel="external" href="http://www.hmhco.com/privacy-policy.html">Privacy Policy</a></small></li>
					<li><small><a rel="external" href="http://www.hmhco.com/privacy-policy.html#childrensPrivacyPolicy">Children's Privacy Policy</a></small></li>
					<li><small>Copyright &copy; <?php print date('Y'); ?> Houghton Mifflin Harcourt. All rights reserved.</small></li>	
				</ul>
			</nav>
		</footer>
		<script src="<?php print __S_JS__; ?>/footer.js.php?df=<?php print $settings->docFolder; ?>"></script>
		<?php 
		if ($settings->navStyle == "navtree") {
			print '<script src="'.__S_JS__.'/menu-variants.js"></script>';
		} 
		?>
<?php
	if(in_array(__SERVER__, $localAndInt, true)) {
		$elapsedEnd = microtime();
		$elapsedTotal = "\t\t<p class=\"time\">".substr(($elapsedEnd - $elapsedStart), 0, 5)." Seconds</p>\r\n";
		print $elapsedTotal;
	} else { ?>
		<script src="<?php print __S_JS__; ?>/elqNow/elqCfg.js"></script>
		<script src="<?php print __S_JS__; ?>/elqNow/elqImg.js"></script>
		<!--BEGIN QUALTRICS SITE INTERCEPT-->
		<script type='text/javascript'>
			var SI_cJ6mH1yR6nLUhed_ed='';
			var SI_cJ6mH1yR6nLUhed_url='http://siteintercept.qualtrics.com/WRSiteInterceptEngine/?Q_SIID=SI_cJ6mH1yR6nLUhed' + SI_cJ6mH1yR6nLUhed_ed;
			var SI_cJ6mH1yR6nLUhed_sampleRate=100;
			var q_si_f = function(){if (Math.random() >= SI_cJ6mH1yR6nLUhed_sampleRate/100)return; var s=document.createElement('script');s.type='text/javascript';s.src=SI_cJ6mH1yR6nLUhed_url+'&Q_LOC='+encodeURIComponent(window.location.href);if(document.body)document.body.appendChild(s);};try{if (window.addEventListener){window.addEventListener('load',q_si_f,false);}else if (window.attachEvent){r=window.attachEvent('onload',q_si_f);}else {}}catch(e){}</script><div id='SI_cJ6mH1yR6nLUhed'><!--DO NOT REMOVE-CONTENTS PLACED HERE--></div>
			<noscript><a target="_blank" href="http://www.qualtrics.com/enterprise-feedback-management">Enterprise Feedback Management</a><br/><a target="_blank" href="http://www.qualtrics.com/survey-software">Survey Software</a><br/></noscript>
		<!--END SITE INTERCEPT-->
<?php 
	}
?>
<?php 	print "\r\n\t".($settings->heatMapTracker == 1) ? $settings->heatMapCompiled : NULL."\r\n"; ?>
		<script>
			$("body").addClass("legacy");
		</script>
	</body>
</html>