<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>

<head>

<!-- Basic -->
<meta charset="utf-8">
<title>Naqabah Tracker System</title>

<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

<!-- Scroll Bar -->
<link type="text/css" href="assets/plugin/scrollBar/css/perfect-scrollbar.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="assets/plugin/scrollBar/js/perfect-scrollbar.js"></script>

<!-- Tool Tip  -->
<link rel="stylesheet" href="assets/plugin/tooltipster/css/tooltipster.css" type="text/css" media="screen" />
<script src="assets/plugin/tooltipster/js/jquery.tooltipster.min.js"></script>


<!--Toggle Button-->
<link rel="stylesheet" href="assets/plugin/togglebutton/css/toggles.css">
<link rel="stylesheet" href="assets/plugin/togglebutton/css/themes/toggles-modern.css">
<script src="assets/plugin/togglebutton/toggles.js" type="text/javascript"></script>



<!-- Custom Code Jquery -->
<script src="assets/js/custom.js"></script>

<!--Table Sorter-->
<script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css" />

<!-- Full Screen Browser Js  -->
<script src="assets/plugin/fullScreen/jquery.fullscreen-min.js"></script>


<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
	<script src="assets/js/html5.js"></script>
	<link rel="stylesheet" href="assets/css/ie.css">
<![endif]-->


</head>
<body>

<!--==========Start Loading Box==========-->
<div class="loadingBox">
    
    <a href="javascript:void(0)" title="Naqabah" id="loadingLogoTCM" class="toolTip">Naqabah</a>
    
    <div class="hourglass">
        <p>Naqabah Tracker System<br><span>= { GPS + Visualization + Analysis }</span></p>
    </div>
    <
    <div class="bottomBar"></div>
</div>
<!--==========End Loading Box==========-->

