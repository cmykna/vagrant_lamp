<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	if(__SERVER__ === "http://localhost" || __SERVER__ === "http://localhost.hmheducation" || __SERVER__ === "http://dev.hmheducation.com" || __SERVER__ === "http://int.hmheducation.com") {
		$pageTitle = "Microsite Help Pages";
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Cache-Control: private", false);
		header ("Content-Type: text/html");
		include_once __HELP__."/header.php";
		print "\r\n";
?>
<h2>This document area is still under development.</h2>
<h3>ToDo List</h3>
<ol>
	<li>Forms? Response Pages?</li>
	<li>Convert PX to EM</li>
	<li>Clean up Classes</li>
	<li>Allow for multiple links in ad buckets on Home page</li>
	<li>Allow for four space ad buckets on Home page?</li>
	<li>Allow for custom header and footer documents</li>
	<li>Rework Menu Class for leftNav to allow a generated slug</li>
	<li>Framework documentation</li>
	<li>Reorg Documentation Site</li>
</ol>
<h3>Bug/Fix List</h3>
<ol>
	<li></li>
</ol>
<h3>Error List</h3>
<ol>
	<li></li>
</ol>


		
<?php
		print "\r\n";		
		include_once __HELP__."/footer.php";
	} else {
		die;	
	}
?>


