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

        <!--Transportaion list-->
        <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTransportationCompaniesDynamic">

          <!-- <div class="listRow">
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
              <input type="checkbox" id="devicesSeAl" name="devicesSeAl" checked value="">
              <span class="checkmark"></span>
            </label>
            <label for="devicesSeAl" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
          </div>
        </div>

        <!--Devices list-->
        <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTrackingDevices">

          <!-- <div class="listRow">
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
          <input type="text" name="busListSearch" id="busListSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchIMEINumber'); ?>" class="search">
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
              <tr>
                <td>
                  <label class='cCheckBox2'>
                    <input type='checkbox' id='' name='' value=''>
                    <span class='checkmark'></span>
                  </label>
                  43545435345
                </td>
                <td>A34</td>
                <td>R567DF</td>
                <td><button type='button' class='actionBtn'><img src='assets/images/icons/more.svg'></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>

    <div class="geofences">
      <a href="javascript:void(0)"><img src="assets/images/icons/routing.png"></a>

      <div class="popMenuBox geofencesBox" id="geofencesBox">
        <div class="searchBoxForMenu">
          <input type="text" name="geofenceSearch" id="geofenceSearch" placeholder="Search Company" class="search">
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
                    <input type="checkbox" id="" name="" value="">
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

              <!-- <tr>
                <td>
                  <label class="cCheckBox2">
                    <input type="checkbox" id="" name="" value="">
                    <span class="checkmark"></span>
                  </label>
                  SAPTCO
                </td>
                <td>Testing</td>
                <td>Motor Coach</td>
                <td>Jeddah</td>
                <td>JDH</td>
                <td><button type="button" class="actionBtn"><img src="assets/images/icons/more.svg"></button></td>
              </tr> -->

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
              <option value="ar" <?php if ($lang_type == 'ar'){ echo 'selected'; }?> ><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabic'); ?></option>  
              <option value="en" <?php if ($lang_type == 'en'){ echo 'selected'; }?> ><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'english'); ?></option>
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