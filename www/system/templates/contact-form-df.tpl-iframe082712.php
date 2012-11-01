<style type="text/css">
	.form iframe {
		border: 0 none;
		height: 600px;
		margin: 20px 0;
		width: 980px;
		overflow: hidden;
	}
</style>
<div class="buffer form">
<?php 


if(($page->isContact == 1) && isset($settings->campaignCode)) { 
	echo '<iframe src="'.__SERVER__.'/forms/index.php?form=email&code="'.$settings->campaignCode.'" scrolling="no" border="0"></iframe>';	
} else if (($page->isVSReg == 1) && isset($settings->campaignCode)) { 
	echo '<iframe src="'.__SERVER__.'/forms/vs-registration/'.$settings->campaignCode.' scrolling="no" border="0"></iframe>';
} else if (($page->isCampaignPage === 1) && 
		   ($page->isCampaignEmail === 1) && 
		   (isset($settings->campaignCode))) { 
	echo '<iframe src="'.__SERVER__.'/forms/index.php?form=email&code="'.$settings->campaignCode.'" scrolling="no" border="0"></iframe>';

} ?>
</div>

