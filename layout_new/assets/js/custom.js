

$(document).ready(function() {


	// Document width and height
	var $windowWidth = $(window).width();
	var $windowHeight = $(document).height();

	//console.log($windowWidth + " - " + $windowHeight);
	var $setHeightRightNav = $windowHeight - 120;
	$(".rightMenu nav").css({"height": $setHeightRightNav});
	$(".mainContainer").css({"min-height": $windowHeight});
});