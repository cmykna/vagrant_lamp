/*
 ***************************************************************************
 *	General JS
 ***************************************************************************
*/

$(document).ready(function() {
	var href = $(location).attr("href");
	var topper = $("<a class=\"top\" href=\""+href+"#top\">Back to Top</a>");
	var tabber = $("<a class=\"tab\" href=\""+href+"#tab\">Back to Tabs</a>");
	// remove toTop from dom
	$("#toTop").remove();
	
	if($(".image-right-lb-s2l").length > 0) {
		$(".image-right-lb-s2l").removeClass().addClass("image-center");
	}
	
	// find coda slider
	if($("#coda-slider").length > 0) {
		if($(".slide-container h1, .slide-container h2, .slide-container p").length > 0) {
			$(".slide-container").each(function() {
				$(this).clone().attr("class", "buckets")
					.insertBefore(".three-space-bucket");
				$(".copy-block, .copy-block-left, .copy-block-right").children().unwrap();
				$(".slide-image").attr("class", "bucket-image");
			});
			
			$(".buckets").each(function() {
				$(this).find(".bucket-image").insertBefore($(this).find("h1, h2"));
			}).wrapAll("<div class=\"slide-wrap\"></div>");
			
			$("<hr>").insertBefore(".three-space-bucket");//.insertAfter(".buffer");
						
			$("#coda-slider-wrapper, .slide-image").remove();
			
			var bucketHeight = $(".buckets").eq(0).height();
			
			$(".slide-wrap").cycle({ 
				fx: "fade",
				height : bucketHeight,
				timeout : 5000,
				speed : 500
			});
		}
	}
	
	// check for text or image in header
	if($("#program-state").length > 0) {
		$(".social-network")
			.insertAfter("#program-state")
			.wrapAll("<ul class=\"social\"></ul>");
		
	}
	if($("#program-logo").length > 0) {
		$(".social-network")
			.insertAfter("#program-logo")
			.wrapAll("<ul class=\"social\"></ul>");
	}
	//$(".buy-now").appendTo("social");
	
	// clean up and redraw top nav
	$("#top-nav li").removeClass("right-split split");
	$("#top-nav ul").addClass("sub-nav").wrapAll("<ul class=\"top-level\"><li></li></ul>");
	//$(".sub-nav").hide();
	$(".top-level").prepend("<li><a href=\"javascript:void(0);\">Menu</a></li>");
	
	// add new menu item to dropdown if on secondary page
	if($("#section-nav").length > 0) {
		$("#top-nav .sub-nav").append("<li><a class=\"scroll\" href=\""+href+"#section-nav\">Scroll to Secondary Menu</a></li>");
		$("a.scroll").smoothScroll();
	}
	
	// draw the new top nav menu
	$(".top-level > li:first-child a").toggle(function() {
		$(this).css({
			"-webkit-border-radius": "4px 4px 0 0"
		});
		$(".sub-nav").css({
			"-webkit-border-radius": "0 4px 4px 4px"	
		}).show();
		$(".sub-nav li a").click(function() {
			$(".sub-nav").hide();
			$(".top-level > li:first-child a").css({
				"-webkit-border-radius": "4px 4px"
			});
		});
	}, function() {
		$(".sub-nav").css({
			"-webkit-border-radius": "4px 4px"
		}).hide();
		$(this).css({
			"-webkit-border-radius": "4px 4px"
		})
	});
	
	$(topper).insertBefore("hr, #footer #contact");
	$("body .top:first").remove();
	$("hr:first").css({
		"color": "#fff",
		"background-color": "#fff"	
	});
	
	//$(".button, .button-alt, .button-opt").wrap("<div class=\"button-wrap\"></div>"); , .buffer .vs-products a.button, .buffer .vs-products a.button-alt, .buffer .vs-products  a.button-opt
	$(".buffer .multi-buttons-right span a").unwrap();
	$(".buffer .right-align a.button, .buffer .right-align a.button-alt, .buffer .right-align a.button-opt").unwrap();
	
	
	$(".buffer a.button, .buffer a.button-alt, .buffer a.button-opt, .home-header a.button, .home-header a.button-alt, .home-header a.button-opt").wrap("<div class=\"button-wrap\"></div>");
	
	$(".buffer .multi-buttons-right .button-wrap").unwrap();
	
	
	$(".slide-wrap .buckets .button, .slide-wrap .buckets .button-alt, .slide-wrap .buckets .button-opt").wrap("<div class=\"slide-button-wrap\"></div>");
	
	if($(".tabNavPrimary").length > 0) {
		$(".tabNavPrimary, .tabContPrimary, .virtual-sampling-page-content hr, .virtual-sampling-page-content .buffer:eq(1), .virtual-sampling-page-content .top, .virtual-catalog-page-content hr, .virtual-catalog-page-content .buffer:eq(1), .virtual-catalog-page-content .top").remove();
	}
	
	//
	if($(".program-item").length > 0) {
		$(".program-item img").removeClass("image-left").addClass("image-center");
		$(this).each(function() {
			$(".program-item").append(topper);
		});
		$(".program-item:last-child").find(".top").remove();
		$(".product-page-content").find(".top:last").remove();
	}
	
	// for rep pages
	$(".vcard").each(function() {
		// move h2
		$(this).find(".fn h2").insertAfter($(this).find(".team-rep-right"));
		$(this).find("p:last").css({
			"margin-bottom" : "18px"
		});
		// for two-column-right-img-team.php
		$(this).find(".image-right-rep").css({"margin-top" : "18px"});
		// for two-column-left-img-team.php
		$(this).find(".book-list").insertAfter($(this).find("p:last-child"));
	});
	
	if($(".tabCont div .top").length > 0) {
		$(".tabCont div .top").remove();
	};
	
	if($(".tabCont").length > 0) {
		//var hTab = $(".h-tabs a").each(function() {
			//$(this).attr("href").replace("#","");
		//});
		$(".h-tabs a").each(function() {
			var hClass = $(this).attr("href").replace("#","");
			$(this).addClass(hClass);
			$(".tabCont #"+hClass+"").each(function() {
				$(".tabCont #"+hClass+"").insertAfter($(".h-tabs a."+hClass+""));
			});
		});
		$(".tabCont").remove();
		//$("<a id=\"tab\"></a>").insertBefore(".tabNav");
		//$(tabber).insertBefore(".tabCont div hr");

		var tab = $('.h-tabs > li > a');	
		var tabContainers = $(".h-tabs > li > div");
		$(tabContainers).not(":first").hide();
		$(tab).each(function () {
			if (this.pathname == window.location.pathname) {
				tab.push(this);
				tabContainers.push($(this.hash).get(0));
			}
		});
		$(tab).click(function () {
			$(tabContainers).hide().filter(this.hash).show();
			$(tab).removeClass("active");
			$(this).addClass("active");
			return false;
		});
		$(tab).filter(window.location.hash ? '[hash=' + window.location.hash + ']' : ':first').click();

		$("a.tab").smoothScroll();
	}
	
	$("#top-nav").show();
	
	$("a.top").smoothScroll();

});







