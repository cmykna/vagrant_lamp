<?php
/**
 * Microsite Header Js
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System/Assets/JS
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
/*
 ***************************************************************************
 *	Include Global Defines
 ***************************************************************************
*/
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
/*
 ***************************************************************************
 *	Set MIME type to JS and Set Charset
 ***************************************************************************
*/
	header ("Content-Type: text/javascript");
	print "\r\n\r\n";
/*
 ***************************************************************************
 *	Make Buckets and Slides Clickable
 ***************************************************************************
*/
	if(!preg_match("/\biPhone\b/", __AGENT__) || !preg_match("/\biPod\b/", __AGENT__) || !preg_match("/\bAndroid\b/", __AGENT__)) {
		include_once "desktop/slides-buckets.js";
		print "\r\n\r\n";
	}
/*
 ***************************************************************************
 *	Include form JS for /forms
 ***************************************************************************
*/

?>

if($(".three-space-bucket").length > 0) {
	$(".three-space-bucket li").each(function() {
		var getLink = $(this).find("a.call-out-link").attr("href");
        var getRel = $(this).find("a.call-out-link").attr("rel");
		if ((getLink != undefined || getRel != undefined) || (getLink != null || getRel  != undefined)) {
			getRel = getRel+"";
			var getH = $(this).height();
			var getW = $(this).width();
				if(getRel.indexOf("|") != -1) {        
					var dimArray = getRel.split("|");
					var vidWidth = parseInt(dimArray[0]);
					var vidHeight = parseInt(dimArray[1]);
				}
			if(getRel && (getRel.indexOf("|") == -1)) {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\" rel=\""+getRel+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\" rel=\""+getRel+"\"/></li>").children().unwrap();     
			} else if(getRel && (getRel.indexOf("|") != -1)) {
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap-video\" href=\""+getLink+"\"/></li>").children().unwrap();
				$(document).ready(function() {
					if($.browser.msie) {
						vidWidth += 3;
						vidHeight += 8;
					}
					$("a.bucket-wrap-video").fancybox({
						'overlayOpacity'	: .8,
						'showNavArrows'		: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'titleShow'			: false,
						'type'				: 'iframe',
						'width'				: vidWidth,
						'height'			: vidHeight,
						'margin'			: 0,
						'padding'			: 5,
						'scrolling'			: 'no',
						'centerOnScroll'	: true,
						'autoDimensions'	: true
					});
				});
			} else {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\"/></li>").children().unwrap();
			}
			$(".list h3, .list p, .list a").css({"text-decoration":"none"});
			$(".bucket-wrap").css({
				"height" : getH,
				"width"	 : getW,
				"position" : "absolute",
				"top" : "0px",
				"left": "0px",
				"curser" : "pointer"
			});
		}
	});
}

if($(".two-space-bucket-stacked").length > 0) {
	$(".two-space-bucket-stacked li").each(function() {
		var getLink = $(this).find("a.call-out-link").attr("href");
        var getRel = $(this).find("a.call-out-link").attr("rel");
		if ((getLink != undefined || getRel != undefined) || (getLink != null || getRel  != undefined)) {
			getRel = getRel+"";
			var getH = $(this).height();
			var getW = $(this).width();
				if(getRel.indexOf("|") != -1) {        
					var dimArray = getRel.split("|");
					var vidWidth = parseInt(dimArray[0]);
					var vidHeight = parseInt(dimArray[1]);
				}
			if(getRel && (getRel.indexOf("|") == -1)) {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\" rel=\""+getRel+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\" rel=\""+getRel+"\"/></li>").children().unwrap();     
			} else if(getRel && (getRel.indexOf("|") != -1)) {
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap-video\" href=\""+getLink+"\"/></li>").children().unwrap();
				$(document).ready(function() {
					if($.browser.msie) {
						vidWidth += 3;
						vidHeight += 8;
					}
					$("a.bucket-wrap-video").fancybox({
						'overlayOpacity'	: .8,
						'showNavArrows'		: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'titleShow'			: false,
						'type'				: 'iframe',
						'width'				: vidWidth,
						'height'			: vidHeight,
						'margin'			: 0,
						'padding'			: 5,
						'scrolling'			: 'no',
						'centerOnScroll'	: true,
						'autoDimensions'	: true
					});
				});
			} else {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\"/></li>").children().unwrap();
			}
			$(".list h2, .list p, .list a").css({"text-decoration":"none"});
			$(".bucket-wrap").css({
				"height" : getH,
				"width"	 : getW,
				"position" : "absolute",
				"top" : "0px",
				"left": "0px",
				"curser" : "pointer"
			});
		}
	});
}

