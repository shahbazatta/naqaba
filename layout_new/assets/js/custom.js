

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

window.onload = function(){ 
    //Make the DIV element draggagle:
	dragElement(document.getElementById("trackingComBox"));
	dragElement(document.getElementById("transportationComBox"));
	dragElement(document.getElementById("trackingDevicesBox"));

	
	

	function dragElement(elmnt) {
	  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
	  if (document.getElementById(elmnt.id + "Header")) {
	    /* if present, the header is where you move the DIV from:*/
	    document.getElementById(elmnt.id + "Header").onmousedown = dragMouseDown;
	  } else {
	    /* otherwise, move the DIV from anywhere inside the DIV:*/
	    elmnt.onmousedown = dragMouseDown;
	  }

	  function dragMouseDown(e) {
	    e = e || window.event;
	    e.preventDefault();
	    // get the mouse cursor position at startup:
	    pos3 = e.clientX;
	    pos4 = e.clientY;
	    document.onmouseup = closeDragElement;
	    // call a function whenever the cursor moves:
	    document.onmousemove = elementDrag;
	  }

	  function elementDrag(e) {
	    e = e || window.event;
	    e.preventDefault();
	    // calculate the new cursor position:
	    pos1 = pos3 - e.clientX;
	    pos2 = pos4 - e.clientY;
	    pos3 = e.clientX;
	    pos4 = e.clientY;
	    // set the element's new position:
	    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
	    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
	  }

	  function closeDragElement() {
	    /* stop moving when mouse button is released:*/
	    document.onmouseup = null;
	    document.onmousemove = null;
	  }
	}

};