/* ---------- BEGIN: FANCYBOX ENLARGE BUTTON AUTOMATION FOR VIDEO ---------- */
						$('.video-center-lb, .video-left-lb, .video-right-lb').each(function(){
							
							if (!this.complete) {
								// Wait To Load //
                				$(this).load(function(){
									var videoarray = $(this).attr('rel').split('|');
									var videosrc = videoarray[0];
									var videowidth = parseInt(videoarray[1]);
									var videoheight = parseInt(videoarray[2]);
									
									videowidthoffset = 15;
									videoheightoffset = 15;
								
									if ($.browser.msie ) {
										userAgent = $.browser.version;
										userAgent = userAgent.substring(0,userAgent.indexOf('.'));
									
										if(userAgent >= 7) { 
											videowidthoffset = 25;
											videoheightoffset = 25;
										}
									}
								
									$(this).wrap('<a rel="openvideo" href="'+videosrc+'" />');
										
									$('a[rel=openvideo]').fancybox({
										'overlayOpacity'	: .8,
										'showNavArrows'		: false,
										'transitionIn'		: 'none',
										'transitionOut'		: 'none',
										'titleShow'			: false,
										'type'				: 'iframe',
										'width'				: (videowidth+videowidthoffset),
										'height'			: (videoheight+videoheightoffset),
										'margin'			: 0,
										'padding'			: 5,
										'scrolling'			: 'no',
										'centerOnScroll'	: true
									});
                				});
							
        					} else {
								// Already Loaded //
                				var videoarray = $(this).attr('rel').split('|');
								var videosrc = videoarray[0];
								var videowidth = parseInt(videoarray[1]);
								var videoheight = parseInt(videoarray[2]);
									
								videowidthoffset = 15;
								videoheightoffset = 15;
								
								if ($.browser.msie ) {
									userAgent = $.browser.version;
									userAgent = userAgent.substring(0,userAgent.indexOf('.'));
									
									if(userAgent >= 7) { 
										videowidthoffset = 25;
										videoheightoffset = 25;
									}
								}
								
								$(this).wrap('<a rel="openvideo" href="'+videosrc+'" />');
										
								$('a[rel=openvideo]').fancybox({
									'overlayOpacity'	: .8,
									'showNavArrows'		: false,
									'transitionIn'		: 'none',
									'transitionOut'		: 'none',
									'titleShow'			: false,
									'type'				: 'iframe',
									'width'				: (videowidth+videowidthoffset),
									'height'			: (videoheight+videoheightoffset),
									'margin'			: 0,
									'padding'			: 5,
									'scrolling'			: 'no',
									'centerOnScroll'	: true
								});
							}
						});
						
						/* ---------- END: FANCYBOX ENLARGE BUTTON AUTOMATION FOR VIDEO ---------- */
						
						
						
						
						/* ---------- BEGIN: FANCYBOX DISPLAY AUTOMATION FOR VIDEO TEXT LINKS ---------- */
						$('a.video-lb').each(function(){
							
									var videoarray = $(this).attr('rel').split('|');
									var videosrc = videoarray[0];
									var videowidth = parseInt(videoarray[1]);
									var videoheight = parseInt(videoarray[2]);
									var newClass = videoarray[3];
									var linkText = videoarray[4];
									
									videowidthoffset = 15;
									videoheightoffset = 15;
										
									if ($.browser.msie ) {
										userAgent = $.browser.version;
										userAgent = userAgent.substring(0,userAgent.indexOf('.'));
									
										if(userAgent >= 7) { 
											videowidthoffset = 25;
											videoheightoffset = 25;
										}
									}
							
						$(this).replaceWith('<a class="'+newClass+'" rel="openVidText" href="'+videosrc+'">'+linkText+'</a>');
												
							$('a[rel=openVidText]').fancybox({
								'overlayOpacity'	: .8,
								'showNavArrows'		: false,
								'transitionIn'		: 'none',
								'transitionOut'		: 'none',
								'titleShow'			: true,
								'type'				: 'iframe',
								'width'				: (videowidth+videowidthoffset),
								'height'			: (videoheight+videoheightoffset),
								'margin'			: 0,
								'padding'			: 5,
								'scrolling'			: 'no',
								'centerOnScroll'	: true
							});
						});
						
						/* ---------- END: FANCYBOX DISPLAY AUTOMATION FOR VIDEO TEXT LINKS ---------- */