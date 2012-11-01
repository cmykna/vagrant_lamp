/*
 ***************************************************************************
 *	MegaMenu JS
 ***************************************************************************
*/
function initMegaMenu() {
  var $header = $('#hmh-header')
  	, $prevent_click = $('#hmh-header').find('a[href^="/sites/na"]')
    , fw = ($('html').attr('xmlns')) ? 't1' : 'hb'

  $header.on('click', 'a[href^="/sites/na"]'
  , function (e) {
      e.preventDefault();
    }
  );

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
	
	$('.nav-secondary-element-img').css('display', 'block');

	$('#hmh-header .nav-primary-element').mouseenter(function() {	

		// Push the nav tabs over to the left so they're all aligned on Products
		// instead of under each heading.
		$(this).parent('#hmh-header .nav-primary').children('li').each(function(index) {

			var $primary_heading = $(this);

			// Looks like there are some box model differences between Gecko/Trident and
			// Webkit that are requiring us to use different left offset values depending.
			if($.browser.msie || $.browser.mozilla) {
        	// 1: Assessment
        	// 2: Services
        	// 3: Platform
        	// 4: Topics
				switch(index) {
					case 1: $primary_heading.children('ul:first').css('left', -102); break;
					case 2: $primary_heading.children('ul:first').css('left', -222); break; //-225
					case 3: $primary_heading.children('ul:first').css('left', -322); break; //-326
					case 4: $primary_heading.children('ul:first').css('left', -427); break; //-432
				}
			} else {
				switch(index) {
					case 1: $primary_heading.children('ul:first').css('left', -102); break;
					case 2: $primary_heading.children('ul:first').css('left', -225); break; //-225
					case 3: $primary_heading.children('ul:first').css('left', -326); break; //-326
					case 4: $primary_heading.children('ul:first').css('left', -432); break; //-432
				}
			}
		});
		
		$('#hmh-header .nav-secondary').css('width', 948);
	});
	
	// Wait, what? *Why* is this needed for IE? COMMENTS, HOW DO THEY WORK.
	/* needed for IE */
	$('.nav-primary-element').mouseenter(function() {
		$(this).find('.nav-secondary').css('display', 'block');
	});
	/* needed for IE */
	$('.nav-primary-element').mouseleave(function() {
		$(this).find('.nav-secondary').css('display', 'none');
	});

  // Normalize element 'top' and 'height' then apply a divider between
  // secondary and tertiary elems before we show this sucker.
  // This does us a couple of favors:
  // 1) Top aligns a tertiary element to the top of the mega-menu, instead
  //    of to the top of its containing secondary element.
  // 2) Forces our tertiary element's left border to compliment the height
  //    of the grey background, as opposed to the height of the 
  //    tertiary element itself.
	$header.on('mouseenter', '.nav-secondary-element', function() {
    var $secondary = $(this)
      , $tertiary = $secondary.find('.nav-tertiary')
      , top_offset = 30
      , height_offset = 15
      , height_normalized = ($secondary.parent().height() - height_offset)
      , top_normalized;

    if (fw === 'hb') {
      top_normalized = -(top_offset * $secondary.index());
    } else if (fw === 't1') {
      top_normalized = -(top_offset * $secondary.index()) - $secondary.index();
    }

		$secondary.find('a:first').addClass('active');
    $tertiary.css({
    	'top': top_normalized 
    , 'height': height_normalized
    , 'border-left': '1px solid #787878'
  	});
    $tertiary.show();
	});

	$('#hmh-header').on('mouseleave', '.nav-secondary-element', function() {
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
}
$(function () {
  initMegaMenu();
})