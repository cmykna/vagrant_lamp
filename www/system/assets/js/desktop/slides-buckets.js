/*
 ***************************************************************************
 *	Buckets and Slides
 ***************************************************************************
*/
$(document).ready(function() {
	if($(".slide-container").length > 0) {
		$(".slide-container").each(function() {
				
				if($(this).find("a.button, a.button-opt, a.button-alt, a.app-store").length > 0) {
					//alert("link found");
					
					var getLink = $(this).find("a.button, a.button-opt, a.button-alt, a.app-store").attr("href");
					var getRel = $(this).find("a.button, a.button-opt, a.button-alt, a.app-store").attr("rel");
					
					if ((getLink != "#" || getLink != undefined) && getRel && getRel.indexOf("|") != -1) {
						
						var dimArray = getRel.split("|");
						var vidWidth = parseInt(dimArray[0]);
						var vidHeight = parseInt(dimArray[1]);
						
						$(this).wrap("<a class=\"slide-wrap-video\" href=\""+getLink+"\"/>");
						$(document).ready(function() {
							if($.browser.msie) {
								vidWidth += 3;
								vidHeight += 8;
							}
							$("a.slide-wrap-video").fancybox({
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
					} else if((getLink != "#" || getLink != undefined) && getRel && (getRel === "external")) {
						$(this).wrap("<a rel=\"external\" href=\""+getLink+"\"/>");
					} else if((getLink != "#" || getLink != undefined) && getRel && (getRel === "product-tour")) {
						$(this).wrap("<a rel=\"product-tour\" href=\""+getLink+"\"/>");	
						
					} else {
						$(this).wrap("<a href=\""+getLink+"\"/>");
					}
				} //else {
					//alert("link not found");
				//}

		});	
	}
	/*if($(".three-space-bucket").length > 0) {
		$(".three-space-bucket li").each(function() {
			var getLink = $(this).find("a.call-out-link").attr("href");
			var getRel = $(this).find("a.call-out-link").attr("rel");
			if (getRel) {
				$(this).find('img.call-out').wrap("<a href=\""+getLink+"\" rel=\""+getRel+"\"/>");    
			} else {
				$(this).find('img.call-out').wrap("<a href=\""+getLink+"\"/>");
			}
			
		});
	}*/
});
