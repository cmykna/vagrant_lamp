/*
 ***************************************************************************
 *	Tabs JS
 ***************************************************************************
*/
$(function () {
	var tab = $(".tabNav .h-tabs a, .tabNavPrimary .h-tabs a");	
	var tabContainers = $(".tabCont > div, .tabContPrimary > div");
	$(".tabCont > div, .tabContPrimary > div").not(":first").hide();
	
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
	$(tab).filter(window.location.hash ? "[hash=" + window.location.hash + "]" : ":first").click();
	
});