

$(document).ready(function() {


	// Document width and height
	var $windowWidth = $(window).width();
	var $windowHeight = $(document).height();

	//console.log($windowWidth + " - " + $windowHeight);
	var $setHeightRightNav = $windowHeight - 120;
	$(".rightMenu nav").css({"height": $setHeightRightNav});
	$(".mainContainer").css({"min-height": $windowHeight});



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