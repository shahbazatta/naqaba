<?php 
require_once("lang/language.php");
?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->

<html lang="en" dir="ltr" data-textdirection="ltr">

<head>
<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystemv1'); ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

<!--Table Sorter-->
<script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css" />

<!-- Full Screen Browser Js  -->
<script src="assets/plugin/fullScreen/jquery.fullscreen-min.js"></script>

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

<!-- Custom Code Jquery -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/gis/main.js"></script>



<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />

<!--[if lt IE 9]>
	<script src="assets/js/html5.js"></script>
	<link rel="stylesheet" href="assets/css/ie.css">
<![endif]-->
</head>
<body>

  <!--==========Start Main Content Area==========-->
  <!-- Map Wrapper -->
  <div class="mapWrapper1" id="mapContainer1">
        <!-- <img src="assets/images/bg__tem.png" width="100%" height="100%"> -->
    </div>
  

  <div class="mainContainer">

     <!-- Right Menu Strip -->
     <div class="rightMenu">
       <a href="" class="miniLogo" title="">
         <img src="assets/images/mini_logo.png">
       </a>
       <nav>
          <div class="trackingCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/gps.svg"></a>
          </div>

          <div class="transportationCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck.svg"></a>
          </div>

          <div class="trackingDevices">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck_fast.svg"></a>
          </div>

          <div class="busFinder">
            <a href="javascript:void(0)"><img src="assets/images/icons/bus.svg"></a>
          </div>

          <div class="geofences">
            <a href="javascript:void(0)"><img src="assets/images/icons/barcode.svg"></a>
          </div>

          <div class="settings">
            <a href="javascript:void(0)"><img src="assets/images/icons/settings.svg"></a>
            <div class="settingBox" id="settingBox">
              <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'mapSettings'); ?></h1>
              <!--Base Map-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'basemap'); ?></h3>
                  <img src="assets/images/icons/location.svg">
                  <select id="bmap" class="bgSelect" title="Basemap" >  
                    <option value="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'googleMap'); ?></option>                                
                    <option value="0"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'openStreetMap'); ?></option>
                    <option value="2" selected><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'mapBox'); ?></option>
                    <option value="3"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'satelliteMap'); ?></option>
                  </select>
                </div>
              </div>
              
              <!--Select Layer-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'selectLayer'); ?></h3>
                  <img src="assets/images/icons/layer.svg">
                  <select id="setLayer" name="setLayer" class="bgSelect" title="Basemap" >  
                    <option value="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'liveLocations'); ?></option>
                    <option value="2" selected><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stopsGeofence'); ?></option>
                  </select>
                </div>
              </div>
              
              <!--Select Language-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'language'); ?></h3>
                  <img src="assets/images/icons/language.svg">
                  <select id="setLanguage" name="setLanguage" class="bgSelect" title="Basemap" >  
                    <option value="1"selected><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'english'); ?></option>
                    <option value="2"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabic'); ?></option>
                  </select>
                </div>
              </div>

              <!--Select Map Point-->
              <div class="rowDropdown">
                <h2><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'selectMapPoint'); ?></h2>
                <div class="mapPoint">
                  <div class="pointSv active">
                    <img class="tick" src="assets/images/icons/tick-circle.png">
                    <img src="assets/images/icons/mapPoint1.png">
                  </div>
                  <div class="pointSv">
                    <img class="tick" src="assets/images/icons/tick-circle.png">
                    <img src="assets/images/icons/mapPoint2.png">
                  </div>
                  <div class="pointSv">
                    <img class="tick" src="assets/images/icons/tick-circle.png">
                    <img src="assets/images/icons/mapPoint3.png">
                  </div>
                  <div class="pointSv">
                    <img class="tick" src="assets/images/icons/tick-circle.png">
                    <img src="assets/images/icons/mapPoint4.png">
                  </div>
                </div>
              </div>

              <!--Select Transparency-->
              <div class="rowDropdown">
                <h2><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transparency'); ?> <output for="opacity-slider" id="slider-value">1</output></h2>
                <div class="transparency">
                  <div class="sliderWrapper">
                    <input type="range" class="slider" min="0" max="1" value="1" id="opacity-slider" step="0.01">
                    
                  </div>
                </div>
              </div>

              <!--Apply Button-->
              <div class="applySetting">
                <button type="button" class="applySettingBtn" id ="applySettingBtn"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'apply'); ?></button>
              </div>

            </div>

          </div>

          <div class="logout"><a href=""><img src="assets/images/icons/exit.svg"></a></div>
       </nav>
     </div>

     <!-- Left Top Buttons -->
     <div class="leftTopButtons">
       <nav>

         <!-- <div id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></div>
         <div><img src="assets/images/icons/maximize.svg"></div> -->

         <div><a href="javascript:void(0)" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
         <div><a href="javascript:void(0)"><img src="assets/images/icons/maximize.svg"></a></div>

       </nav>
     </div>

     <!-- Left Bottom Buttons -->
     <div class="leftBottomButtons">
       <nav>
         <div><a href="javascript:void(0)"><img src="assets/images/icons/navigate.svg"></a></div>
         <div><a href="javascript:void(0)"><img src="assets/images/icons/plus.svg"></a></div>
         <div><a href="javascript:void(0)"><img src="assets/images/icons/minus.svg"></a></div>
       </nav>
     </div>



    

     
  </div>
  <!--==========End Main Content Area==========-->