<!--==========Start Main Content Area==========-->
<div id="mainContainer">
    <!--Top Black Border-->
    <div class="topSolidBar"></div>
    
    <!--TCM LOGO--> 
     <div class="logoTcmHide">
     	<div class="logoTcmShow" title="">Naqabah Tracker System</div>
     </div>
     
     
	<!--START Help, Hint, Loading-->    
    <div class="hHL">
        <div class="character"></div>
    	<div class="help">
        	
            <div class="helpBox">
                
                
                <button type="button" class="helpMain">Help</button>
                <div class="helpSteps">
                    <!-- <a href="javascript:void(0)">Step 1: </a> -->
                    <!-- <p>Goto Selection Tool and draw area on map</p> -->
                    <!-- <button type="button" class="backStep">Back</button> -->
                    <!-- <button type="button" class="nextStep">Next Step</button> -->
                    
                    <p style="padding:14px 45px 0px 10px;">Hi! How are you?</p>
                    <div class="clear"></div>
                </div>
            </div>
            
            <div class="hint"><a href="javascript:void(0)">Hint:</a>
            	<p>Naqabah Tracker System</p>
            </div>
            
        </div>
    	<div class="loadingProcess">
        <div class="loadingCon">
            <span class="loadingImg"><img src="assets/images/loaderB-Blank.gif" width="40" height="15"></span>
            <p><span class="loadingTxt">Processing...</p>
        </div>
        </div>
    </div>
    <!--END Help, Hint, Loading-->

    <!-- START Bottom Left Main Option Window -->
    <button type="button" class="windowOpen" onClick="">Window</button>
    <div class="optionWindow">
    
        <div class="layerOptions">
      	<div class="scrollBar" id="scrollBar">
        
        	 <!--Tracking Companies-->
            <div class="dataSource row">
            	
                <h1><span class="icon1"></span>Tracking Companies</h1>
                <div class="optionShow">


                    <label class="cCheckBox2">Machine Talk
                      <input type="checkbox" id="checkbox1" name="checkbox1" value="">
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Sober Me Up
                      <input type="checkbox" id="checkbox2" name="checkbox2" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Portable Devices
                      <input type="checkbox" id="checkbox3" name="checkbox3" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Max Media
                      <input type="checkbox" id="checkbox4" name="checkbox4" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Engineer Guarantee
                      <input type="checkbox" id="checkbo5" name="checkbo5" value="">
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Management Net International Company for Information Technology
                      <input type="checkbox" id="checkbo6" name="checkbo6" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Follower of Electronic Systems
                      <input type="checkbox" id="checkbox7" name="checkbox7" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Dimensions Systems Co., Ltd
                      <input type="checkbox" id="checkbox8" name="checkbox8" value=""> 
                      <span class="checkmark"></span>
                    </label>
                    
                    <div class="clear"></div>
                </div>
            </div>
        
            <!--Transportation Companies-->
            <div class="row">
            
                <h1><span class="icon2"></span>Transportation Companies</h1>
                <div class="optionShow">

                    <label class="cCheckBox2">Saudi Public Transport Company
                      <input type="checkbox" id="checkbox9" name="checkbox9" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Makkah Transport Company
                      <input type="checkbox" id="checkbox10" name="checkbox10" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Arab Transport Company
                      <input type="checkbox" id="checkbox11" name="checkbox11" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Dallah Company for transporting pilgrims
                      <input type="checkbox" id="checkbox12" name="checkbox12" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Medina Company for the transport of pilgrims
                      <input type="checkbox" id="checkbox13" name="checkbox13" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Umm Al-Qura Transport Company
                      <input type="checkbox" id="checkbox14" name="checkbox14" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Hafel Transport Company
                      <input type="checkbox" id="checkbox15" name="checkbox15" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Branch of the Abdullah Muhammad Ali Maghribi Foundation for the Transport of Pilgrims
                      <input type="checkbox" id="checkbox16" name="checkbox16" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Nasser Abdullah Abu Sarhad and Partners Co. Ltd
                      <input type="checkbox" id="checkbox17" name="checkbox17" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Mawakeb Al Khair Transport Company
                      <input type="checkbox" id="checkbox18" name="checkbox18" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">International Caravans Company for Tourism Services
                      <input type="checkbox" id="checkbox19" name="checkbox19" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Shqadaf Transport Company
                      <input type="checkbox" id="checkbox20" name="checkbox20" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Rawahel Al Mashaer Co., Ltd. for the transportation of pilgrims
                      <input type="checkbox" id="checkbox21" name="checkbox21" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Tabarak International Transport Co. Ltd
                      <input type="checkbox" id="checkbox22" name="checkbox22" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Diamond Excellence Transport Company
                      <input type="checkbox" id="checkbox23" name="checkbox23" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <div class="clear"></div>
                </div>
            </div>
        
            <!--Tracking Devices-->
            <div class="row">
            
                <h1><span class="icon3"></span>Tracking Devices</h1>
                <div class="optionShow">

                    <label class="cCheckBox2">BCE
                      <input type="checkbox" id="checkbox24" name="checkbox24" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Teltonika
                      <input type="checkbox" id="checkbox25" name="checkbox25" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Machinestalk
                      <input type="checkbox" id="checkbox26" name="checkbox26" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Ruptela
                      <input type="checkbox" id="checkbox27" name="checkbox27" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2">Queclink
                      <input type="checkbox" id="checkbox28" name="checkbox28" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <div class="clear"></div>
                </div>
            </div>
	            
            <div class="clear"></div>

            <!--IMEI FILTER-->
            <div class="row pifilter">

                <div class="ifilter">
                    <label>IMEI Number</label>
                    <input type="text" name="" id="" value="">
                </div>

                <div class="ifilter">
                    <label>Bus Number</label>
                    <input type="text" name="" id="" value="">
                </div>

                <div class="ifilter">
                    <label>Bus Operating Number</label>
                    <input type="text" name="" id="" value="">
                </div>

            </div>




        </div>
            <!-- <button type="button" class="btnLoad" id="applySubmitId" onclick="">Load</button>
            <button type="button" class="btnLoad" id="applyReSubmitId" onclick="" style="display: none;">Reload</button>
            <button type="button" class="btnClear" onclick="">Clear</button> -->
        <div class="clear"></div>
           
        </div>
        <button type="button" class="optionWindowClose">Close</button>
        <!-- <div class="layerSelected">Naqabah <span>Admin</span></div> -->
    </div>
    <!-- END Bottom Left Main Option Window -->
    
    <!-- Setting Bar -->
    <button type="button" class="settingButton"><img src="assets/images/iconOption.png" width="25" height="25"></button>
    <div class="settingBar">
    
        <div class="settingOptions">
        	<div class="scrollBar2" id="scrollBar">
	            <!--Select Layer-->
	        	<div class="row">
	            	<h1>Select Layer</h1>
	                <div class="settingShow">
	                	<fieldset>
	                    	<input id="hajjLyr" type="radio" checked="checked" name="selectLayer1" onclick="">
	                        <label>Layer 1</label>
	                    </fieldset>
	                	<fieldset>
	                    	<input id="counterLyr" type="radio" name="selectLayer1" onclick="">
	                        <label>Layer 2</label>
	                    </fieldset>
	                    <fieldset>
	                    	<input id="cameraLyr" type="radio" name="selectLayer1" onclick="">
	                        <label>Layer 3</label>
	                    </fieldset>
	                </div>
	            </div>
	            
	            <!--Language-->
	        	<div class="row">
	            	<h1>Language</h1>
	                <div class="settingShow">
	                	<fieldset>
	                    	<input type="radio" id="radioEn" name="language" onclick="location.href='?lang=en'">
	                        <label>English</label>
	                    </fieldset>
	                	<fieldset>
	                    	<input type="radio" id="radioAr" name="language" onclick="location.href='?lang=ar'">
	                        <label>Arabic</label>
	                    </fieldset>
	                </div>
	            </div>
	            
	            <!--Color Layout-->
	        	<div class="row last">
	            	<h1>Color Layout</h1>
	                <div class="settingShow">
	                	<div class="colorChange" id="greenLayout"><img src="assets/images/layoutGreen.png" width="24" height="24"></div>
	                	<div class="colorChange active" id="blueLayout"><img src="assets/images/layoutBlue.png" width="24" height="24"></div>
	                	<div class="colorChange" id="orangeLayout"><img src="assets/images/layoutOrange.png" width="24" height="24"></div>
	                	<div class="colorChange" id="greyLayout"><img src="assets/images/layoutGrey.png" width="24" height="24"></div>
	                	<div class="colorChange" id="redLayout"><img src="assets/images/layoutRed.png" width="24" height="24"></div>
	              
	                	<!-- <div class="colorChange" id="whiteLayout"><img src="assets/images/layoutWhite.png" width="24" height="24"></div> -->
	                    <div class="clear"></div>
	                </div>
	            </div>

	            <div class="settingHeading">Setting</div>
            </div>
	            
	        <button type="button" class="settingWindowClose">Close</button>
        </div>
    </div>
    
    <!-- Zoom Bar -->
    <div class="zoomBar">
    	<button type="button" class="zoomIn toolTip setHint" onClick="" title="Zoom In">zoomin</button>
        <button type="button" class="zoomOut toolTip setHint" onClick="" title="Zoom Out">zoomOut</button>
    </div>
    
    <!-- Bottom Option Bar -->
    <div class="bottomOptionBar">
    	<button type="button" class="optionClose">Close</button>
    	<button type="button" class="optionOpen">Open</button>
        <div class="bottomOption">
        	<div class="copyRight">© 2023 Naqabah Tracker Systems</div>
            <div class="optionButtons">
    			<button type="button" class="logoutUser">Logout</button>
    			<button type="button" class="closeAllTabs">Close Tabs</button>
    			<button type="button" class="hideAllTabs">Hide Tabs</button>
    			<button type="button" class="fullscreen">Full Screen</button>
    			<button type="button" class="exitFullscreen">Exit Full Screen</button>
    			<div class="layerSelOuter">
                	<button type="button" class="layerSel">Layer 1<span>(Active)</span></button>
                    
                    <div class="layerActivationBar">
                        <h1>Select Layer</h1>
                        <div class="settingShow">
                            <fieldset>
                                <input type="radio" checked="checked" name="selectLayer"  onclick="">
                                <label>Layer 1</label>
                            </fieldset>
                            <fieldset>
                                <input type="radio" name="selectLayer"  onclick="">
                                <label>Layer 2</label>
                            </fieldset>
                            <fieldset>
	                    		<input type="radio" name="selectLayer" onclick="">
	                        	<label>Layer 3</label>
	                    	</fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="fullPopUploader">
    	<div id="fullPopUpClose" class="pp_close"></div>
    	<div class="innerPopUp">
    		
    	</div>
    </div>
    
    
    <!-- Map Wrapper -->
    <div class="mapWrapper" id="mapContainer">
        <img src="assets/images/bg__tem.png" width="100%" height="100%">
    </div>
   



    
    <div id="loaderAjax">
    	<div class="imgLoader"></div>
    </div>

    <!-- Bottom Bar -->
    <div class="bottomSolidBar"></div>
    
    <!-- Show All Tabs Button -->
    <button type="button" class="showAllTabs">Show All Tabs</button>
    

    
    <!-- Alert Box -->
    <div class="alertBox">
    	<div class="alertBoxTab">
        	<h2><img src="assets/images/iconAlert.png" width="22" height="22">Message Window</h2>
            <p>Any message or information that you want to display in floating popups. Any message or information that you want to display in floating popups.</p>
            <button type="button" class="button ok">OK</button>
        </div>
    </div>
    
</div>

<!--==========End Main Content Area==========-->

<script type="text/javascript">
// <![CDATA[
    
  //Alert Box functions
  function alertBoxMessage(msg) //Alert Box Messge
  {
    $(".alertBoxTab p").html(msg);
    $('.alertBox, .alertBoxTab').show();
    $('.alertBox').animate({opacity:"1.0"});
    return;
  };

    
//]]>
</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

