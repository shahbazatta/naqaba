<?php 
require_once("config/config.php");
require_once("verify/verify.php");
require_once("lang/language.php");
require_once("data/get_avlDevicesDataAll.php");
$classObject = new GetAvlDevicesData();
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

<!-- Scroll Bar -->
<link type="text/css" href="assets/plugin/scrollBar/css/perfect-scrollbar.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="assets/plugin/scrollBar/js/perfect-scrollbar.js"></script>

<!--Table Sorter-->
<script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css" />

<!-- Full Screen Browser Js  -->
<script src="assets/plugin/fullScreen/jquery.fullscreen-min.js"></script>

<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

<!-- Custom Code -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/gis/main.js"></script>
<script src="assets/js/gis/ol-ext.js"></script>
<link rel="stylesheet" href="assets/css/ol-ext.css" type="text/css" />

<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />

<?php if ($lang_type == 'ar'){ ?>
<link rel="stylesheet" href="assets/css/style_arabic.css" type="text/css" media="screen" />
<?php } ?>

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
     <?php include 'include/right_nav.php'; ?>

     <!-- Left Top Buttons -->
     <!-- <div class="leftTopButtons">
       <nav>
         
         <div id="activeDGF"><a href="javascript:void(0)" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
         <div id="deactiveDGF"><a href="javascript:void(0)" id="de_draw_geofence"><img src="assets/images/icons/close.svg"></a></div>
         
      
       </nav>
     </div> -->

     <!-- Left Bottom Buttons -->
     <div class="leftBottomButtons">
       <nav>
         <div>
          <div onclick="zoomTo(+1)"><a href="javascript:void(0)"><img src="assets/images/icons/plus.svg"></a></div>
          <div onclick="zoomTo(-1)"><a href="javascript:void(0)"><img src="assets/images/icons/minus.svg"></a></div>
        </div>
        
       </nav>
     </div>
     <div class="leftBottomButtonsR">
       <nav>
        <div>
          <div onclick="resetExtent()"><a href="javascript:void(0)"><img src="assets/images/icons/navigate.svg"></a></div>
          <div id="fullScreenOn" class="fullscreen"><a href="javascript:void(0)"><img src="assets/images/icons/maximize.svg"></a></div>
          <div id="fullScreenOff" class=""><a href="javascript:void(0)" id="de_draw_geofence"><img src="assets/images/icons/close.svg"></a></div>
        </div>
        
       </nav>
     </div>

  </div>
  <!--==========End Main Content Area==========-->


<!-- All Bus Popups -->
<?php include 'include/bus.php'; ?>

<!-- All Geofence Popups -->
<?php include 'include/geofence.php'; ?>


<!-- Notification -->
<div class="notification">
  <div class="nWrapper"></div>
  <p id="notificationText"></p>
  <div class="nClose"><img src="assets/images/icons/close.svg"></div>
</div>


<!-- Loading  -->
<div class="loadingData">
  <div id="loadingBusData"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'LoadingBusData'); ?>...</div>
  <div id="loadingGeofenceData"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'LoadingGeofenceData'); ?>...</div>
</div>

<!-- Bus Counter  -->
<div class="busCounterData">
    <span id="showBusData">0</span> / <span id="totalBusData">0</span>
</div>

<script type="text/javascript">
$( document ).ready(function() {

  //showNotification("Success: Here is text for notification");
  //showConfirmation("Do you really want to delete?");
  //$("#confirmationBox").show();
  //$('#newGeofenceDialogBox').show();
  //$('#busDialogBox').show();
  //$('#geofenceDialogBox').show();
});
</script>
<script src="assets/js/functions.js"></script>
</body>
</html>

