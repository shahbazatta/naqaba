<?php 
require_once("verify/verify.php");
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

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

<!--Table Sorter-->
<script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
<link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css" />
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
     <div class="rightMenu">
       <a href="" class="miniLogo" title="">
         <img src="assets/images/mini_logo.png">
       </a>
       <nav>
          <div class="trackingCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/gps.svg"></a>

            <div class="popMenuBox" id="trackingComBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingComSearch" id="trackingComSearch" placeholder="Search Company" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>

              <div class="headerList">
                <h1>Tracking Companies</h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="trackingComSeAl" class="lebelText"> Search All</label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows">

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow1" name="listRow1" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow1" class="lebelText">
                    <img src="assets/images/companies/c1.png">
                    <p>Machinestalk</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow2" name="listRow2" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow2" class="lebelText">
                    <img src="assets/images/companies/c2.png">
                    <p>Sober Me Up</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow3" name="listRow3" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow3" class="lebelText">
                    <img src="assets/images/companies/c3.png">
                    <p>Engineer Guarantee</p>
                  </label>
                  <div class="clear"></div>
                </div>

              </div>
            </div>

          </div>

          <div class="transportationCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck.svg"></a>

            <div class="popMenuBox" id="transportationComBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingComSearch" id="trackingComSearch" placeholder="Search Company" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>
              <div class="headerList">
                <h1>Transportation Companies</h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="trackingComSeAl" class="lebelText"> Search All</label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows">

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow1" name="listRow1" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow1" class="lebelText">
                    <img src="assets/images/companies/c1.png">
                    <p>Saudi Public Transport Company</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow2" name="listRow2" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow2" class="lebelText">
                    <img src="assets/images/companies/c2.png">
                    <p>Makkah Transport Company</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow3" name="listRow3" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow3" class="lebelText">
                    <img src="assets/images/companies/c3.png">
                    <p>Dollah Company for Transporting Pilgrims</p>
                  </label>
                  <div class="clear"></div>
                </div>

              </div>
            </div>

          </div>

          <div class="trackingDevices">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck_fast.svg"></a>

            <div class="popMenuBox" id="trackingDevicesBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingDevicesSearch" value="" onkeyup="trackingDevicesSearchEvent('trackingDevicesSearch')" id="trackingDevicesSearch" placeholder="Search Device" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>
              <div class="headerList">
                <h1>Tracking Devices</h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="trackingComSeAl" class="lebelText"> Search All</label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows" id="">

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow1" name="listRow1" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow1" class="lebelText">
                    <img src="assets/images/companies/c1.png">
                    <p>BCE</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow2" name="listRow2" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow2" class="lebelText">
                    <img src="assets/images/companies/c2.png">
                    <p>Teltonika</p>
                  </label>
                  <div class="clear"></div>
                </div>

                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="listRow3" name="listRow3" value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="listRow3" class="lebelText">
                    <img src="assets/images/companies/c3.png">
                    <p>Machinestalk</p>
                  </label>
                  <div class="clear"></div>
                </div>

              </div>
            </div>
            
          </div>

          <div class="busFinder">
            <a href="javascript:void(0)"><img src="assets/images/icons/bus.svg"></a>

            <div class="popMenuBox busFinderBox" id="busFinderBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingComSearch" id="trackingComSearch" placeholder="Search IMEI Number" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>

              <!--Companies list-->
              <div class="mainListRows">
                <table id="busFinderTable" class="tableNeo tablesorter">
                  <thead>
                    <tr>
                      <th>IMEI No.</th>
                      <th>Bus No.</th>
                      <th>Bus Operating No.</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        357-9120-4987-6543
                      </td>
                      <td>123-A</td>
                      <td>6547</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        357-9120-4987-6543
                      </td>
                      <td>123-A</td>
                      <td>6547</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        357-9120-4987-6543
                      </td>
                      <td>123-A</td>
                      <td>6547</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

          <div class="geofences">
            <a href="javascript:void(0)"><img src="assets/images/icons/barcode.svg"></a>

            <div class="popMenuBox geofencesBox" id="geofencesBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingComSearch" id="trackingComSearch" placeholder="Search Company" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>

              <!--Companies list-->
              <div class="mainListRows">
                <table id="geofencesTable" class="tableNeo tablesorter">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Type</th>
                      <th>Station Name</th>
                      <th>Station Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        SAPTCO
                      </td>
                      <td>Testing</td>
                      <td>Motor Coach</td>
                      <td>Jeddah</td>
                      <td>JDH</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        Al Qassim
                      </td>
                      <td>Testing</td>
                      <td>Motor Coach</td>
                      <td>Dammam</td>
                      <td>DMS</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                    <tr>
                      <td>
                        <label class="cCheckBox2">
                          <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" value="">
                          <span class="checkmark"></span>
                        </label>
                        Abaqaiq
                      </td>
                      <td>Testing</td>
                      <td>Motor Coach</td>
                      <td>Al-Hofuf</td>
                      <td>AH</td>
                      <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            
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
                    <option value="2" selected><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabic'); ?></option>  
                    <option value="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'english'); ?></option>
                  </select>
                </div>
              </div>

              <!--Select Map Point-->
              <div class="rowDropdown">
                <h2><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'selectMapPoint'); ?></h2>
                <div class="mapPoint">
                  <div class="pointSv">
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
                  <div class="pointSv active">
                    <img class="tick" src="assets/images/icons/tick-circle.png">
                    <img id="bubble" src="assets/images/icons/mapPoint4.png">
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

          <div class="logout"><a href="login.php?logout"><img src="assets/images/icons/exit.svg"></a></div>
       </nav>
     </div>

     <!-- Left Top Buttons -->
     <div class="leftTopButtons">
       <nav>

         <!-- <div id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></div>
         <div><img src="assets/images/icons/maximize.svg"></div> -->

         <div id="activeDGF"><a href="javascript:void(0)" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
         <div id="deactiveDGF"><a href="javascript:void(0)" id="de_draw_geofence"><img src="assets/images/icons/close.svg"></a></div>
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
      <!-- <h1 class="text2">Driver Name<span>Makkah Road</span></h1> -->
    </div>
    <div class="boxBody">
      <table>
        <tr>
          <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'iMEINumber'); ?>
            <span id="imei_no">869688059316101</span>
          </td>
          <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Avltm'); ?>
            <span id ="avltm">1685387722000</span>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="oData">
              <p><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Avl'); ?>
                <span id ="avl">157</span>
              </p>
              <p><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Ang'); ?>
                <span id ="ang">45</span>
              </p>
              <p><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Spd'); ?>
                <span id ="speed">101</span>
              </p>
              <p><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Odata'); ?>
                <span id ="odata">3000</span>
              </p>
            </div>
            
          </td>
        </tr>
        <tr>
          <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Createdon'); ?>
            <span id ="cr_time">14/05/2023</span>
          </td>
          <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Updatedon'); ?>
            <span id ="up_time">02/06/2023</span>
          </td>
        </tr>
        <tr>
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'busNumber'); ?>
            <span id ="bus_no">6474f9da97c5bc121663c1a9</span>
          </td>
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'DeviceCompany'); ?>
            <span id ="device_comp">6474f9da97c5bc121663c1a9</span>
          </td>
        </tr>
        <tr>
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'OperatorNo'); ?>
            <span id ="operator_no">1685387738376</span>
          </td>
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'EnginePlateNo'); ?>
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
    <span class="close exit" id="geofenceDialogBoxExitEvent"></span>
    <div class="boxHeader">
      <img src="assets/images/icons/icon-fg.png">
      <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'GeofenceInformation'); ?></h1>
    </div>
    <div id="result"></div>
    <div id="geofenceDialogBoxData">
      <div class="boxBody">
        <table>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabicName'); ?>
              <span id ="arabicNameGeofence" ></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'englishName'); ?>
              <span id ="englishNameGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?>
              <span id ="typeGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'district'); ?>
              <span id ="districtGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'area'); ?>
              <span id ="areaGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?>
              <span id ="descriptionGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'category'); ?>
              <span id ="categoryGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'site'); ?>
              <span id ="siteGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationType'); ?>
              <span id ="stationTypeGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?>
              <span id ="stationCodeGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?>
              <span id ="stationNameGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'codeId'); ?>
              <span id ="codeIdGeofence"></span>
            </td>
          </tr>
          <tr>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'shapeLength'); ?>
              <span id ="shapeLengthGeofence"></span>
            </td>
            <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'shapeArea'); ?>
              <span id ="shapeAreaGeofence"></span>
            </td>
          </tr>
        </table>
      </div>
      <div class="boxFooter">
        <button type="button" class="exportGeo" id="" onclick=""><img src="assets/images/icons/export.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'exportGeoJSON'); ?></span>
        </button>
        <button type="button" class="delete" id="geofenceDelete" onclick=""><img src="assets/images/icons/trash.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'delete'); ?></span>
        </button>
        <button type="button" class="edit" id="geofenceDialogBoxEditClickButton" onclick=""><img src="assets/images/icons/edit.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'edit'); ?></span>
        </button>
      </div>
    </div>
    <div id="geofenceDialogBoxDataEdit" class="d-none">
      <div class="boxBody">
          <table>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabicName'); ?>
                <div class="formRow">
                  <input type="text" id="arabic_name_toolTip" name="arabic_name_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'englishName'); ?>
                <div class="formRow">
                  <input type="text" id="english_name_toolTip" name="english_name_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?>
                <div class="formRow">
                  <input type="text" id="type_toolTip" name="type_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'district'); ?>
                <div class="formRow">
                  <input type="text" id="district_toolTip" name="district_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'area'); ?>
                <div class="formRow">
                  <input type="text" id="area_toolTip" name="area_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?>
                <div class="formRow">
                  <input type="text" id="description_toolTip" name="description_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'category'); ?>
                <div class="formRow">
                  <input type="text" id="category_toolTip" name="category_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'site'); ?>
                <div class="formRow">
                  <input type="text" id="site_toolTip" name="site_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationType'); ?>
                <div class="formRow">
                  <input type="text" id="station_type_toolTip" name="station_type_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?>
                <div class="formRow">
                  <input type="text" id="station_code_toolTip" name="station_code_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?>
                <div class="formRow">
                  <input type="text" id="station_name_toolTip" name="station_name_toolTip" class="text">
                </div>
              </td>
              <td class="d-none"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'codeId'); ?>
                <div class="formRow">
                  <input type="text" id="code_id_toolTip" name="code_id_toolTip" class="text">
                </div>
              </td>
            </tr>
            <tr>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'shapeLength'); ?>
                <div class="formRow">
                  <input type="number" id="shape_length_toolTip" name="shape_length_toolTip" class="text">
                </div>
              </td>
              <td><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'shapeArea'); ?>
                <div class="formRow">
                  <input type="number" id="shape_area_toolTip" name="shape_area_toolTip" class="text">

                  <input type="hidden" id="coordinate_arr_toolTip"  name="coordinate_arr_toolTip" class="text">

                </div>
              </td>
            </tr>
          </table>
      </div>
      <div class="boxFooter">
          <button type="button" class="delete" id="geofenceUpdate" onclick="">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Update'); ?></span>
          </button>
          <button type="button" class="edit" id="geofenceDialogBoxEditClickCancelButton" onclick="">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Cancel'); ?></span>
          </button>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  function getAvlDevicesData()
{
	
    $.ajax({
         url: "data/get_avlDevicesData.php",
         method: "POST",
         dataType: "json",
        data: {
          api_key: "becdf4fbbbf49dbc",
         },
         success: function(data){
			 console.log(data);
			 debugger
			 },
         error: function (jqXHR, exception) {
           var msg = '';
          //alert(msg);
           console.log(jqXHR.responseText);

           if (jqXHR.status === 0) {
             msg = 'Not connect.\n Verify Network.';
           } else if (jqXHR.status == 404) {
             msg = 'Requested page not found. [404]';
           } else if (jqXHR.status == 500) {
             msg = 'Internal Server Error [500].';
           } else if (exception === 'parsererror') {
             msg = 'Requested JSON parse failed.';
           } else if (exception === 'timeout') {
             msg = 'Time out error.';
           } else if (exception === 'abort') {
             msg = 'Ajax request aborted.';
           } else {
             msg = 'Uncaught Error.\n' + jqXHR.responseText;
           }
           alert(msg);
          // $('#toolTipBox').show();
         },
     });
}
$( document ).ready(function() {

  //$('#busDialogBox').show();
  //$('#geofenceDialogBox').show();

  getAvlDevicesData();
  $("#geofenceSave").click(function() { 
        //get input field values
        var arabic_name     = $('#arabic_name').val(); 
        var english_name    = $('#english_name').val();
        var type            = $('#type').val();
        var district        = $('#district').val();
        var area            = $('#area').val();
        var description     = $('#description').val();
        var category        = $('#category').val();
        var site            = $('#site').val();
        var station_type    = $('#station_type').val();
        var station_code    = $('#station_code').val();
        var station_name    = $('#station_name').val();
        var code_id         = $('#code_id').val();
        var shape_length    = $('#shape_length').val();
        var shape_area      = $('#shape_area').val();
        var coordinate_arr  = $('#coordinate_arr').val();
        var flag = true;
        /********validate all our form fields***********/
        if(arabic_name==""){ $('#arabic_name').css('border-color','red'); flag = false; }
        if(english_name==""){ $('#english_name').css('border-color','red'); flag = false; } 
        if(type=="") { $('#type').css('border-color','red'); flag = false; }
        if(district=="") { $('#district').css('border-color','red'); flag = false; }
        if(area=="") { $('#area').css('border-color','red'); flag = false; }
        if(description=="") { $('#description').css('border-color','red'); flag = false; }
        if(category=="") { $('#category').css('border-color','red'); flag = false; }
        if(site=="") { $('#site').css('border-color','red'); flag = false; }
        if(station_type=="") { $('#station_type').css('border-color','red'); flag = false; }
        if(station_code=="") { $('#station_code').css('border-color','red'); flag = false; }
        if(station_name=="") { $('#station_name').css('border-color','red'); flag = false; }
        if(code_id=="") { $('#code_id').css('border-color','red'); flag = false; }
        if(shape_length=="") { $('#shape_length').css('border-color','red'); flag = false; }
        if(shape_area=="") { $('#shape_area').css('border-color','red'); flag = false; }
        if(coordinate_arr=="") { 
          $("#result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
          flag = false; 
        }

        //check int
        if(Math.floor(station_type) == station_type && $.isNumeric(station_type)){ }else{ $('#station_type').css('border-color','red').val(''); flag = false; }
        if(Math.floor(station_code) == station_code && $.isNumeric(station_code)){ }else{ $('#station_code').css('border-color','red').val(''); flag = false; }
        
        // check float
        if($.isNumeric(area)){ }else{ $('#area').css('border-color','red').val('');  flag = false; }
        if($.isNumeric(shape_length)){ }else{ $('#shape_length').css('border-color','red').val(''); flag = false; }
        if($.isNumeric(shape_area)){ }else{ $('#shape_area').css('border-color','red').val(''); flag = false; }

        /********Validation end here ****/
        /* If all are ok then we send ajax request to email_send.php *******/
        if(flag) 
        {
            $.ajax({
                type: 'post',
                url: "./data/set_geofence.php", 
                dataType: 'json',
                data: {
                  arabic_name : arabic_name,
                  english_name : english_name,
                  type : type,
                  district : district,
                  area : area,
                  description : description,
                  category : category,
                  site : site,
                  station_type : station_type,
                  station_code : station_code,
                  station_name : station_name,
                  code_id : code_id,
                  shape_length : shape_length,
                  shape_area : shape_area,
                  coordinates : coordinate_arr
                },
                beforeSend: function() {
                    $('#geofenceSave').attr('disabled', true);
                    //$('#geofenceSave').after('<span class="wait">&nbsp;<img src="image/loading.gif" alt="" /></span>');
                },
                complete: function() {
                    $('#geofenceSave').attr('disabled', false);
                    //$('.wait').remove();
                },  
                success: function(data)
                {
                  if(data.type == 'error')
                  {
                      output = '<div class="error">'+data.text+'</div>';
                  }else{
                      output = '<div class="success">'+data.text+'</div>';
                      $('#geofenceAdd input[type=text]').val(''); 
                      $('#geofenceAdd textarea').val(''); 

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
                  }

                  $("#result").hide().html(output).slideDown();
                          
                }
            });
        }
    });

  });

  $("#geofenceUpdate").click(function() { 
        //get input field values
        var arabic_name     = $('#arabic_name_toolTip').val(); 
        var english_name    = $('#english_name_toolTip').val();
        var type            = $('#type_toolTip').val();
        var district        = $('#district_toolTip').val();
        var area            = $('#area_toolTip').val();
        var description     = $('#description_toolTip').val();
        var category        = $('#category_toolTip').val();
        var site            = $('#site_toolTip').val();
        var station_type    = $('#station_type_toolTip').val();
        var station_code    = $('#station_code_toolTip').val();
        var station_name    = $('#station_name_toolTip').val();
        var code_id         = $('#code_id_toolTip').val();
        var shape_length    = $('#shape_length_toolTip').val();
        var shape_area      = $('#shape_area_toolTip').val();
        var coordinate_arr  = $('#coordinate_arr_toolTip').val();
        var flag = true;
        /********validate all our form fields***********/
        if(arabic_name==""){ $('#arabic_name_toolTip').css('border-color','red'); flag = false; }
        if(english_name==""){ $('#english_name_toolTip').css('border-color','red'); flag = false; } 
        if(type=="") { $('#type_toolTip').css('border-color','red'); flag = false; }
        if(district=="") { $('#district_toolTip').css('border-color','red'); flag = false; }
        if(area=="") { $('#area_toolTip').css('border-color','red'); flag = false; }
        if(description=="") { $('#description_toolTip').css('border-color','red'); flag = false; }
        if(category=="") { $('#category_toolTip').css('border-color','red'); flag = false; }
        if(site=="") { $('#site_toolTip').css('border-color','red'); flag = false; }
        if(station_type=="") { $('#station_type_toolTip').css('border-color','red'); flag = false; }
        if(station_code=="") { $('#station_code_toolTip').css('border-color','red'); flag = false; }
        if(station_name=="") { $('#station_name_toolTip').css('border-color','red'); flag = false; }
        if(code_id=="") { $('#code_id_toolTip').css('border-color','red'); flag = false; }
        if(shape_length=="") { $('#shape_length_toolTip').css('border-color','red'); flag = false; }
        if(shape_area=="") { $('#shape_area_toolTip').css('border-color','red'); flag = false; }
        if(coordinate_arr=="") { 
          $("#result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
          flag = false; 
        }

        //check int
        if(Math.floor(station_type) == station_type && $.isNumeric(station_type)){ }else{ $('#station_type_toolTip').css('border-color','red').val(''); flag = false; }
        if(Math.floor(station_code) == station_code && $.isNumeric(station_code)){ }else{ $('#station_code_toolTip').css('border-color','red').val(''); flag = false; }
        
        // check float
        if($.isNumeric(area)){ }else{ $('#area_toolTip').css('border-color','red').val('');  flag = false; }
        if($.isNumeric(shape_length)){ }else{ $('#shape_length_toolTip').css('border-color','red').val(''); flag = false; }
        if($.isNumeric(shape_area)){ }else{ $('#shape_area_toolTip').css('border-color','red').val(''); flag = false; }

        /********Validation end here ****/
        /* If all are ok then we send ajax request to email_send.php *******/
        if(flag) 
        {
            $.ajax({
                type: 'post',
                url: "./data/update_geofence.php", 
                dataType: 'json',
                data: {
                  arabic_name : arabic_name,
                  english_name : english_name,
                  type : type,
                  district : district,
                  area : area,
                  description : description,
                  category : category,
                  site : site,
                  station_type : station_type,
                  station_code : station_code,
                  station_name : station_name,
                  code_id : code_id,
                  shape_length : shape_length,
                  shape_area : shape_area,
                  coordinates : coordinate_arr
                },
                beforeSend: function() {
                    $('#geofenceSave').attr('disabled', true);
                    //$('#geofenceSave').after('<span class="wait">&nbsp;<img src="image/loading.gif" alt="" /></span>');
                },
                complete: function() {
                    $('#geofenceSave').attr('disabled', false);
                    //$('.wait').remove();
                },  
                success: function(data)
                {
                  if(data.type == 'error')
                  {
                      output = '<div class="error">'+data.text+'</div>';
                  }else{
                      output = '<div class="success">'+data.text+'</div>';
                      $('#geofenceAdd input[type=text]').val(''); 
                      $('#geofenceAdd textarea').val(''); 

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
                  }

                  $("#result").hide().html(output).slideDown();
                          
                }
            });
        }
    });

    $("#geofenceDelete").click(function() { 
        //get input field values
        var arabic_name     = $('#arabic_name').val(); 
        var english_name    = $('#english_name').val();
        var type            = $('#type').val();
        var district        = $('#district').val();
        var area            = $('#area').val();
        var description     = $('#description').val();
        var category        = $('#category').val();
        var site            = $('#site').val();
        var station_type    = $('#station_type').val();
        var station_code    = $('#station_code').val();
        var station_name    = $('#station_name').val();
        var code_id         = $('#code_id').val();
        var shape_length    = $('#shape_length').val();
        var shape_area      = $('#shape_area').val();
        var coordinate_arr  = $('#coordinate_arr').val();
        var flag = true;
        /********validate all our form fields***********/
        if(arabic_name==""){ $('#arabic_name').css('border-color','red'); flag = false; }
        if(english_name==""){ $('#english_name').css('border-color','red'); flag = false; } 
        if(type=="") { $('#type').css('border-color','red'); flag = false; }
        if(district=="") { $('#district').css('border-color','red'); flag = false; }
        if(area=="") { $('#area').css('border-color','red'); flag = false; }
        if(description=="") { $('#description').css('border-color','red'); flag = false; }
        if(category=="") { $('#category').css('border-color','red'); flag = false; }
        if(site=="") { $('#site').css('border-color','red'); flag = false; }
        if(station_type=="") { $('#station_type').css('border-color','red'); flag = false; }
        if(station_code=="") { $('#station_code').css('border-color','red'); flag = false; }
        if(station_name=="") { $('#station_name').css('border-color','red'); flag = false; }
        if(code_id=="") { $('#code_id').css('border-color','red'); flag = false; }
        if(shape_length=="") { $('#shape_length').css('border-color','red'); flag = false; }
        if(shape_area=="") { $('#shape_area').css('border-color','red'); flag = false; }
        if(coordinate_arr=="") { 
          $("#result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
          flag = false; 
        }

        //check int
        if(Math.floor(station_type) == station_type && $.isNumeric(station_type)){ }else{ $('#station_type').css('border-color','red').val(''); flag = false; }
        if(Math.floor(station_code) == station_code && $.isNumeric(station_code)){ }else{ $('#station_code').css('border-color','red').val(''); flag = false; }
        
        // check float
        if($.isNumeric(area)){ }else{ $('#area').css('border-color','red').val('');  flag = false; }
        if($.isNumeric(shape_length)){ }else{ $('#shape_length').css('border-color','red').val(''); flag = false; }
        if($.isNumeric(shape_area)){ }else{ $('#shape_area').css('border-color','red').val(''); flag = false; }

        /********Validation end here ****/
        /* If all are ok then we send ajax request to email_send.php *******/
        if(flag) 
        {
            $.ajax({
                type: 'post',
                url: "./data/delete_geofence.php", 
                dataType: 'json',
                data: {
                  arabic_name : arabic_name,
                  english_name : english_name,
                  type : type,
                  district : district,
                  area : area,
                  description : description,
                  category : category,
                  site : site,
                  station_type : station_type,
                  station_code : station_code,
                  station_name : station_name,
                  code_id : code_id,
                  shape_length : shape_length,
                  shape_area : shape_area,
                  coordinates : coordinate_arr
                },
                beforeSend: function() {
                    $('#geofenceSave').attr('disabled', true);
                    //$('#geofenceSave').after('<span class="wait">&nbsp;<img src="image/loading.gif" alt="" /></span>');
                },
                complete: function() {
                    $('#geofenceSave').attr('disabled', false);
                    //$('.wait').remove();
                },  
                success: function(data)
                {
                  if(data.type == 'error')
                  {
                      output = '<div class="error">'+data.text+'</div>';
                  }else{
                      output = '<div class="success">'+data.text+'</div>';
                      $('#geofenceAdd input[type=text]').val(''); 
                      $('#geofenceAdd textarea').val(''); 

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
                  }

                  $("#result").hide().html(output).slideDown();
                          
                }
            });
        }
    });
</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

