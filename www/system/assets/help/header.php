<!DOCTYPE html> 
<html> 
    <head>
        <meta charset="utf-8" />
        <title><?php print $pageTitle; ?></title>
		<!--[if lt IE 9]>
		<script src="<?php print __S_JS__; ?>/html5.js"></script>
		<![endif]-->
		<link href="<?php print __S_ICONS__; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<script src="<?php print __S_JS__; ?>/jquery-1.6.4.js" type="text/javascript"></script>
		<script src="<?php print __S_JS__; ?>/jquery.easing.1.3.js" type="text/javascript"></script>
		<script src="<?php print __S_JS__; ?>/jquery.ui.totop.js" type="text/javascript"></script>
		<script src="<?php print __S_JS__; ?>/jquery.smooth-scroll.js" type="text/javascript"></script>
		<link href="<?php print __S_CSS__; ?>/base.css.php?df=/help/" rel="stylesheet" type="text/css" />
		<link href="<?php print __S_JS__; ?>/prettify/prettify.css" rel="stylesheet" type="text/css" />
		<script src="<?php print __S_JS__; ?>/prettify/prettify.js" type="text/javascript"></script>
		<script src="<?php print __S_JS__; ?>/header.js.php" type="text/javascript"></script>
    </head>
	<body id="help" onload="prettyPrint();">
		<header id="brand">
			<div id="brand-container">
				<span><a class="logo" href="<?php print __SERVER__; ?>" title="HMHEducation.com">HMHEducation.com</a></span>	
			</div>
		</header>
		<a id="top">&nbsp;</a>
		<section id="background-wrapper">
			<header id="header">
				<div id="program-state"><?php print (__FILE_NAME__ != "help.php") ? "<a href=\"".__S_HELP__."/help.php\">Microsite Help Pages</a>" : "Microsite Help Pages"; ?></div>	
				<nav id="top-nav">
					<ul>
						<li class="right-split"><a href="<?php print __S_HELP__; ?>/help.php">Home</a></li>
						<li class="right-split"><a href="<?php print __S_HELP__; ?>/assets.php">Readme Files</a></li>
						<li class="right-split"><a href="<?php print __S_HELP__; ?>/microsite-creation.php">Microsite Creation</a></li>
						<li class="right-split"><a href="<?php print __S_HELP__; ?>/build/one-column-home-page.php">Page Templates</a></li>
						<li class="split"><a href="<?php print __S_HELP__; ?>/localIncludes/buckets.php">Help on Default Attributes</a></li>
					</ul>
				</nav>
			</header>
			<section id="content-area">	
				<section id="content-two-col">
					<section id="col-one">
						<section id="content">
							<div class="buffer">
								<h1><?php print $pageTitle; ?></h1>