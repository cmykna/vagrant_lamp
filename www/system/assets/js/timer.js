$(document).ready(function() {
	var secondTime = new Date();
	
	secondTime.setSeconds(secondTime.getSeconds() + 5);
	
	$('#monitor').countdown('change', {
		until: secondTime
	});
	
	$('#monitor').countdown({
		until: secondTime, 
		onTick: watchCountdown
	});
	
	function watchCountdown(periods) { 
		$('#monitor').text(periods[6]); 
	}
	
});