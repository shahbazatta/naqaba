


jQuery( "#fullPopUpClose" ).click(function() {
	jQuery('#fullPopUploader .innerPopUp .clearfix').remove();
	jQuery('#fullPopUploader .innerPopUp h1').remove();
	jQuery('#fullPopUploader .innerPopUp p').remove();
	jQuery('#fullPopUploader').animate({top:"0%",opacity:"0.1"}, function(){
		jQuery('#fullPopUploader').hide();
		jQuery('#fullPopUploader').css({"top":"5%","opacity":"0.9"});
    });
});

jQuery('.slider').toggle(function(){
	jQuery(this).animate({marginLeft:'-66px'}, 500);
	if (document.getElementById("toggle-delay") == this){
		//code for toggle delay
	}
		
},function(){
	jQuery(this).animate({marginLeft:'0'}, 500);
});



jQuery(document).ready(function() { //binding functions to page`s get ready event .. 
					
	$("#usersTbl").tablesorter({
		widgets: ['zebra'], sortList: [[0,0]]
	});
});

