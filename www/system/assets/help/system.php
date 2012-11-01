<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	if(__SERVER__ === "http://localhost" || __SERVER__ === "http://localhost.hmheducation" || __SERVER__ === "http://dev.hmheducation.com" || __SERVER__ === "http://int.hmheducation.com") {
		$pageTitle = "System Readme";
		$file = __SYS__."/README.php";
		$fsize = filesize($file);
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Cache-Control: private", false);
		header ("Content-Type: text/html");
		$handle = fopen($file, "r");
		$contents = fread($handle, $fsize);
		//ob_clean(); 
		flush();
		fclose($handle);
		include_once __HELP__."/header.php";
		print "\r\n";
?>
<code class="prettyprint linenums"><?php print htmlentities($contents); ?></code>	
<?php
	print "\r\n";	
	include_once __HELP__."/footer.php";
	} 
	else {
		die;	
	}
?>