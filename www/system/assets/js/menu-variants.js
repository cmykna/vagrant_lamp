$(document).ready(function(){

	$('#top-nav > ul li ul').css({
	  display: "none",
	  left: "auto"
	});

	$('#top-nav > ul li').hoverIntent(function() 
	{
		$(this).find('ul').stop(true, true).slideDown('fast');
	}, 
	function() 
	{
		$(this).find('ul').stop(true,true).fadeOut('fast');
	});

	// Only accordianize leftnavs with more than 1 h3
	if ($('#section-nav h3').length > 1)
	{

		var allPanels = $('#section-nav ul').hide();
		var defaultPanel = $('#section-nav h3:first').next();
		var allHeads = $('#section-nav h3');
		var currentPanel = $('#section-nav ul').find('a.active').parent().parent();
		var currentTitle = currentPanel.prev().find('span').addClass('acc-icon-tri-o');

		// Show the panel that contains the view we're on
		currentPanel.show();


		$('#section-nav h3').click(function() 
		{
			$this = $(this);
			$target =  $this.next();

			if (!$target.hasClass('show')) 
			{
				// reset display and icons in all the other panels
				allPanels.removeClass('show').slideUp();
				allHeads.find('span').removeClass('acc-icon-tri-o')
				// swap icon and show the clicked panel
				$this.find('span').toggleClass('acc-icon-tri-o');
				$target.addClass('show').slideDown();
			}
		  
			return false;
		});	
	} else {
		// Take arrows off h3s if we're not
		// using the accordian
		$('#section-nav h3 span').css('background-position', '15px');
	}


});