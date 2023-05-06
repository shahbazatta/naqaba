// JavaScript Document
var $animationBar;

// Loading div hide on page load
$(window).load(function() {
	$(".loadingBox").fadeOut("slow");
});


$(document).ready(function() {
	
	
	// Document width and height
	var $windowWidth = $(window).width();
	var $windowHeight = $(document).height();
	
	//Animation Bar True or false
	$animationBar = false;
	
	//Window Option True or false
	var $windowOption = false;
	
	//Tool Tip
	 $('.toolTip').tooltipster();


	 // Window Height Set
	 var $windowSetHeight = $windowHeight - 150;
	 $(".scrollBar").css({"height": $windowSetHeight});
	 // Setting Height Set
	 var $settingSetHeight = $windowHeight - 295;
	// $(".scrollBar2").css({"height": $settingSetHeight}); 
	 
	 
	 //Window hide/show
	 $(".windowOpen").click(function(){
		$('.optionWindow').slideDown();
		$windowOption = true;
		$('.copyRight').hide();
	});
	 $(".layerSelected, .optionWindowClose").click(function(){
		$('.optionWindow').slideUp(function(){$('.copyRight').show();});
		$windowOption = false;
	});
	
	//Row Option Show /hide
	 $(".row h1").click(function(e){
		
		e.preventDefault();
		// hide all span
		var $this = $(this).parent().find('.optionShow');
		$('.optionShow').not($this).slideUp("fast");
		
		
		$(".row h1").not(this).removeClass('active');
		$this.slideToggle( "fast" );
		$(this).toggleClass('active');
	 });
	 
	 //Setting hide/show
	 $(".settingButton").click(function(){
		$('.settingBar').animate({left:"0px"});
	});
	 $(".settingHeading, .settingWindowClose").click(function(){
		$('.settingBar').animate({left:"-255px"});
	});
	//Legend Setting hide/show
	 $( ".avgSpeedLeg" ).click(function() {
		  
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == false){
			  $('.avgSpeed img').hide();
		  }else{
			  $('.avgSpeed img').show();
		  }
		  
	 }).change();
	 $( ".animColorLeg" ).click(function() {
		 
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == false){
			  $('.animColor img').hide();
		  }else{
			  $('.animColor img').show();
		  }
		  
	 }).change();
     

	 //Setting Bar Option
	 $( ".avgSpeedChk" ).click(function() {
		 
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == true){
			  activeSpeed();
		  }else{
			  activeSpeed();
		  }
	 }).change();
	 
     

	//Setting Bar Option
	 $( ".delayChk" ).click(function() {
		 
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == true){
			  activeShowDataCtrl();
		  }else{
			  activeShowDataCtrl();
		  }
		  
	 }).change();
	//Setting Bar Option
	 $( ".devicesChk" ).click(function() {
		 
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == true){
			  setDevicesVisibility();
		  }else{
			  setDevicesVisibility();
		  }
		  
	 }).change();
	//Setting Bar Option
	 $( ".segmentColorChk" ).click(function() {
		 
		 var $input = $( this );
		  
		  if($input.is( ":checked" ) == true){
			  
		  }else{
			 
		  }
		  
	 }).change();
	
	//Active class for selective tool
	$(".seIcon div").click(function(){
	    $('.seIcon div').not(this).removeClass('activeImg');
	    $(this).addClass('activeImg');
	 }); 
	//Active class for Visualization tool 
	 $(".visImg div").click(function(){
	    $('.visImg div').not(this).removeClass('activeImg');
	    $(this).addClass('activeImg');
	 });
	 
	//Bottom Option Bar hide/show
	 $(".optionClose").click(function(){
		
		
		var $bottomOptionWidth = $windowWidth - 105;
		$('.bottomOption').show();
		
		$('.bottomOption').animate({width:$bottomOptionWidth},500,
			function(){
				$('.optionOpen').show();
				$('.optionClose').hide();
				if($animationBar == true){
					$('.animationBar').animate({bottom:"42px"}, 200);
				}
			}
		);
	});
	
	 $(".optionOpen").click(function(){
		//Layer Activation Bar
		 $('.layerActivationBar').hide();
		 
		if($animationBar == true){
			$('.animationBar').animate({bottom:"0px"}, 200);
		}
		 $('.bottomOption').animate(
				{
					width:"0px"
				},500, function() {
					
					$('.bottomOption').hide();
					$('.optionClose').show();
					$('.optionOpen').hide();
				
				}
			);
		
	});
	
	//All Tabs hide/show
	 $(".hideAllTabs").click(function(){
		 $('.logoTcmHide').hide();
		 $('.settingButton').hide();
		 $('.settingBar').hide();
		 $('.bottomOptionBar').hide();
		 $('.hHL').hide();
		 $('.windowOpen').hide();
		 
		 //Layer Activation Bar
		 $('.layerActivationBar').hide();
		 
		 if($windowOption == true){
			 $('.optionWindow').hide();
		 }
		 if($animationBar == true){
			 $('.animationBar').hide();
		 }
		 
		 $('.showAllTabs').show();
	});
	 $(".showAllTabs").click(function(){
		 $('.logoTcmHide').show();
		 $('.settingButton').show();
		 $('.settingBar').show();
		 $('.bottomOptionBar').show();
		 $('.animationBar').show();
		 $('.hHL').show();
		 $('.windowOpen').show();
		 
		  if($windowOption == true){
			 $('.optionWindow').show();
		 }
		 if($animationBar == true){
			 $('.animationBar').show();
		 }
		 
		 $('.showAllTabs').hide();
	});
	
	//Layer Activation BAR Hide/Show
	 $(".layerSel").click(function(){
		$('.layerActivationBar').toggle();
	});
	 
	 $(".layerActivationBar h1").click(function(){
		$('.layerActivationBar').hide();
	});
	
	//Browser Full Screen ON/OFF
	 $(".fullscreen").click(function(){
		$(document).fullScreen(true);
		//check if broswer deniy the full screen
		$(document).bind("fullscreenchange", function(e) {
		   
		   $(document).fullScreen() ? $(".fullscreen").hide() : $(".fullscreen").show();
		   $(document).fullScreen() ? $(".exitFullscreen").show() : $(".exitFullscreen").hide();
		   
		});
		
	});
	$(".exitFullscreen").click(function(){
		$(document).fullScreen(false);
		$(this).hide();
		$(".fullscreen").show();
	});
	
	//Close All Tabs
	 $(".closeAllTabs").click(function(){
		 
		 // Window Options
		 $('.optionWindow').slideUp();
		 $windowOption = false;
		 $('.copyRight').show();
		 
		 //Layer Activation Bar
		 $('.layerActivationBar').hide();
		 
		 //Setting Bar
		 $('.settingBar').animate({right:"-255px"});
		 
		 //Bottom Option Bar
		 $('.bottomOption').animate(
				{
					width:"0px"
				},500, function() {
					
					$('.bottomOption').hide();
					$('.optionClose').show();
					$('.optionOpen').hide();
				
				}
			);
		
	});
	
	
	// *****Alert Box Tab Closed
	$(".alertBoxTab button.ok").click(function(){
		
		//Animate Alert Box Tab
		$('.alertBoxTab').animate({top:"90px",opacity:"0.1"}, function(){
			
			$('.alertBoxTab').hide();
			
			//Black Box hide
			$('.alertBox').animate({opacity:"0.1"}, function(){
				$('.alertBox').hide();
				//$('.alertBox').css({"opacity":"1.0"});
			});
			
			//Set to Default
			$('.alertBoxTab').css({"top":"140px;","opacity":"1.0"});
			
        });
		
	});
	

	//Help Function Show /hide
	 $(".helpMain").click(function(){
		
		//Help Text Hide
		$('.helpMain').hide();
		
		$(".helpSteps").show();
	    setTimeout(function(){
	    	$('.helpSteps').animate({opacity:"0.1"}, function(){
				$('.helpSteps').hide();
				$('.helpSteps').css({"opacity":"1.0"});				
				
				//Help Text Show Again
				$('.helpMain').show();
				
	        });        
	    }, 6000);
	});
	
	//Hint Show /hide
	 $(".setHint").click(function(){
		var title = $(this).attr("title");
		
		//Help Box Hide
		$('.helpBox').hide();
		
		$(".hHL .hint p").html(title);
		$(".hint").show();
	    setTimeout(function(){
	    	$('.hint').animate({opacity:"0.1"}, function(){
				$('.hint').hide();
				$('.hint').css({"opacity":"1.0"});				
				
				//Help Box Show Again
				$('.helpBox').show();
				
	        });        
	    }, 6000);
	});
	
	//Popup Box functions
	
	//$('.popUpBox').show();
	$(".popUpBoxTab .close").click(function(){
		//Animate Alert Box Tab
		$('.popUpBoxTab').animate({top:"0px",opacity:"0.1"}, function(){
			
			$('.popUpBoxTab').hide();
			
			//Black Box hide
			$('.popUpBox').animate({opacity:"0.1"}, function(){
				$('.popUpBox').hide();
				$('.popUpBox').css({"opacity":"1.0"});
				$('.popUpBoxTab').show();
				//Set to Default
				$('.popUpBoxTab').css({"top":"20px","opacity":"1.0"});
			});
			
			
			
        });	
	});
	
	
	
	// Toggle Buttons - With options (defaults shown below)
	$('.toggle').toggles({
	  drag: true, // allow dragging the toggle between positions
	  click: true, // allow clicking on the toggle
	  text: {
		on: 'ON', // text for the ON position
		off: 'OFF' // and off
	  },
	  on: false, // is the toggle ON on init
	  animate: 250, // animation time
	  transition: 'swing', // animation transition,
	  checkbox: null, // the checkbox to toggle (for use in forms)
	  clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
	  type: 'compact' // if this is set to 'select' then the select style toggle will be used
	});
	
	// Analysis Type - Div hide on Option Change
	 $('#sensorType').hide();
     $('#analysisType').change(function(){
         //$('.colors').hide();
         var j = $(this).val();
			if (j==0){
				visType = 1;
				$('#visualizationType').show();
				$('.avgSpeed').show();
				$('#sensorType').hide();
				$('.allToggleBtns').show();
			}
			else if (j==1){
				visType = 1;
				$('#visualizationType').show();
				$('.avgSpeed').hide();
				$('#sensorType').hide();
				$('.allToggleBtns').show();
			    
			}else if(j==2){
				visType = 4;
				$('.allToggleBtns').hide();
				$('#sensorType').show();
				$('#visualizationType').hide();
			}
     });
	 
	 
	 //bubbleAdvOpt Show /hide
	 $("#speedAdvOpt").click(function(){
		 $('.allToggleBtns').slideToggle( "slow" );

		});
	//bubbleAdvOpt Show /hide
	 $("#signalAdvOpt").click(function(){
			$('.allToggleBtns').slideToggle( "slow" );
		});
     
	
	//bubbleAdvOpt Show /hide
	 $("#bubbleAdvOpt").click(function(){
		    $('#densityFeature').hide();
		    $('#heatMapFeature').hide();
		    $('#bubbleFeature').slideToggle( "slow" );

		});
	//densityAdvOpt Show /hide
	 $("#densityAdvOpt").click(function(){
		    $('#bubbleFeature').hide();
		    $('#heatMapFeature').hide();
		    $('#densityFeature').slideToggle( "slow" );

		});
	//heatMapAdvOpt Show /hide
	 $("#heatMapAdvOpt").click(function(){
		    $('#bubbleFeature').hide();
		    $('#densityFeature').hide();
		    $('#heatMapFeature').slideToggle( "slow" );

		});
	
	
	//Feature Show /hide
	 $("#bubleTd").click(function(){
		    
		 	$('#densityFeature').hide();
		    $('#heatMapFeature').hide();
		    $(".advOption span").html('[+]');
		    
		    $('#densityAdvOpt').hide();
		    $('#heatMapAdvOpt').hide();
		    $('#bubbleAdvOpt').show();
		});
	//Feature Show /hide
	 $("#densityTd").click(function(){
		    
		 	$('#bubbleFeature').hide();
		    $('#heatMapFeature').hide();
		    $(".advOption span").html('[+]');
		    
		    $('#bubbleAdvOpt').hide();
		    $('#heatMapAdvOpt').hide();
		    $('#densityAdvOpt').show();
		});
	//Feature Show /hide
	 $("#heatmapTd").click(function(){
		    
		 	$('#densityFeature').hide();
		    $('#bubbleFeature').hide();
		    $(".advOption span").html('[+]');
		    
		    $('#bubbleAdvOpt').hide();
		    $('#densityAdvOpt').hide();
		    $('#heatMapAdvOpt').show();
		});

	
	//Visualization advance options	 
	 $(".advOption").click(function() {
	     $(".advOption span").html($(".advOption span").html() == '[+]' ? '[-]' : '[+]');
	});
	$(".advOption1").click(function() {
	     $(".advOption1 span").html($(".advOption1 span").html() == '[+]' ? '[-]' : '[+]');
	});
	
	
     
	
	
	//Layout color changer
	
	$('body').addClass("defaultLayout");
	
	$(".colorChange").click(function(){
	    $('.colorChange').not(this).removeClass('active');
	    $(this).addClass('active');
	 });
	
	$("#greenLayout").click(function(){
		$('body').removeClass().addClass("greenLayout");
	 });
	
	$("#blueLayout").click(function(){
		$('body').removeClass().addClass("blueLayout");
	 });
	
	$("#orangeLayout").click(function(){
		$('body').removeClass().addClass("orangeLayout");
	 });
	
	$("#greyLayout").click(function(){
		$('body').removeClass().addClass("greyLayout");
	 });
	
	$("#whiteLayout").click(function(){
		$('body').removeClass().addClass("whiteLayout");
	 });
	
	$("#redLayout").click(function(){
		$('body').removeClass().addClass("redLayout");
	 });
	
	
	
	
}); 



