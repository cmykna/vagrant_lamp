<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache"); // HTTP/1.0
	header('Content-type: text/html; charset=utf-8');

	$elapsedStart = microtime();
	$localAndInt = array('http://localhost', 'http://localhost.hmheducation', 'http://hmheducation', 'http://int.hmheducation.com');
	
	//pull $countryBrowsingFrom and $stateBrowsingFrom
	if(!isset($serverDocRootInc)) $serverDocRootInc = $_SERVER["DOCUMENT_ROOT"];
	if (file_exists("$serverDocRootInc/utils/state/getState.php")) {
		include("$serverDocRootInc/utils/state/getState.php");
	} else {
		$record = NULL;
	}
?>
<!DOCTYPE html> 
<html> 
	<head>
		<meta charset="UTF-8">
		
<?php if(preg_match("/\biPhone\b/", __AGENT__) || preg_match("/\biPod\b/", __AGENT__) || preg_match("/\bAndroid\b/", __AGENT__)) { ?>
		<meta name="viewport" content="user-scalable=no, width=320">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
<?php } ?>

		<title><?php print $page->pageTitle; ?></title>
		<?php
			print $settings->gaCompiled
				 .($settings->gaLinkTracker == 1 ? $settings->gaLinkCompiled : NULL)
				 .$page->hasMeta
				 .$settings->documentBase
				 ."\r\n";
		?>
		<script src="http://fast.fonts.com/jsapi/5aa1275c-449b-424e-8708-d551c87e786c.js"></script>
		<!--[if lt IE 9]>
		<script src="<?php print __S_JS__; ?>/html5.js"></script>
		<![endif]-->
		<script src="<?php print __S_JS__; ?>/jquery-1.7.2.js"></script>
		<script src="<?php print __S_JS__; ?>/jquery.easing.1.3.js"></script>
		<script src="<?php print __S_JS__; ?>/jquery.ui.totop.js"></script>
		<script src="<?php print __S_JS__; ?>/fancybox-1.3.4/jquery.fancybox-1.3.4.js"></script>
		<script src="<?php print __S_JS__; ?>/jquery.smooth-scroll.js"></script>
		<link href="<?php print __S_JS__; ?>/fancybox-1.3.4/jquery.fancybox-1.3.4.css" rel="stylesheet">
		<link href="<?php print __SERVER__.$_SERVER['SCRIPT_NAME']; ?>" rel="canonical">


		<?php
			print "<!-- codaInclude -->".$coda->codaInclude
				 ."<!-- hmhIcon -->".$settings->hmhIcon
				 ."<!-- favIcon -->".$settings->favIcon	
				 ."<!-- masterCSS -->".$settings->masterCSS
				 ."<!-- codaSettingsScript -->".$coda->codaSettingsScript
				 ."<!-- CoverflowInclude -->".$coverflow->CoverflowInclude
				 ."\r\n";
		?>
		<!-- skeleton css -->

		<!-- Start Visual Website Optimizer Asynchronous Code -->
		<script type='text/javascript'>
			var _vwo_code=(function(){
			var account_id=17563,
			settings_tolerance=2000,
			library_tolerance=1500,
			use_existing_jquery=false,
			// DO NOT EDIT BELOW THIS LINE
			f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='*{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
		</script>
		<!-- End Visual Website Optimizer Asynchronous Code -->
<?php
	print($page->isVSReg == 1 || $page->isContact == 1) ? "\t\t<script src=\"".__S_JS__."/jquery.validate.min.js\"></script>\r\n": NULL;
	print($page->hasRefresh == 1) ? "\t\t<script src=\"".__S_JS__."/jquery.countdown.min.js\"></script>\r\n\t\t<script src=\"".__S_JS__."/timer.js\"></script>\r\n\t\t<meta http-equiv=\"refresh\" content=\"5;url=".$settings->docFolder."\" />\r\n": NULL;
	print($settings->docFolder == "/virtualsampling/" || $settings->docFolder == "/virtual-catalog/") ? "\t\t<script src=\"".__S_JS__."/jquery.jcarousel.min.js\"></script>\r\n" : NULL ?>
	<!-- Concatenate and display header JS -->
	<script src="<?php print __S_JS__; ?>/header.js.php?df=<?php print $settings->docFolder; ?>"></script>
	<?php if ($settings->docFolder === '/forms/'): ?>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
	<script src="<?php print __S_JS__; ?>/desktop/form.js?v2"></script>
	<?php endif ?>
	</head>
<?php print ($coda->hasCoda == 1) ? "\t<body class=\"coda-slider-no-js\"".$page->body.">\r\n" : "\t<body ".$page->body.">\r\n"; ?>
<?php
	if(in_array(__SERVER__, $localAndInt, true)) {
		if($settings->report || $page->report) {
	?>
		<section class="error-report">
			<?php print $settings->report
						."\r\n"
						.$page->report
						."\r\n"
						.$coda->report
						."\r\n"
						.$slide->report
						."\r\n"
						.$bucket->report
						."\r\n"
						.$coverflow->report
						."\r\n";
			?>
		</section>
<?php
		}
?>
		<section id="development">
			<p><em><em>NOTICE:</em></em> You are currently viewing this page in the development environment.
			This is for developmental test purposes, if your site is broken, please use our certification server 
			<em><em><a href="//cert.hmheducation.com<?php print $settings->docFolder.__FILE_NAME__; ?>">//cert.hmheducation.com<?php print $settings->docFolder.__FILE_NAME__; ?></a></em></em>
			for the pre-production version of your site. If your site is not on certification, then your site is still under development.</p>
			<p class="center"><em><em><em>This notice bar does not display on Cert or Production Servers.</em></em></em></p>
		</section>
<?php } ?>
		<noscript>
			<div id="no-javascript">
				<p id="javascript-error"><em><em>WARNING:</em></em> Your browser currently has Javascript disabled or does not support Javascript. Please enable Javascript or update your browser for a richer user experience.</p>
			</div>
		</noscript>
<?php
	if(__PLATFORM__ != "desktop") { ?>
		<header id="brand">
			<div id="brand-container">
				<div id="search">
					<form action="/search?" >
						<input type="text"  name="searchText" value="">
						<input type="image" id="searchButton" name="submit" src="<?php print __S_BUTTONS__; ?>/btn-search-go.png" alt="Go" value="submit" />
					</form>
				</div>
				<span><a class="logo" href="/" title="HMHEducation.com">HMHEducation.com</a></span>
			</div>
		</header>
<?php } else { include "../system/templates/mega-menu.tpl.php"; } ?>
		<a id="top">&nbsp;</a>
		<section id="background-wrapper">
		<?php if($page->isProductLandingPage == 0) {
				if($page->isLocationPage == 0) { ?>
			<header id="header">
				<?php print $settings->programState; ?>	
				<?php if ($menuStyle == 1):
					include "localIncludes/staticmenu.inc.php";
				else: ?>
					<nav id="top-nav">
						<?php
							// $contents_topNav = $headerNav->topNav();
							// if($page->isCampaignPage == 0) {	
							// 	$pattern = '/<li class="email"><a href="mailto:[^"]+" title="Email Us"><img src="[^+]+" alt="Email Us"><\/a><\/li>/';
							// 	$contents_topNav = preg_replace($pattern, "", $contents_topNav);
							// }
							//print $contents_topNav;
						?>		
					</nav>
				<?php endif ?>
			</header>
		<?php } } ?>
			<?php print ($page->isFullWidthLayout == 1) ? "\r\n\t\t\t<div id=\"container\">\r\n\t\t\t\t<section id=\"content\">" : "\r\n\t\t\t<div id=\"content-area\">\r\n\t\t\t\t<div id=\"content-two-col\">\r\n\t\t\t\t\t<div id=\"col-one\">\r\n\t\t\t\t\t\t<section id=\"content\">";
			print "\r\n<!--// Begin: Microsite ".$settings->docFolder.__FILE_NAME__." Data Area //-->\r\n"; ?>
