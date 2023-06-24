

$(document).ready(function() {


	// Document width and height
	var $windowWidth = $(window).width();
	var $windowHeight = $(document).height();

	//console.log($windowWidth + " - " + $windowHeight);
	var $setHeightRightNav = $windowHeight - 120;
	$(".rightMenu nav").css({"height": $setHeightRightNav});
	$(".mainContainer").css({"min-height": $windowHeight});
	
	$(".trackingCom .mainListRows").css({"max-height": $windowHeight - 301});
	$(".transportationCom .mainListRows").css({"max-height": $windowHeight - 351});
	$(".trackingDevices .mainListRows").css({"max-height": $windowHeight - 421});

	$(".busFinder .mainListRows").css({"max-height": $windowHeight - 331});
	$(".geofences .mainListRows").css({"max-height": $windowHeight - 381,"max-width": $windowWidth - 97});

	$("#busesFilterFromDrawGeofence #bffdg").css({
		"width": $windowWidth - 200,
		"margin-left": -1*(($windowWidth - 200)/2 + 40),
		"max-height": $windowHeight - 200
	});

	$("#busesFilterFDGCLose").click(function () {
		$('#busesFilterFromDrawGeofence').hide();
	});

	//Popup Box functions
	//$('.popUpBox').show();
	$(".boxPopUpTab .exit").click(function(){
		//Animate Alert Box Tab
		$('.boxPopUpTab').animate({top:"0px",opacity:"0.1"}, function(){
			$('.boxPopUpTab').hide();
			//Black Box hide
			$('.popUpBox').animate({opacity:"0.1"}, function(){
				$('.popUpBox').hide();
				$('.popUpBox').css({"opacity":"1.0"});
				$('.boxPopUpTab').show();
				//Set to Default
				$('.boxPopUpTab').css({"top":"50px","opacity":"1.0"});
			});
        });	
	});

});

window.onload = function () {
	[].forEach.call(document.querySelectorAll('.newScrollBar'), function (el) {
	  Ps.initialize(el);
	});
};