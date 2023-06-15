<?php 
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
     <div class="rightMenu">
       <a href="" class="miniLogo" title="">
         <img src="assets/images/mini_logo.png">
       </a>
       <nav>
          <div class="trackingCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/gps.svg"></a>

            <div class="popMenuBox" id="trackingComBox">
              <div class="searchBoxForMenu">
                <input type="text" onkeyup="trackingDevicesSearchEvent('trackingDevicesSearch')"  name="trackingComSearch" id="trackingComSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchCompany'); ?>" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>

              <div class="headerList">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingCompanies'); ?></h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" checked value="true">
                    <span class="checkmark"></span>
                  </label>
                  <label for="trackingComSeAl" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows newScrollBar" id="mainListRowscompanyList">



                <!-- <div class="listRow">
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
                </div> -->

              </div>
            </div>

          </div>

          <div class="transportationCom">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck.svg"></a>

            <div class="popMenuBox" id="transportationComBox">
              <div class="searchBoxForMenu">
                <input type="text" onkeyup="trackingDevicesSearchEvent('trackingDevicesSearch')" name="TransportationComSearch" id="TransportationComSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchCompany'); ?>" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>
              <div class="headerList">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompanies'); ?></h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="mainListRowsTransportationCompanies" name="mainListRowsTransportationCompanies" checked value="true">
                    <span class="checkmark"></span>
                  </label>
                  <label for="mainListRowsTransportationCompanies" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTransportationCompaniesDynamic">

                <!-- <div class="listRow">
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
                </div> -->

              </div>
            </div>

          </div>

          <div class="trackingDevices">
            <a href="javascript:void(0)"><img src="assets/images/icons/truck_fast.svg"></a>

            <div class="popMenuBox" id="trackingDevicesBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingDevicesSearch" value="" onkeyup="trackingDevicesSearchEvent('trackingDevicesSearch')" id="trackingDevicesSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchDevice'); ?>" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>
              <div class="headerList">
                <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingDevices'); ?></h1>
                <div class="close"><img src="assets/images/icons/close.svg"></div>
                <div class="selectAllCheckBox">
                  <label class="cCheckBox2">
                    <input type="checkbox" id="trackingComSeAl" name="trackingComSeAl" checked value="">
                    <span class="checkmark"></span>
                  </label>
                  <label for="trackingComSeAl" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
                </div>
              </div>

              <!--Companies list-->
              <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTrackingDevices">

                <!-- <div class="listRow">
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
                </div> -->

              </div>
            </div>
            
          </div>

          <div class="busFinder">
            <a href="javascript:void(0)"><img src="assets/images/icons/bus.svg"></a>

            <div class="popMenuBox busFinderBox" id="busFinderBox">
              <div class="searchBoxForMenu">
                <input type="text" name="trackingComSearch" id="trackingComSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchIMEINumber'); ?>" class="search">
                <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
              </div>

              <!--Companies list-->
              <div class="mainListRows newScrollBar">
                <table id="busFinderTable" class="tableNeo tablesorter">
                  <thead>
                    <tr>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'IMEINo'); ?></th>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'BusNo'); ?></th>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'BusOperatingNo'); ?></th>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Action'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $count = 0;
                      foreach ($classObject->avl_Bus_data as $output) {
                        $count ++;
                        if ($lang_type == 'ar'){
                          $plate_no = $output['plate_no'];
                        }
                        else{
                          $plate_no = $output['engplate_no'];
                        }
                        echo "<tr>
                                <td>
                                  <label class='cCheckBox2'>
                                    <input type='checkbox' id='' name='' value=''>
                                    <span class='checkmark'></span>
                                  </label>
                                  ".(int)$output['imei']."
                                </td>
                                <td>".$plate_no."</td>
                                <td>".$output['bus_oper_no']."</td>
                                <td><button type='button' class='actionBtn'><img src='assets/images/icons/more.svg'></button></td>
                              </tr>";
                        if ($count == 100) {
                          break;
                        }
                      }
                    ?>
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
              <div class="mainListRows newScrollBar">
                <table id="geofencesTable" class="tableNeo tablesorter">
                  <thead>
                    <tr>
                      <th width="370px"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Name'); ?></th>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?></th>
                      <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?></th>
                      <th width="120px"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?></th>
                      <th width="120px"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?></th>
                      <th width="70px"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Action'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($classObject->geofence_data as $output) {
                        if(isset($output['attributes']['Arabic_Name']) && isset($output['attributes']['English_Name'])){
                          if ($lang_type == 'ar'){
                            $name = $output['attributes']['Arabic_Name'];
                          }
                          else{
                            $name = $output['attributes']['English_Name'];
                          }
                          echo "<tr>
                                <td>
                                  <label class='cCheckBox2'>
                                    <input type='checkbox' id='' name='' value=''>
                                    <span class='checkmark'></span>
                                  </label>
                                  ".$name."
                                </td>
                                <td>".$output['attributes']['Description']."</td>
                                <td>".$output['attributes']['Type']."</td>
                                <td>".$output['attributes']['Station_Name']."</td>
                                <td>".$output['attributes']['Station_Code']."</td>
                                <td><button type='button' class='actionBtn'><img src='assets/images/icons/more.svg'></button></td>
                              </tr>";
                        }
                      }

                    ?>

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
         <div onclick="zoomTo(+1)"><a href="javascript:void(0)"><img src="assets/images/icons/plus.svg"></a></div>
         <div onclick="zoomTo(-1)"><a href="javascript:void(0)"><img src="assets/images/icons/minus.svg"></a></div>
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