<div class="popUpBox busToolTip" id="busDialogBox">
  <div class="boxPopUpTab ">
    <span class="close exit"></span>
    <div class="boxHeader">
      <img src="assets/images/icons/icon-fg.png">
      <h1 class="text2">Driver Name<span>Makkah Road</span></h1>
    </div>
    <div class="boxBody">
      <table>
        <tr>
          <td>IMEI No.
            <span id="imei_no">869688059316101</span>
          </td>
          <td>Avltm
            <span id ="avltm">1685387722000</span>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="oData">
              <p>Avl
                <span id ="avl">157</span>
              </p>
              <p>Ang
                <span id ="ang">45</span>
              </p>
              <p>Spd
                <span id ="speed">101</span>
              </p>
              <p>Odata
                <span id ="odata">3000</span>
              </p>
            </div>
            
          </td>
        </tr>
        <tr>
          <td>Created on
            <span id ="cr_time">14/05/2023</span>
          </td>
          <td>Updated on
            <span id ="up_time">02/06/2023</span>
          </td>
        </tr>
        <tr>
          <td colspan="1">Bus No.
            <span id ="bus_no">6474f9da97c5bc121663c1a9</span>
          </td>
          <td colspan="1">Device Company.
            <span id ="device_comp">6474f9da97c5bc121663c1a9</span>
          </td>
        </tr>
        <tr>
          <td colspan="1">Operator No.
            <span id ="operator_no">1685387738376</span>
          </td>
          <td colspan="1">Engine Plate No.
            <span id ="engplate_no">6474f9da97c5bc121663c1a9</span>
          </td>
        </tr>
      </table>
    </div>
    <div class="boxFooter">
    </div>
    
  </div>
</div>


<div class="popUpBox" id="geofenceDialogBox">
  <div class="boxPopUpTab ">
    <span class="close exit"></span>
    <div class="boxHeader">
      <img src="assets/images/icons/icon-fg.png">
      <h1>Geofence Information</h1>
    </div>
    <div class="boxBody">
      <table>
        <tr>
          <td>Arabic Name
            <span id ="arabicNameGeofence" >Here is your Arabic Name</span>
          </td>
          <td>English Name
            <span id ="englishNameGeofence">Here is your English Name</span>
          </td>
        </tr>
        <tr>
          <td>Type
            <span id ="typeGeofence">Show your Type here</span>
          </td>
          <td>District
            <span id ="districtGeofence">Show your District here</span>
          </td>
        </tr>
        <tr>
          <td>Area
            <span id ="areaGeofence">Calculate your Area</span>
          </td>
          <td>Description
            <span id ="descriptionGeofence">Write your Description</span>
          </td>
        </tr>
        <tr>
          <td>Category
            <span id ="categoryGeofence">Select the Category</span>
          </td>
          <td>Site
            <span id ="siteGeofence"> Mention your Site</span>
          </td>
        </tr>
        <tr>
          <td>Station Type
            <span id ="stationTypeGeofence">Write your Station Type</span>
          </td>
          <td>Station Code
            <span id ="stationCodeGeofence">Write your Station Code</span>
          </td>
        </tr>
        <tr>
          <td>Station Name
            <span id ="stationNameGeofence">Write your Station Name</span>
          </td>
          <td>Code ID
            <span id ="codeIdGeofence">Write your Code ID</span>
          </td>
        </tr>
        <tr>
          <td>Shape Length
            <span id ="shapeLengthGeofence">Mention your Shape Length</span>
          </td>
          <td>Shape Area
            <span id ="shapeAreaGeofence">Mention your Shape Area</span>
          </td>
        </tr>
      </table>
    </div>
    <div class="boxFooter">
      <button type="button" class="exportGeo" id="" onclick=""><img src="assets/images/icons/export.svg">
        <span>Export GeoJSON</span>
      </button>
      <button type="button" class="delete" id="" onclick=""><img src="assets/images/icons/trash.svg">
        <span>Delete</span>
      </button>
      <button type="button" class="edit" id="" onclick=""><img src="assets/images/icons/edit.svg">
        <span>Edit</span>
      </button>
    </div>
    
  </div>
</div>

<script type="text/javascript">
$( document ).ready(function() {

  //$('#busDialogBox').show();
  //$('#geofenceDialogBox').show();

});
</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