//Alert Box functions
function loading(msg) //Alert Box Messge
{
	$(".loadingProcess p .loadingTxt").html(msg);
	$('.loadingProcess').show();
	if(msg == "hide"){
		$('.loadingProcess').hide();
	}
};

//Animation Bar function
function animationBar(msg) 
{	
	if(msg == "show"){
		$animationBar = true;
		
		//Bottom Option Bar
		 $('.bottomOption').animate(
				{
					width:"0px"
				},500, function() {
					
					$('.bottomOption').hide();
					$('.optionClose').show();
					$('.optionOpen').hide();
					$('.animationBar').animate({bottom:"0px"}, 200);
				}
			);
		
	}
	
	if(msg == "hide"){
		$animationBar = false;
		$('.animationBar').animate({bottom:"-57px"}, 200);
	}
};

function setHint(title){
	
	//Help Box Hide
	$('.helpBox').hide();
	
	$(".hHL .hint p").html(title);
	$(".hint").show();
    setTimeout(function(){
    	$('.hint').animate({opacity:"0.1"}, function(){
			$('.hint').hide();
			$('.hint').css({"opacity":"1.0"});				
			
			//Help Box Show Again
			$('.helpBox').show();
			
        });        
    }, 6000);
}

//Get Parameter By Name from url
function getParameterByName(name)
{
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	var regexS = "[\\?&]" + name + "=([^&#]*)";
	var regex = new RegExp(regexS);
	var results = regex.exec(window.location.href);
	if (results == null)
		return "";
	else
		return decodeURIComponent(results[1].replace(/\+/g, " "));
};

$(document).ready(function() { //binding functions to page`s get ready event ..
	var $theId = getParameterByName('lang');
	
	if ($theId == 'ar')
		document.getElementById("radioAr").checked = true;
	else
		document.getElementById("radioEn").checked = true;
	
});

window.onload = function () {
	[].forEach.call(document.querySelectorAll('#scrollBar'), function (el) {
	  Ps.initialize(el);
	});
};