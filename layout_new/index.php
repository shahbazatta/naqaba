<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->

<html lang="en" dir="ltr" data-textdirection="ltr">

<head>
<!-- Basic -->
<meta charset="utf-8">
<title>Naqabah Tracker System v2</title>

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
  <div class="mapWrapper" id="mapContainer">
   <div id="map_id" ></div>
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
              <h1>Map Settings</h1>
              <!--Base Map-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3>Basemap</h3>
                  <img src="assets/images/icons/location.svg">
                  <select id="bmap" class="bgSelect" title="Basemap" >  
                    <option value="1">Google Map</option>                                
                    <option value="0">Open Street Map</option>
                    <option value="2" selected>MapBox</option>
                    <option value="3">Satellite Map</option>
                  </select>
                </div>
              </div>
              
              <!--Select Layer-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3>Select Layer</h3>
                  <img src="assets/images/icons/layer.svg">
                  <select id="setLayer" name="setLayer" class="bgSelect" title="Basemap" >  
                    <option value="1">Live Locations</option>
                    <option value="2" selected>Stops Geofence</option>
                  </select>
                </div>
              </div>
              
              <!--Select Language-->
              <div class="rowDropdown">
                <div class="selectParent">
                  <h3>Language</h3>
                  <img src="assets/images/icons/language.svg">
                  <select id="setLanguage" name="setLanguage" class="bgSelect" title="Basemap" >  
                    <option value="1"selected>English</option>
                    <option value="2">عربي</option>
                  </select>
                </div>
              </div>

              <!--Select Map Point-->
              <div class="rowDropdown">
                <h2>Select Map Point</h2>
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
                <h2>Transparency <output for="opacity-slider" id="slider-value">1</output></h2>
                <div class="transparency">
                  <div class="sliderWrapper">
                    <input type="range" class="slider" min="0" max="1" value="1" id="opacity-slider" step="0.01">
                    
                  </div>
                </div>
              </div>

              <!--Apply Button-->
              <div class="applySetting">
                <button type="button" class="applySettingBtn" id ="applySettingBtn">Apply</button>
              </div>

            </div>

          </div>

          <div class="logout"><a href=""><img src="assets/images/icons/exit.svg"></a></div>
       </nav>
     </div>

     <!-- Left Top Buttons -->
     <div class="leftTopButtons">
       <nav>
         <div><a href="" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
         <div><a href=""><img src="assets/images/icons/maximize.svg"></a></div>
       </nav>
     </div>

     <!-- Left Bottom Buttons -->
     <div class="leftBottomButtons">
       <nav>
         <div><a href=""><img src="assets/images/icons/navigate.svg"></a></div>
         <div><a href=""><img src="assets/images/icons/plus.svg"></a></div>
         <div><a href=""><img src="assets/images/icons/minus.svg"></a></div>
       </nav>
     </div>
    
  </div>
  <!--==========End Main Content Area==========-->

<script type="text/javascript">
$( document ).ready(function() {
  
  });
</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

