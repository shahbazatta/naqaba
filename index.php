<?php
require_once("lang/language.php");
?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->

<?php if ($lang_type == 'ar'){ ?>
<html lang="ar" dir="rtl" data-textdirection="rtl">
<?php } else { ?>
<html lang="en" dir="ltr" data-textdirection="ltr">
<?php } ?>

<head>
<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystemv1'); ?></title>

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

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
 <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>


<!-- Custom Code Jquery -->
<script src="assets/js/custom.js"></script>
<script type="module" src="assets/js/gis/main.js"></script>

<!--Table Sorter-->
<script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css" />

<!-- Full Screen Browser Js  -->
<script src="assets/plugin/fullScreen/jquery.fullscreen-min.js"></script>


<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />

<?php if ($lang_type == 'ar'){ ?>
<link rel="stylesheet" href="assets/css/style_arabic.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
<?php } ?>

<!--  -->
<!--[if lt IE 9]>
	<script src="assets/js/html5.js"></script>
	<link rel="stylesheet" href="assets/css/ie.css">
<![endif]-->


</head>
<body>

<!--==========Start Loading Box==========-->
<div class="loadingBox">
    
    <a href="javascript:void(0)" title="Naqabah" id="loadingLogoTCM" class="toolTip"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabah'); ?></a>
    
    <div class="hourglass">
        <p><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?><br><span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'gPS_Visualization_Analysis'); ?></span></p>
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
     	<div class="logoTcmShow" title=""><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?></div>
     </div>

    <!-- START Bottom Right Main Option Window -->
    <button type="button" class="windowOpen" onClick=""><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'window'); ?></button>
    <div class="optionWindow">
    
        <div class="layerOptions">
      	<div class="scrollBar" id="scrollBar">
        
        	 <!--Tracking Companies-->
            <div class="dataSource row">
            	
                <h1><span class="icon1"></span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingCompanies'); ?></h1>
                <div class="optionShow">


                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'machineTalk'); ?>
                      <input type="checkbox" id="checkbox1" name="checkbox1" value="">
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'soberMeUp'); ?>
                      <input type="checkbox" id="checkbox2" name="checkbox2" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'portableDevices'); ?>
                      <input type="checkbox" id="checkbox3" name="checkbox3" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'maxMedia'); ?>
                      <input type="checkbox" id="checkbox4" name="checkbox4" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'engineerGuarantee'); ?>
                      <input type="checkbox" id="checkbo5" name="checkbo5" value="">
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'management_Net_International_Company_For_Information_Technology'); ?>
                      <input type="checkbox" id="checkbo6" name="checkbo6" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'followerOfElectronicSystems'); ?>
                      <input type="checkbox" id="checkbox7" name="checkbox7" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dimensionsSystemsCoLtd'); ?>
                      <input type="checkbox" id="checkbox8" name="checkbox8" value=""> 
                      <span class="checkmark"></span>
                    </label>
                    
                    <div class="clear"></div>
                </div>
            </div>
        
            <!--Transportation Companies-->
            <div class="row">
            
                <h1><span class="icon2"></span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompanies'); ?></h1>
                <div class="optionShow">

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'saudiPublicTransportCompany'); ?>
                      <input type="checkbox" id="checkbox9" name="checkbox9" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'makkahTransportCompany'); ?>
                      <input type="checkbox" id="checkbox10" name="checkbox10" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabTransportCompany'); ?>
                      <input type="checkbox" id="checkbox11" name="checkbox11" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dallah_Company_For_Transporting_Pilgrims'); ?>
                      <input type="checkbox" id="checkbox12" name="checkbox12" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'medina_Company_For_The_Transport_Of_Pilgrims'); ?>
                      <input type="checkbox" id="checkbox13" name="checkbox13" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'umm_Al_Qura_Transport_Company'); ?>
                      <input type="checkbox" id="checkbox14" name="checkbox14" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'hafel_Transport_Company'); ?>
                      <input type="checkbox" id="checkbox15" name="checkbox15" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'branch_Of_The_Abdullah_Muhammad_Ali_Maghribi_Foundation_For_The_Transport_Of_Pilgrims'); ?>
                      <input type="checkbox" id="checkbox16" name="checkbox16" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'nasser_Abdullah_Abu_Sarhad_And_Partners_Co_Ltd'); ?>
                      <input type="checkbox" id="checkbox17" name="checkbox17" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'mawakeb_Al_Khair_Transport_Company'); ?>
                      <input type="checkbox" id="checkbox18" name="checkbox18" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'international_Caravans_Company_Tourism_Services'); ?>
                      <input type="checkbox" id="checkbox19" name="checkbox19" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'shqadaf_Transport_Company'); ?>
                      <input type="checkbox" id="checkbox20" name="checkbox20" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'rawahel_Al_Mashaer_Co_Ltd_Transportation_Pilgrims'); ?>
                      <input type="checkbox" id="checkbox21" name="checkbox21" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'tabarakInternationalTransportCoLtd'); ?>
                      <input type="checkbox" id="checkbox22" name="checkbox22" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'diamondExcellenceTransportCompany'); ?>
                      <input type="checkbox" id="checkbox23" name="checkbox23" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <div class="clear"></div>
                </div>
            </div>
        
            <!--Tracking Devices-->
            <div class="row">
            
                <h1><span class="icon3"></span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingDevices'); ?></h1>
                <div class="optionShow">

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'bCE'); ?>
                      <input type="checkbox" id="checkbox24" name="checkbox24" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'teltonika'); ?>
                      <input type="checkbox" id="checkbox25" name="checkbox25" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'machinestalk'); ?>
                      <input type="checkbox" id="checkbox26" name="checkbox26" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'ruptela'); ?>
                      <input type="checkbox" id="checkbox27" name="checkbox27" value=""> 
                      <span class="checkmark"></span>
                    </label>

                    <label class="cCheckBox2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'queclink'); ?>
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
                    <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'iMEINumber'); ?></label>
                    <input type="text" name="" id="" value="">
                </div>

                <div class="ifilter">
                    <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'busNumber'); ?></label>
                    <input type="text" name="" id="" value="">
                </div>

                <div class="ifilter">
                    <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'busOperatingNumber'); ?></label>
                    <input type="text" name="" id="" value="">
                </div>

            </div>




        </div>
            <!-- <button type="button" class="btnLoad" id="applySubmitId" onclick="">Load</button>
            <button type="button" class="btnLoad" id="applyReSubmitId" onclick="" style="display: none;">Reload</button>
            <button type="button" class="btnClear" onclick="">Clear</button> -->
        <div class="clear"></div>
           
        </div>
        <button type="button" class="optionWindowClose"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'close'); ?></button>
        <!-- <div class="layerSelected">Naqabah <span>Admin</span></div> -->
    </div>
    <!-- END Bottom Right Main Option Window -->
    
    <!-- Polygon Button -->
    <button type="button" class="stickyBtnTopLeft polygonIconButton" id ="draw_geofence"><img src="assets/images/iconPolygon.png" width="36" height="36" title="click to active/deactive draw geofence" ></button>
    
    <!-- Data Table Box -->
    <button type="button" class="stickyBtnTopLeft tableIconButton"><img src="assets/images/table_icon1.png" width="36" height="36"></button>

    
    <!-- Setting Bar -->
    <button type="button" class="settingButton"><img src="assets/images/iconOption.png" width="25" height="25"></button>
    <div class="settingBar">
    
        <div class="settingOptions">
          <div class="scrollBar2" id="scrollBar">

            <!--Base Map-->
            <div class="row">
              <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'basemap'); ?></h1>
                <div class="optionShow">
                   <div class="selectParent">
                      <select id="bmap" class="bgSelect" title="Basemap" >  
                             <option value="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'googleMap'); ?></option>                         			  
                            <option value="0"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'openStreetMap'); ?></option>
                        </select>
                     </div>
                </div>
            </div>

              <!--Select Layer-->
            <div class="row">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'selectLayer'); ?></h1>
                  <div class="settingShow">
                    <fieldset>
                        <input type="radio" id="liveLocations" name="layerSelectOp" onclick="" checked="checked">
                          <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'liveLocations'); ?></label>
                      </fieldset>
                      <fieldset>
                        <input type="radio" id="stopsGeofence" name="layerSelectOp" onclick="">
                          <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stopsGeofence'); ?></label>
                      </fieldset>
                  </div>
              </div>

              <!--Selection Tools-->
            <!-- <div class="row">
        
              <h1>Selection</h1>
                <div class="optionShow">
                   <div onclick="" title="Rectangle" class="seIcon setHint" style="margin-left:0px;">
                        <div id="recArea"></div>
                    </div>
                    <div onclick="" title="Circle" class="seIcon setHint">
                        <div id="circleArea"></div>
                    </div>
                    <div onclick="" title="Polygon" class="seIcon setHint">
                        <div id="polygonArea"></div>
                    </div>
                    <div onclick="" title="Point" class="seIcon setHint">
                        <div id="pointArea"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div> -->
              
              <!--Language-->
            <div class="row">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'language'); ?></h1>
                  <div class="settingShow">
                    <fieldset>
                        <input type="radio" id="radioEn" name="language" onclick="location.href='?lang=en'">
                       <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'english'); ?></label>
                    </fieldset>
                    <fieldset>
                        <input type="radio" id="radioAr" name="language" onclick="location.href='?lang=ar'">
                          <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabic'); ?></label>
                      </fieldset>
                  </div>
              </div>
              
              <!--Color Layout-->
            <div class="row">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'colorLayout'); ?></h1>
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
              
              <!--Icons Layout-->
            <div class="row">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'moreIcons'); ?></h1>
                  <div class="settingShow">
                    <div class="moreIcons active" id="picon1"><img src="assets/images/pointerIcon1.png" width="24" height="24"></div>
                    <div class="moreIcons" id="picon2"><img src="assets/images/pointerIcon2.png" width="24" height="24"></div>
                    <div class="moreIcons" id="picon3"><img src="assets/images/pointerIcon3.png" width="24" height="24"></div>
                    <div class="moreIcons" id="picon4"><img src="assets/images/pointerIcon4w.png" width="24" height="24"></div>
                    <div class="moreIcons" id="picon5"><img src="assets/images/pointerIcon5w.png" width="24" height="24"></div>
                    <div class="clear"></div>
                  </div>
              </div>
              
              <!--Icons Layout-->
            <div class="row">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'opacity'); ?></h1>
                  <div class="settingShow">
                     <div class="slider-wrapper">
                        <input type="range" min="0" max="1" value="1" id="opacity-slider" step="0.01">
                        <output for="opacity-slider" id="slider-value">1</output>
                      </div>
                    <div class="clear"></div>
                  </div>
              </div>

            </div>
            <div class="applySetting">
            <button type="button" class="applySettingButton"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'apply'); ?></button>
            </div>
            <div class="settingHeading"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'setting'); ?></div>
            <button type="button" class="settingWindowClose"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'close'); ?></button>
              
        </div>
    </div>
    
    <!-- Zoom Bar -->
    <!-- <div class="zoomBar">
    	<button type="button" class="zoomIn toolTip setHint" onClick="" title="Zoom In">zoomin</button>
        <button type="button" class="zoomOut toolTip setHint" onClick="" title="Zoom Out">zoomOut</button>
    </div> -->
    
    <!-- Bottom Option Bar -->
    <div class="bottomOptionBar">
    	<button type="button" class="optionClose"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'close'); ?></button>
    	<button type="button" class="optionOpen"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'open'); ?></button>
        <div class="bottomOption">
        	<div class="copyRight"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'copyRight2023NaqabahTrackerSystems'); ?></div>
            <div class="optionButtons">
    			<button type="button" class="logoutUser"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'logout'); ?></button>
    			<button type="button" class="closeAllTabs"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'closeTabs'); ?></button>
    			<button type="button" class="hideAllTabs"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'hideTabs'); ?></button>
    			<button type="button" class="fullscreen"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'fullScreen'); ?></button>
    			<button type="button" class="exitFullscreen"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'exitFullScreen'); ?></button>
    			<div class="layerSelOuter">
                	<button type="button" class="layerSel"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'liveLocations'); ?><span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabah'); ?>(Active)</span></button>
                    
                    <div class="layerActivationBar">
                        <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'selectLayer'); ?></h1>
                        <div class="settingShow">

                          <fieldset>
                            <input type="radio" id="liveLocations" name="layerSelect" onclick="" checked="checked">
                              <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'liveLocations'); ?></label>
                          </fieldset>
                          <fieldset>
                            <input type="radio" id="stopsGeofence" name="layerSelect" onclick="">
                              <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stopsGeofence'); ?></label>
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
	<div id="map_id" width="100%" height="100%"></div>
        <!-- <img src="assets/images/bg__tem.png" width="100%" height="100%"> -->
    </div>
   



    
    <div id="loaderAjax">
    	<div class="imgLoader"></div>
    </div>

    <!-- Bottom Bar -->
    <div class="bottomSolidBar"></div>
    
    <!-- Show All Tabs Button -->
    <button type="button" class="showAllTabs"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabah'); ?>Show All Tabs</button>
    

    <!-- Popup box -->
    <div  id="geofenceDialogBox" class="popUpBox">
      <div class="popUpBoxTab">
          <span class="close">Close</span>
          <h2>Title fo Geofence Dialog Box</h2>
          <fieldset>
            <label>Input Field1:</label>
            <input type="text" class="inputText" id="field1" maxlength="40"/>
          </fieldset>
          <fieldset>
            <label>Input Field2:</label>
            <input type="text" class="inputText" id="field2" maxlength="40"/>
          </fieldset>
          <fieldset>
            <label>Input Field3:</label>
            <input type="text" class="inputText" id="field3" maxlength="40"/>
          </fieldset>
          <fieldset>
            <label>Input Field4:</label>
            <input type="text" class="inputText" id="field4" maxlength="40"/>
          </fieldset>
          <fieldset>
            <label>Input Field5:</label>
            <input type="text" class="inputText" id="field5" maxlength="40"/>
          </fieldset>
            <!-- <p>Any message or information that you want to display.</p> -->
            <button type="button" class="button" value="Save" id="geofenceSave" onclick="">Save</button>
            <button type="button" class="button" value="Cancel" onclick="">Cancel</button>
        </div>
    </div>
    
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

