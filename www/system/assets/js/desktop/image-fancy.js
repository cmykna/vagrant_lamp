/*
 ***************************************************************************
 *	Image Fancy JS
 ***************************************************************************
*/
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
						
						
						
						/* ---------- BEGIN: FANCYBOX ENLARGE BUTTON AUTOMATION FOR IMAGES ---------- */
						var indicator = '';
						if(document.domain == 'localhost') {
							indicator = '<img src="http://localhost/system/assets/images/enlarge.png" class="lb-indicator" alt="enlarge" />';
						} else {
							var url = document.domain;
							var urlSplit = (document.domain).split('.');
							var indicator = '<img src="http://'+urlSplit[0]+'.hmheducation.com/system/assets/images/enlarge.png" class="lb-indicator" alt="enlarge" />';
						}
						$('.image-center-lb, .image-left-lb, .image-right-lb, .image-center-lb-s2l, .image-left-lb-s2l, .image-right-lb-s2l').each(function(){
							
							if (!this.complete) {
								// Wait To Load //
                				$(this).load(function(){
													  
										var imgsrc = $(this).attr('src');
										var imageWidth = $(this).width();
										var imageHeight = $(this).height();
										
										if ($(this).attr('class').match('s2l')) {
											imgsrc = imgsrc.replace(".jpg", "-large.jpg");
											imgsrc = imgsrc.replace(".gif", "-large.gif");
											imgsrc = imgsrc.replace(".png", "-large.png");
										}
										
										$(this).wrap('<a class="fancy" rel="fancy" href="'+imgsrc+'" style="display:block;height:'+(imageHeight+32)+';width:'+(imageWidth+18)+';position:relative;z-index:5;" />');
										
										$(indicator).css({
											'display'	: 'block',
											'height'	: '51px',
											'width'		: '64px',
											'position'	: 'absolute',
											'left'		: 'auto',
											'top'		: 'auto',
											'right'		: '0px',
											'bottom'	: '0px',
											'z-index'	: '5'
										}).appendTo($(this).parent('.fancy'));
							
										RightOffset = 3; //5
										BottomOffset = 1; //0
										
										if(ie6) {
											RightOffset = 10;
											BottomOffset = 25;
										}
										
										if ($.browser.msie ) {
											userAgent = $.browser.version;
											userAgent = userAgent.substring(0,userAgent.indexOf('.'));
											if(userAgent == 7) {RightOffset = 10; BottomOffset = 25;}
										}
										
										$('.image-center-lb, .image-center-lb-s2l').next().css({
											'right'	: RightOffset,
											'bottom': BottomOffset
										});
										if(ie7) {
											$('.image-left-lb, .image-left-lb-s2l').next().css({
											'right'		: '18px',
											'bottom'	: '25px'
											}).parent().css({
												'float'		: 'left'	
											});
										} else {
											$('.image-left-lb, .image-left-lb-s2l').next().css({
												'right'		: '19px',
												'bottom'	: '25px'
											}).parent().css({
												'float'		: 'left'	
											});
										}
										$('.image-right-lb, .image-right-lb-s2l').next().css({
											'right'		: '2px', //1px
											'bottom'	: '25px'
										}).parent().css({
											'float'		: 'right'	
										});
										
										$('a[rel=fancy], .fancy').fancybox({
											'overlayOpacity'		: .8,
											'scrolling'				: 'no',
											'titleShow'				: false,
											'padding'				: 10,
											'margin'				:  0,
											'showNavArrows'			: false,
											'autoScale'				: true
										});
										
                				});
							
        					} else {
								// Already Loaded //
                				var imgsrc = $(this).attr('src');
								var imageWidth = $(this).width();
								var imageHeight = $(this).height();
									
										if ($(this).attr('class').match('s2l')) {
											imgsrc = imgsrc.replace(".jpg", "-large.jpg");
											imgsrc = imgsrc.replace(".gif", "-large.gif");
											imgsrc = imgsrc.replace(".png", "-large.png");
											//alert("S2L");
										}
										
										$(this).wrap('<a class="fancy" rel="fancy" href="'+imgsrc+'" style="display:block;height:'+(imageHeight+32)+';width:'+(imageWidth+18)+';position:relative;z-index:5;" />');

										$(indicator).css({
											'display'	: 'block',
											'height'	: '51px',
											'width'		: '64px',
											'position'	: 'absolute',
											'left'		: 'auto',
											'top'		: 'auto',
											'right'		: '0px',
											'bottom'	: '0px',
											'z-index'	: '5'
										}).appendTo($(this).parent('.fancy'));
							
										RightOffset = 3; //5
										BottomOffset = 1; //0
										
										if(ie6) {
											RightOffset = 10;
											BottomOffset = 25;
										}
																				
										if ($.browser.msie ) {
											userAgent = $.browser.version;
											userAgent = userAgent.substring(0,userAgent.indexOf('.'));
											if(userAgent == 7) {RightOffset = 10; BottomOffset = 25;}
										}
										
										$('.image-center-lb, .image-center-lb-s2l').next().css({
											'right'	: RightOffset,
											'bottom': BottomOffset
										});
										if(ie7) {
											$('.image-left-lb, .image-left-lb-s2l').next().css({
											'right'		: '18px',
											'bottom'	: '25px'
											}).parent().css({
												'float'		: 'left'	
											});
										} else {
											$('.image-left-lb, .image-left-lb-s2l').next().css({
												'right'		: '19px',
												'bottom'	: '25px'
											}).parent().css({
												'float'		: 'left'	
											});
										}
										$('.image-right-lb, .image-right-lb-s2l').next().css({
											'right'		: '2px', //1px
											'bottom'	: '25px'
										}).parent().css({
											'float'		: 'right'	
										});
										
										$('a[rel=fancy], .fancy').fancybox({
											'overlayOpacity'		: .8,
											'scrolling'				: 'no',
											'titleShow'				: false,
											'padding'				: 10,
											'margin'				:  0,
											'showNavArrows'			: false,
											'autoScale'				: true
										});
        					}
						});
						/* ---------- END: FANCYBOX ENLARGE BUTTON AUTOMATION FOR IMAGES ---------- */