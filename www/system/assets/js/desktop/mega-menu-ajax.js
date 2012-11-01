/*
 ***************************************************************************
 *	MegaMenu JS
 ***************************************************************************
*/
$(document).ready(function() {

	$.ajax({
		url: "/system/dataSets/all-us-states.php",
		success: function(usstates){
			$('#location-dropdown').html('&nbsp;Your location is:&nbsp;'+usstates);
		}
	});

	/*
	|--------------------------------------------------------------------------
	|	BEGIN: MOUSE EVENTS FOR NAV
	|--------------------------------------------------------------------------
	*/
	
	/*$('#hmh-header .ajax-load').each(function() {
		
		if ('' != $(this).attr('id')) {
			var target_menu = this;
			var ajax_loaded_menu = $(this).attr('id');
			ajax_loaded_menu = ajax_loaded_menu.replace(/_/g, '/');
			ajax_loaded_menu = ajax_loaded_menu + '.php';
			
			var url = '/templates-1.0/includes/nav/' + ajax_loaded_menu;

			$.ajax({
				url: url,
				success: function(ajax_loaded_menu) {
						$(target_menu).append(ajax_loaded_menu);
						$(target_menu).find('.nav-secondary-element-img').css('display', 'block');
						$(target_menu).find('a').click(function() { $('.nav-primary-element').each(function() { $(this).mouseleave(); }); });
					}
			});
		}

	});*/
	
	$('.nav-secondary-element-img').css('display', 'block');

	$('#hmh-header .nav-primary-with-sub, #hmh-header .nav-secondary-with-sub').click(function(event) {
		event.preventDefault();
	});

	$('#hmh-header .nav-primary-element').mouseenter(function() {
		/*
		var li_index = $(this).index();
		
		var left_position = 0;
		
		for (i = li_index; i >= 0; i--) {
			left_position -= $('.nav-primary-element:nth-child(' + i + ')').outerWidth();
		}
		
		$(this).children('ul:first').css('left', left_position);
		*/
		$(this).parent('#hmh-header .nav-primary').children('li').each(function(index) {

			if($.browser.msie || $.browser.mozilla) {
				switch(index)
				{
					case 1: $(this).children('ul:first').css('left', -102); break;
					case 2: $(this).children('ul:first').css('left', -222); break; //-225
					case 3: $(this).children('ul:first').css('left', -322); break; //-326
					case 4: $(this).children('ul:first').css('left', -427); break; //-432
				}
			} else {
				switch(index)
				{
					case 1: $(this).children('ul:first').css('left', -102); break;
					case 2: $(this).children('ul:first').css('left', -225); break; //-225
					case 3: $(this).children('ul:first').css('left', -326); break; //-326
					case 4: $(this).children('ul:first').css('left', -432); break; //-432
				}
			}
		});
		
		$('#hmh-header .nav-secondary').css('width', 948);
	});
	
	/* needed for IE */
	$('.nav-primary-element').mouseenter(function() {
		$(this).find('.nav-secondary').css('display', 'block');
	});
	/* needed for IE */
	$('.nav-primary-element').mouseleave(function() {
		$(this).find('.nav-secondary').css('display', 'none');
	});

	/**
	 * using jquery.delegate() for events. since some menus are loaded via ajax after the page loads, a simple event listener will
	 * not work on these elements
	 * jquery.live() is deprecated as of jquery 1.7
	 * jquery 1.7 recommends use of jquery.on() method in place of jquery.live()
	 * we are currently on jquery 1.6, so we must use jquery.delegate() instead of jquery.live()
	 **/
	$('#hmh-header').delegate('.nav-secondary-element', 'mouseenter', function() {
		var ThisElementIndex = $(this).index();
		$(this).find('a:first').addClass('active');

		$(this).parent('.nav-secondary').children('li').each(function(index) {
			$(this).children('ul:first').hide();
			if(ThisElementIndex == index)
			{
				var hasChildren = ($(this).has("ul").length ? 1 : 0);
				if(hasChildren === 1)
				{
					var ThisDynaHeight = $(this).parent('ul').height();
					if($.browser.msie || $.browser.mozilla) {
						ThisElementOffset = -30; //-31
					} else {
						ThisElementOffset = -30;
					}

					var ThisElementChildTop = (ThisElementIndex * ThisElementOffset);
					//console.log(ThisElementChildTop);
					var ThisChild = $(this).children('ul:first');
					ThisChild.css('top', ThisElementChildTop);
					ThisChild.css('height', ThisDynaHeight-15);
					ThisChild.css('border-left', '1px solid #787878');
					ThisChild.show();
				}
			}
		});
	});

	$('#hmh-header').delegate('.nav-secondary-element', 'mouseleave', function() {
		$(this).parent('.nav-secondary').children('li').each(function(index) { 
			$(this).children('ul:first').hide();
		});
		$(this).find('a:first').removeClass('active');

	});

	/*
	|--------------------------------------------------------------------------
	|	END: MOUSE EVENTS FOR NAV
	|--------------------------------------------------------------------------
	*/
	
	$('#state_sites').live('change', function() {
		var location = $(':selected', this).val();
		window.location = location;
	});
});