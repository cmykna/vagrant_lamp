/*
 ***************************************************************************
 *	General JS
 ***************************************************************************
*/
$().UItoTop({
	easingType: "easeOutQuart"
});

$("#no-javascript").css({
	"display": "none"
});

var ie = $.browser.msie;
var ie6 = ie && $.browser.version.substr(0,3) == "6.0";
var ie7 = ie && $.browser.version.substr(0,3) == "7.0";
var ie7orHigher = ie && $.browser.version.substr(0,3) >= "7.0";

if(ie6) {
	$("em").css({
		"font-style" : "italic",
		"font-weight": "normal"
	});
	$("em > em").css({
		"font-style" : "normal",
		"font-weight": "bold"
	});
	$("em > em > em").css({
		"font-style" : "italic",
		"font-weight": "bold"
	});
}
if(ie) {
	$("tr:nth-child(odd)").addClass("odd").children("td").addClass("odd");
	$("tr:nth-child(even)").addClass("even").children("td").addClass("even");
}

$('#help a[href*=#]').smoothScroll();

if($('#footer #contact li').length > 1) {
	$('#contact').find('li:first-child').css({'border-right': '1px solid #999'});
}

if($(".two-space-bucket").length > 0) {
	if(ie) {
		$(".two-space-bucket ul li:nth-child(odd)").addClass("odd");
	}
}