<script type="text/javascript">


  $( document ).ready(function() {

    //showNotification("Success: Here is text for notification");
    //showConfirmation("Do you really want to delete?");
    
    //$("#confirmationBox").show();

    $(".nClose").click(function() { 
        $('.notification').animate({top:"0px",opacity:"0.1"}, function(){
        $('.notification').hide();
        $('.notification').css({"opacity":"1.0"});
      });
    });

    $(".noConfirm").click(function() { 
        $('.boxPopUpTabCon').animate({top:"0px",opacity:"0.1"}, function(){
        $('.boxPopUpTabCon').hide();
        $('.boxPopUpTabCon').css({"opacity":"1.0","top":"50%"});
        $("#confirmationBox").hide();
        $('.boxPopUpTabCon').show();
      });
    });

    $(".yesConfirm").click(function() { 
      $("#confirmationBox").hide();
      $(".popUpBox").hide();
    });

  });

  function showNotification(txt)
  {
    $("#notificationText").html(txt);
    $(".notification").show();
      setTimeout(function(){
        $('.notification').animate({top:"0px",opacity:"0.1"}, function(){
        $('.notification').hide();
        $('.notification').css({top:"20px","opacity":"1.0"});
        });        
      }, 6000);
  }
  function showConfirmation(txt)
  {
    $("#confirmationText").html(txt);
    $("#confirmationBox").show();
  }



var companyList = [];

var transportationCompanyList = [];

var devicesList = [];

function loadFiltersDatacompanyList(list) {
  var x = "";
  // <img src="assets/images/companies/c1.png">
  for (let i = 0; i < list.length; i++) {
    x = x  +  `
                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" onchange="updateFilterList1(${list[i]},${i});" id="companyListlistRow${i}" name="companyListlistRow${i}" checked value="true">
                    <span class="checkmark"></span>
                  </label>
                  <label for="companyListlistRow${i}" class="lebelText">
                    <p> ${list[i].avl_comp}
                     </p>
                  </label>
                  <div class="clear"></div>
                </div> 

                `
    ;
  }
  document.getElementById("mainListRowscompanyList").innerHTML = x;
}

function loadFiltersDataDevicesCompany(list) {
  var x = "";
  // <img src="assets/images/companies/c1.png">
  for (let i = 0; i < list.length; i++) {
    x = x  +  `
                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" onchange="updateFilterList2(${list[i]},${i});" id="TrackingDeviceslistRow${i}" name="TrackingDeviceslistRow${i}" checked value="true">
                    <span class="checkmark"></span>
                  </label>
                  <label for="TrackingDeviceslistRow${i}" class="lebelText">
                    <p> ${list[i].device_comp}
                     </p>
                  </label>
                  <div class="clear"></div>
                </div> 

                `
    ;
  }
  document.getElementById("mainListRowsTrackingDevices").innerHTML = x;
}

function loadFiltersDatatransportationCompanyList(list) {
  var x = "";
  // <img src="assets/images/companies/c1.png">
  for (let i = 0; i < list.length; i++) {
    x = x  +  `
                <div class="listRow">
                  <label class="cCheckBox2">
                    <input type="checkbox" onchange="updateFilterList3(${list[i]},${i});" id="mainListRowsTransportationCompaniesDynamiclistRow${i}" name="mainListRowsTransportationCompaniesDynamiclistRow${i}" checked value="true">
                    <span class="checkmark"></span>
                  </label>
                  <label for="mainListRowsTransportationCompaniesDynamiclistRow${i}" class="lebelText">
                    <p> ${list[i].trnspt_comp}
                     </p>
                  </label>
                  <div class="clear"></div>
                </div> 

                `
    ;
  }
  document.getElementById("mainListRowsTransportationCompaniesDynamic").innerHTML = x;
}

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

          if(data && data.length){
            for (let i = 0; i < data.length; i++) {
              companyList.push(
                {
                  avl_comp: data[i].avl_comp,
                  avl_comp_ar: data[i].avl_comp_ar,
                  avl_comp_id: data[i].avl_comp_id,
                }
              );
              transportationCompanyList.push(
                {
                  trnspt_comp : data[i].trnspt_comp, 
                  trnspt_comp_ar : data[i].trnspt_comp_ar, 
                  trnspt_comp_id : data[i].trnspt_comp_id, 
                }
              );
              devicesList.push(
                {device_comp:data[i].device_comp}
              );
            }
            devicesList = [...new Map(devicesList.map(v => [v.device_comp, v])).values()];
            transportationCompanyList = [...new Map(transportationCompanyList.map(v => [v.trnspt_comp_id, v])).values()];
            companyList = [...new Map(companyList.map(v => [v.avl_comp_id, v])).values()];
            
            loadFiltersDataDevicesCompany(devicesList);
            loadFiltersDatatransportationCompanyList(transportationCompanyList);
            loadFiltersDatacompanyList(companyList);
          }
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
  getAvlDevicesData();

  //$('#newGeofenceDialogBox').show();
  //$('#busDialogBox').show();
  //$('#geofenceDialogBox').show();

});




</script>

<script src="assets/js/functions.js"></script>

</body>
</html>

