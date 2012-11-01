<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache"); // HTTP/1.0
	header('Content-type: text/html; charset=utf-8');

	$elapsedStart = microtime();
	$localAndInt = array('http://localhost', 'http://localhost.hmheducation', 'http://hmheducation', 'http://int.hmheducation.com');
	
	// pull geolocation data
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
		
<?php if(preg_match("/\biPhone\b/", __AGENT__) || preg_match("/\biPod\b/", __AGENT__) || preg_match("/\bAndroid\b/", __AGENT__)): ?>
		<meta name="viewport" content="user-scalable=no, width=320">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
<?php endif ?>
<title><?php print $page->pageTitle; ?></title>
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

<?php print $settings->masterCSS; ?>

<!-- skeleton css -->
<?php
/*
<!-- Start Visual Website Optimizer Asynchronous Code -->
<script type='text/javascript'>
	// var _vwo_code = (function(){
	// 	var account_id=17563,
	// 	settings_tolerance=2000,
	// 	library_tolerance=1500,
	// 	use_existing_jquery=false,
	// 	// DO NOT EDIT BELOW THIS LINE
	// 	f=false,
	// 	d=document;
	// 	return { 
	// 		use_existing_jquery: function () {
	// 			return use_existing_jquery;
	// 		}
	// 	, library_tolerance: function () {
	// 		return library_tolerance;
	// 	}
	// 	, finish: function () {
	// 		if(!f) { 
	// 			f=true;
	// 			var a = d.getElementById('_vis_opt_path_hides');
	// 			if (a) 
	// 				a.parentNode.removeChild(a);
	// 		}
	// 	}
	// 	, finished: function () {
	// 		return f;
	// 	},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='*{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
</script>
<!-- End Visual Website Optimizer Asynchronous Code -->
*/
?>
<!-- Start Visual Website Optimizer Asynchronous Code -->
<script type='text/javascript'>
	var _vwo_code = (function () {
	    var account_id = 17563,
	        settings_tolerance = 2000,
	        library_tolerance = 1500,
	        use_existing_jquery = true,
	        // DO NOT EDIT BELOW THIS LINE
	        f = false,
	        d = document;
	    return {
	        use_existing_jquery: function () {
	            return use_existing_jquery;
	        },
	        library_tolerance: function () {
	            return library_tolerance;
	        },
	        finish: function () {
	            if (!f) {
	                f = true;
	                var a = d.getElementById('_vis_opt_path_hides');
	                if (a) a.parentNode.removeChild(a);
	            }
	        },
	        finished: function () {
	            return f;
	        },
	        load: function (a) {
	            var b = d.createElement('script');
	            b.src = a;
	            b.type = 'text/javascript';
	            b.innerText;
	            b.onerror = function () {
	                _vwo_code.finish();
	            };
	            d.getElementsByTagName('head')[0].appendChild(b);
	        },
	        init: function () {
	            settings_timer = setTimeout('_vwo_code.finish()', settings_tolerance);
	            _vwo_code.load('//dev.visualwebsiteoptimizer.com/j.php?a=' + account_id + '&u=' + encodeURIComponent(d.URL) + '&r=' + Math.random());
	            var a = d.createElement('style'),
	            	o = (a.style.opacity === undefined) ? 
	            		'filter:alpha(opacity=0) !important;' : 'opacity:0 !important;';
	                b = '*{' + o + 'background:none !important;}',
	                h = d.getElementsByTagName('head')[0];
	            a.setAttribute('id', '_vis_opt_path_hides');
	            a.setAttribute('type', 'text/css');
	            if (a.styleSheet) a.styleSheet.cssText = b;
	            else a.appendChild(d.createTextNode(b));
	            h.appendChild(a);
	            return settings_timer;
	        }
	    };
	}());
	_vwo_settings_timer = _vwo_code.init();
	
	</script>

<!-- End Visual Website Optimizer Asynchronous Code -->

<!-- Concatenate and display header JS -->
<script src="<?php print __S_JS__; ?>/header.js.php?df=<?php print $settings->docFolder; ?>"></script>
<?php if ($settings->docFolder === '/forms/'): ?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<?php 
function versionJS($file) {
	if (file_exists($file)) {
		return substr(md5($file), 0, 8);
	} else {
		return '0';
	}
}
$ver = versionJS($_SERVER['DOCUMENT_ROOT'].'/system/assets/js/desktop/form.js');
?>
<script src="<?php print __S_JS__; ?>/desktop/form.js?v=<?php echo $ver; ?>"></script>
<?php endif ?>
</head>
<body>
<noscript>
	<div id="no-javascript">
		<p id="javascript-error"><em><em>WARNING:</em></em> Your browser currently has Javascript disabled or does not support Javascript. Please enable Javascript or update your browser for a richer user experience.</p>
	</div>
</noscript>