$( document ).ready(function() {
    //$('#geofenceDialogBox').show();
    $('#opacity-slider').on("change mousemove", function() {
      $('#slider-value').html($(this).val());
      // $('.wrapper img').css({
      //   'opacity': $(this).val()
      // });
    });

    // $.ajax({
    //     url: "data/get_geofence.php",
    //     method: "POST",
    //     dataType: "json",
    //     data: {
    //       api_key: "becdf4fbbbf49dbc",
    //     },
    //     success: function(data){console.log(data);},
    //     error: function (jqXHR, exception) {
    //       var msg = '';
    //       //alert(msg);
    //       console.log(jqXHR.responseText);

    //       if (jqXHR.status === 0) {
    //         msg = 'Not connect.\n Verify Network.';
    //       } else if (jqXHR.status == 404) {
    //         msg = 'Requested page not found. [404]';
    //       } else if (jqXHR.status == 500) {
    //         msg = 'Internal Server Error [500].';
    //       } else if (exception === 'parsererror') {
    //         msg = 'Requested JSON parse failed.';
    //       } else if (exception === 'timeout') {
    //         msg = 'Time out error.';
    //       } else if (exception === 'abort') {
    //         msg = 'Ajax request aborted.';
    //       } else {
    //         msg = 'Uncaught Error.\n' + jqXHR.responseText;
    //       }
    //       alert(msg);
    //     },
    // });

});

//Alert Box functions
function alertBoxMessage(msg) //Alert Box Messge
{
  $(".alertBoxTab p").html(msg);
  $('.alertBox, .alertBoxTab').show();
  $('.alertBox').animate({opacity:"1.0"});
  return;
};
</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

