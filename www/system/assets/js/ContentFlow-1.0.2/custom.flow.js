var cf = new ContentFlow('contentFlow', {
	reflectionColor		: 'none',
	reflectionHeight	: 0,
	circularFlow		: false,
	onclickActiveItem	: function(item) {
		var cfCaption = $('.globalCaption .caption').html();
		
		if(item.content.getAttribute('rel')) 
		{
			// ---- This is a video cover flow ---- //
			var thisVideoParams = item.content.getAttribute('rel').split(",");
			if (thisVideoParams[0] == 'LoadFLV')
			{
				LoadFLV(thisVideoParams[1],thisVideoParams[1]+'-video',thisVideoParams[2],thisVideoParams[3]);
			} else {
				LoadSWF(''+thisVideoParams[1]+'',''+thisVideoParams[1]+'-video',thisVideoParams[2],thisVideoParams[3]);
			}
			$(item.element).fancybox({
				'type'					: 'html',
				'content'				: $('#'+thisVideoParams[1]+'-host').html(),
				'title'					: cfCaption,
				'overlayOpacity'		: .8,
				'scrolling'				: 'no',
				'titleShow'				: true,
				'padding'				: 10,
				'margin'				:  0,
				'showNavArrows'			: false,
				'autoScale'				: true,
				'onClosed':	function() {location.reload();}
			});
			
		} else {
			
			// ---- This is a standard, image cover flow ---- //
			$(item.element).fancybox({
				'type'					: 'image',
				'href'					: item.content.getAttribute('src'),
				'title'					: cfCaption,
				'hideOnContentClick'	: true,
				'overlayOpacity'		: .8,
				'padding'				: 10,
				'scrolling'				: 'no',
				'titleShow'				: true
			});
			
		}
	}
});
			
			
			
			
			
			
// ---- BEGIN UNUSED ---- //
			 /*,
						'onComplete'			: function() { 
							var thisWidth = parseInt(item.content.width)+(thisPadding*2);
							var thisHeight = parseInt(item.content.height)+(thisPadding*2);
							$('#fancybox-inner')
								.width(thisWidth)
								.height(thisHeight);
							$('#fancybox-wrap')
								.width(thisWidth)
								.height(thisHeight);
							$.fancybox.resize();
							$.fancybox.center();
						}*/
// ---- END UNUSED ---- //