if($(".two-space-bucket").length > 0) {
	$(".two-space-bucket li").each(function() {
		var getLink = $(this).find("a.call-out-link").attr("href");
        var getRel = $(this).find("a.call-out-link").attr("rel");
		if ((getLink != undefined || getRel != undefined) || (getLink != null || getRel  != undefined)) {
			getRel = getRel+"";
			var getH = $(this).height();
			var getW = $(this).width();
				if(getRel.indexOf("|") != -1) {        
					var dimArray = getRel.split("|");
					var vidWidth = parseInt(dimArray[0]);
					var vidHeight = parseInt(dimArray[1]);
				}
			if(getRel && (getRel.indexOf("|") == -1)) {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\" rel=\""+getRel+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\" rel=\""+getRel+"\"/></li>").children().unwrap();     
			} else if(getRel && (getRel.indexOf("|") != -1)) {
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap-video\" href=\""+getLink+"\"/></li>").children().unwrap();
				$(document).ready(function() {
					if($.browser.msie) {
						vidWidth += 3;
						vidHeight += 8;
					}
					$("a.bucket-wrap-video").fancybox({
						'overlayOpacity'	: .8,
						'showNavArrows'		: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'titleShow'			: false,
						'type'				: 'iframe',
						'width'				: vidWidth,
						'height'			: vidHeight,
						'margin'			: 0,
						'padding'			: 5,
						'scrolling'			: 'no',
						'centerOnScroll'	: true,
						'autoDimensions'	: true
					});
				});
			} else {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\"/>");
				$(this).wrap("<li class=\"list\"><a class=\"bucket-wrap\" href=\""+getLink+"\"/></li>").children().unwrap();
			}
			$(".list h3, .list p, .list a").css({"text-decoration":"none"});
			$(".bucket-wrap").css({
				"height" : getH,
				"width"	 : getW,
				"position" : "absolute",
				"top" : "0px",
				"left": "0px",
				"curser" : "pointer"
			});
		}
	});
}

if($(".one-space-bucket").length > 0) {
	$(".one-space-bucket .bucket").each(function() {
		var getLink = $(this).find("a.call-out-link").attr("href");
        var getRel = $(this).find("a.call-out-link").attr("rel");
		if ((getLink != undefined || getRel != undefined) || (getLink != null || getRel  != undefined)) {
			getRel = getRel+"";
			var getH = $(this).height();
			var getW = $(this).width();
				if(getRel.indexOf("|") != -1) {        
					var dimArray = getRel.split("|");
					var vidWidth = parseInt(dimArray[0]);
					var vidHeight = parseInt(dimArray[1]);
				}
			if(getRel && (getRel.indexOf("|") == -1)) {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\" rel=\""+getRel+"\"/>");
				$(this).wrap("<div class=\"bucket\"><a class=\"bucket-wrap\" href=\""+getLink+"\" rel=\""+getRel+"\"/></div>").children().unwrap();     
			} else if(getRel && (getRel.indexOf("|") != -1)) {
				$(this).wrap("<div class=\"bucket\"><a class=\"bucket-wrap-video\" href=\""+getLink+"\"/></div>").children().unwrap();
				$(document).ready(function() {
					if($.browser.msie) {
						vidWidth += 3;
						vidHeight += 8;
					}
					$("a.bucket-wrap-video").fancybox({
						'overlayOpacity'	: .8,
						'showNavArrows'		: false,
						'transitionIn'		: 'none',
						'transitionOut'		: 'none',
						'titleShow'			: false,
						'type'				: 'iframe',
						'width'				: vidWidth,
						'height'			: vidHeight,
						'margin'			: 0,
						'padding'			: 5,
						'scrolling'			: 'no',
						'centerOnScroll'	: true,
						'autoDimensions'	: true
					});
				});
			} else {
				//$(this).find('img.call-out').wrap("<a href=\""+getLink+"\"/>");
				$(this).wrap("<div class=\"bucket\"><a class=\"bucket-wrap\" href=\""+getLink+"\"/></div>").children().unwrap();
			}
			$(".bucket h3, .bucket p, .bucket a").css({"text-decoration":"none"});
			$(".bucket-wrap").css({
				"height" : getH,
				"width"	 : getW,
				"position" : "absolute",
				"top" : "18px",
				"left": "18px",
				"curser" : "pointer"
			});
			$(".bucket-wrap .call-out-link").css({"left": "0px"});
		}
	});
}
				
function AltToTitle() { 
	var imgs=document.getElementsByTagName("img"); 
	for (var i = 0; i < imgs.length; i++) { 
		if(!imgs[i].title || imgs[i].title == ''){ 
			$(imgs[i]).attr('title', imgs[i].alt);
		} 
	} 
}
AltToTitle();

$(document).ready(function() {
	$("a[rel=external]").bind('click', function(event){
		window.open(this.href); return false; });
	$("area[rel=external]").bind('click', function(event){
		window.open(this.href); return false; });
	$("a[rel=product-tour]").fancybox({
        'padding'			: 5,
        'overlayOpacity'	: .8,
        'scrolling'			: 'no',
        'width'				: 880,
        'height'			: 550,
        'showNavArrows'		: false,
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'type'				: 'iframe', 
        'scrolling'			: 'no'
    });
});
<?php
/*
 ***************************************************************************
 *	Local JS
 ***************************************************************************
*/	
	if(isset($_GET['df'])) {
		print "\r\n\r\n";
 		include_once $_SERVER['DOCUMENT_ROOT'].$_GET['df']."localIncludes/customFooter.js";
	}
?>