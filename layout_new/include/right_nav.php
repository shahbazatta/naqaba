<div class="rightMenu">
  <a href="" class="miniLogo" title="">
   <img src="assets/images/mini_logo.png">
  </a>
  <nav>


    <div class="trackingCom" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingCompanies'); ?>">
      <a href="javascript:void(0)" id="trackingComBoxImg" onclick=""><img src="assets/images/icons/gps.svg"></a>

      <div class="popMenuBox" id="trackingComBox">
        <div class="searchBoxForMenu">
          <input type="text" onkeyup="trackingDevicesSearchEvent('trackingComSearch',1)"  name="trackingComSearch" id="trackingComSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchCompany'); ?>" class="search">
          <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
        </div>

        <div class="headerList">
          <h1 id="trackingComBoxHeader"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingCompanies'); ?></h1>
          <div class="close" onclick="closeFilterOnClose('trackingComBox','trackingComBoxImg')"><img src="assets/images/icons/close.svg"></div>
          <div class="selectAllCheckBox">
            <label class="cCheckBox2">
              <input type="checkbox" onclick="onSelectAllCheckBox('trackingComSeAl',1)" id="trackingComSeAl" name="trackingComSeAl" checked value="true">
              <span class="checkmark"></span>
            </label>
            <label for="trackingComSeAl" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
          </div>
        </div>

        <!--Tracking Companies list-->
        <div class="mainListRows newScrollBar" id="mainListRowsTrackingCompany">

          <?php
            $x=0;
            foreach ($classObject->tracking_com as $output) {
              $ocid = preg_replace("/[^ي-أa-zA-Z0-9]/", "", $output);
              $x++;
              $ocid = "trackingCom".$x;
              echo "<div class='listRow'>
            <label class='cCheckBox2'>
              <input type='checkbox' onclick='singalCheckbox(this,$ocid,1)' id='".$ocid."' name='".$ocid."' value='".$output."' data-language='$lang_type' checked>
              <span class='checkmark'></span>
            </label>
            <label for='".$ocid."' class='lebelText'>
              <p>".$output."</p>
            </label>
            <div class='clear'></div>
          </div>";
            }
          ?>

        </div>
      </div>

    </div>

    <div class="transportationCom" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompanies'); ?>">
      <a href="javascript:void(0)" id="transportationComBoxImg"><img src="assets/images/icons/truck.svg"></a>

      <div class="popMenuBox" id="transportationComBox">
        <div class="searchBoxForMenu">
          <input type="text" onkeyup="trackingDevicesSearchEvent('transportationComSearch',2)" name="transportationComSearch" id="transportationComSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchCompany'); ?>" class="search">
          <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
        </div>
        <div class="headerList">
          <h1 id="transportationComBoxHeader"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompanies'); ?></h1>
          <div class="close" onclick="closeFilterOnClose('transportationComBox','transportationComBoxImg')"><img src="assets/images/icons/close.svg"></div>
          <div class="selectAllCheckBox">
            <label class="cCheckBox2">
              <input type="checkbox" onclick="onSelectAllCheckBox('transportationComSeA1',2)" id="transportationComSeA1" name="transportationComSeA1" checked value="true">
              <span class="checkmark"></span>
            </label>
            <label for="transportationComSeA1" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
          </div>
        </div>

        <!--Transportaion list-->
        <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTransportationCompanies">

          <?php
            $y=0;
            foreach ($classObject->transpotation_com as $output) {
              $ocid = preg_replace("/[^ي-أa-zA-Z0-9]/", "", $output);
              $y++;
              $ocid = "transpotationCom".$y;
              echo "<div class='listRow'>
            <label class='cCheckBox2'>
              <input type='checkbox' onclick='singalCheckbox(this,$ocid,2,)' id='".$ocid."' name='".$ocid."' value='".$output."' data-language='$lang_type' checked>
              <span class='checkmark'></span>
            </label>
            <label for='".$ocid."' class='lebelText'>
              <p>".$output."</p>
            </label>
            <div class='clear'></div>
          </div>";
            }
          ?>

        </div>
      </div>

    </div>

    <div class="trackingDevices" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingDevices'); ?>">
      <a href="javascript:void(0)" id="trackingDevicesBoxShowImg"><img src="assets/images/icons/truck_fast.svg"></a>

      <div class="popMenuBox" id="trackingDevicesBox">
        <div class="searchBoxForMenu">
          <input type="text" name="trackingDevicesSearch" value="" onkeyup="trackingDevicesSearchEvent('trackingDevicesSearch',3)" id="trackingDevicesSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchDevice'); ?>" class="search">
          <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
        </div>
        <div class="headerList">
          <h1 id="trackingDevicesBoxHeader"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'trackingDevices'); ?></h1>
          <div class="close" onclick="closeFilterOnClose('trackingDevicesBox','trackingDevicesBoxShowImg')"><img src="assets/images/icons/close.svg"></div>
          <div class="selectAllCheckBox">
            <label class="cCheckBox2">
              <input type="checkbox" onclick="onSelectAllCheckBox('trackingDevicesSeAl',3)" id="trackingDevicesSeAl" name="trackingDevicesSeAl" checked value="">
              <span class="checkmark"></span>
            </label>
            <label for="trackingDevicesSeAl" class="lebelText"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SelectAll'); ?></label>
          </div>
        </div>

        <!--Devices list-->
        <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTrackingDevices">

          <?php
            $z=0;
            foreach ($classObject->tracking_devices as $output) {
              $ocid = (string) preg_replace("/[^ي-أa-zA-Z0-9]/", "", $output);
              $z++;
              $ocid = "trackingDevices".$z;
              echo "<div class='listRow'>
            <label class='cCheckBox2'>
              <input type='checkbox' onclick='singalCheckbox(this,$ocid,3)' id='".$ocid."' name='".$ocid."' value='".$output."' data-language='$lang_type' checked>
              <span class='checkmark'></span>
            </label>
            <label for='".$ocid."' class='lebelText'>
              <p>".$output."</p>
            </label>
            <div class='clear'></div>
          </div>";
            }
          ?>

        </div>
      </div>
      
      <!-- reports-------------------------- -->
      <div class="popMenuBox" id="ReportsBox">
        
        <div class="headerList">
          <h1 id="trackingDevicesBoxHeader"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reports'); ?></h1>
          <div class="close" onclick="closeFilterOnClose('ReportsBox','ReportsBoxShowImg')"><img src="assets/images/icons/close.svg"></div>
          
        </div>

        <!--Devices list-->
        <div class="mainListRows newScrollBar" style="overflow-y:scroll;" id="mainListRowsTrackingDevices">
          <ul id="reportList">
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiOWE1YWFjZmItNDZkYy00ZmM4LThmODAtYTI1YTc4N2NlOThhIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"
              ><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportOne'); ?></li>
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiOWU4OWExZTAtZWNlNS00ZDAwLTg0ZmQtOWUxNDhmNTc0OGM2IiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportTwo'); ?></li>
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiZjIwNzY2MTItM2IwNy00MTUzLTg3NDAtMGU2YWRiNmEzZGVjIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportThree'); ?></li> 
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiODIwNTUzODMtMjNmOC00YjNmLWFmMzctYmU5OWY0OWUwOWE0IiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportFour'); ?></li>
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiY2IyY2RkYjYtZDNiYi00OGU0LTg1ZGMtMmJhOTQwYjI0YzIxIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportFive'); ?></li> <!-- Report 2 in Arabic -->
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiNDdiNDBjYTEtMzViNy00MTcwLThhOTItYTRkNGQ3YmYzNzgwIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportSix'); ?></li> <!-- Report 3 in Arabic -->
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiMWQyMGYyYmQtMDhkNS00MDc5LTg3NTgtNjY4ODgxNDUzZTMzIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportSeven'); ?></li> 
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiNjVlZDUzYmUtZDk0Ny00MzMwLTgxMDQtM2QxNzI4MWUxYzJhIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportEight'); ?></li> <!-- Report 2 in Arabic -->
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiM2VjMTdhN2MtODJlNi00NDg3LTlmMjctMTA5NTljMDBhYjdhIiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportNine'); ?></li> <!-- Report 3 in Arabic -->
              <li onclick="openModal('https://app.powerbi.com/view?r=eyJrIjoiY2ZlZDU1MGUtYTFhZi00Y2E4LWIxM2QtMmI1NGQ0MTc1ZTI4IiwidCI6ImY2YjRlZWU1LTcwNDctNGViMS1hZGU0LTliYTMyNGNiYmY2NSIsImMiOjl9')"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reportTen'); ?></li> 
              
          </ul>
          
        </div>
      </div>
      <!-- The overlay background -->
      <div class="overlay" id="overlay" onclick="closeModal()"></div>

      <!-- The Modal -->
      <div id="myModal">
          <span class="close" onclick="closeModal()">&times;</span>
          <iframe id="reportFrame" src="" frameborder="0"></iframe>
      </div>
      <!-- reports--------------------------->
    </div>
    <script>
        // JavaScript functions to open, close, and load reports in the modal
        function openModal(url) {
            var modal = document.getElementById('myModal');
            var iframe = document.getElementById('reportFrame');
            iframe.src = url;
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }
    </script>
    <div class="busFinder" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'busFinder'); ?>">
      <a href="javascript:void(0)"><img src="assets/images/icons/bus.svg"></a>

      <div class="popMenuBox busFinderBox" id="busFinderBox">
        <div class="searchBoxForMenu">
          <input type="text" onkeyup="trackingDevicesSearchEvent('busListSearch',4)"  name="busListSearch" id="busListSearch" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SearchIMEINumber'); ?>" class="search">
          <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
        </div>

        <!--Companies list-->
        <div class="mainListRows newScrollBar" id="iemiSearchList">
          <div id="busFinderTablePages"></div>
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
                  //print_r($output);
                  $count ++;
                  if ($lang_type == 'ar'){
                    $plate_no = $output['device']['plate_no'];
                  }
                  else{
                    //$plate_no = $output['device']['engplate_no'];
                    $plate_no = $output['device']['plate_no'];
                  }
                  echo "<tr id='".(int)$output['imei']."'>
                          <td>
                            <label class='cCheckBox2'>
                              <input type='checkbox' id='".$output['_id']."' name='".$output['_id']."' value='".$output['_id']."' data-imei = '".(int)$output['imei']."' onclick='busImeiCheckBox(this)'>
                              <span class='checkmark'></span>
                            </label>
                            ".(int)$output['imei']."
                          </td>
                          <td>".$plate_no."</td>
                          <td>".$output['device']['bus_oper_no']."</td>
                          <td><button type='button' class='actionBtn'><img src='assets/images/icons/more.svg'>
                              <div class='moreAction'>
                                <div class='icon_anim' onclick='animationImei(this)' data-type='map' data-imei = '" . (int)$output['imei'] . "'>Animation</div>
                                <div class='gh-map-btn' class='gh-map-btn' onclick='getTripDates(this)' data-type='gl-map' data-imei='" . (int)$output['imei'] . "'>Deck GL</div>
                                <div class='icon_chart' onclick='chartViewImei(this)' data-type='chart' data-imei = '" . (int)$output['imei'] . "'>Radial Area Chart</div>
                              </div>
                          </button></td>
                        </tr>";
                  if ($count == 50) {
                    break;
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>



    <div class="geofences" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'geoFence'); ?>">
      <a href="javascript:void(0)"><img src="assets/images/icons/routing.png"></a>

      <div class="popMenuBox geofencesBox" id="geofencesBox">
        <div class="searchBoxForMenu">
          <input type="text" onkeyup="geofenceSearchEvent('geofenceSearch','geofencesTable')" name="geofenceSearch" id="geofenceSearch" placeholder="Search Geofence" class="search">
          <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
        </div>

        <!--Companies list-->
        <div class="mainListRows newScrollBar">
          <div id="geofencesTableLoading">Loading Geofence Data...</div>
          <table id="geofencesTable" class="tableNeo tablesorter">
            <thead>
              <tr>
                <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Name'); ?></th>
                <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Season'); ?></th>
                <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Description'); ?></th>
                <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Code_ID'); ?></th>
                <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($classObject->geofence_data as $output) {
                  if(isset($output['attributes']['ArabicName']) && isset($output['attributes']['EnglishName'])){
                    if ($lang_type == 'ar'){
                      $name = $output['attributes']['ArabicName'];
                    }
                    else{
                      $name = $output['attributes']['EnglishName'];
                    }
                    echo "<tr id='geofence".$output['_id']."'>
                          <td>
                            <label class='cCheckBox2'>
                              <input type='checkbox' id='".$output['_id']."' data-id='".$output['_id']."' data-geofenceName='".$output['attributes']['Description']."' data-ArabicName='".$output['attributes']['ArabicName']."' data-EnglishName='".$output['attributes']['EnglishName']."'
                                data-CodeId='".$output['attributes']['Code_ID']."'
                                data-Season='".$output['attributes']['Season']."'
                               name='".$output['_id']."' value='".$output['_id']."' onclick='geofenceCheckBox(this)'>
                              <span class='checkmark'></span>
                            </label>
                            ".$name."
                          </td>
                          <td>".$output['attributes']['Season']."</td>
                          <td>".$output['attributes']['Description']."</td>
                          <td>".$output['attributes']['Code_ID']."</td>
                          <td><button type='button' class='actionBtn'><img src='assets/images/icons/more.svg'></button></td>
                        </tr>";
                  }
                }

              ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>

    <div class="settings" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'setting'); ?>">
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
              <option value="1">المنافذ</option>
              <option value="2">رمضان</option>
              <option value="3">المشاعر المقدسة</option>
              <option value="4">غير محدد</option>
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

         <div id="activeDGF" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'DrawGeofence'); ?>"><a href="javascript:void(0)" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
         <div id="deactiveDGF" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'DrawGeofence'); ?>"><a href="javascript:void(0)" id="de_draw_geofence"><img src="assets/images/icons/close.svg"></a></div>
         <div id="activeGeoAna" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'DrawGeofence'); ?>"><a href="javascript:void(0)" id="draw_geofence_ana"><img src="assets/images/icons/geo_ana.svg"></a></div>
         <div class="Reports menu-item" onclick="toggleSubMenu(this)" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'reports'); ?>">
          <ul class="subMenu" id="reports-menu" >
            <li id="MBI"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'microsoftBI'); ?></li>
            <li id="DD"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dataDex'); ?></li>
          </ul>
            <a href="javascript:void(0)" id="ReportsBoxShowImg">
              <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 192.287 192.287" xml:space="preserve" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M122.901,0H19.699v192.287h152.889v-142.6L122.901,0z M146.981,45.299h-19.686V25.612L146.981,45.299z M34.699,177.287V15 h77.596v37.799c0,4.142,3.357,7.5,7.5,7.5h37.793v116.988H34.699z"></path> <rect x="53.141" y="149.004" width="86.006" height="10"></rect> <rect x="53.141" y="55.101" width="51.058" height="10"></rect> <polygon points="121.248,86.935 126.79,86.935 105.371,108.353 88.623,91.605 51.597,128.634 58.667,135.706 88.623,105.748 105.371,122.495 133.861,94.005 133.861,99.535 143.861,99.535 143.861,76.935 121.248,76.935 "></polygon> <rect x="53.141" y="33.283" width="51.058" height="10"></rect> </g> </g></svg>
            </a>
          </div>
          
    <div class="" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'apiDocs'); ?>">
      <a href="api/docs.php" target="_blank"><img src="assets/images/icons/apiDoc.png"></a>
    </div>
    <div class="" title="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'logout'); ?>"><a href="login.php?logout"><img src="assets/images/icons/exit.svg"></a></div>
  </nav>
</div>

<div class="datePickerWrapper" id="datePickerWrapper">
    <input type="hidden" id="mapTypeInput" value="">
    <div class="datePickerBox">
        <div class="head">Select Date Range</div>
        <input type="text" id="dateRangeImei" name="dateRangeImei" value=""/>
        <div class="close" onclick="closeDateRange()"><img src="assets/images/icons/close.svg"></div>
    </div>
</div>


<div class="animationPanel" id="animationPanel">

  <div class="animHeader">
    <div class="date">
      <div class="dateRangeShow" onclick="changeDataPanel()">
        <span id="startDateRange"></span> - <span id="endDateRange"></span>
        <br>
        <span class="selectDaterange">Select Date Range</span>
      </div>
    </div>

    <button type="button" class="closeBtn" id="closeBtn" onclick="closeAnimationPanel()"><img src="assets/images/icons/close.png"> Close</button>
    <button type="button" class="hideBtn" id="hideBtn" onclick="hideAnimationPanel()"><img src="assets/images/icons/screenmirroring.png"> Hide</button>
  </div>

  <div class="animBody">

    <div class="animBar" id="animBar">
      <span class="animBarFill">
        <input type="range" min="0.00" max="100.00" value="0" step="0.01" class="animation-slider" id="animationRangeSlider">
      </span>
    </div>

    <div class="animBarLoading" id="animBarLoading">
      <img src="assets/images/icons/loading.gif">
    </div>

  </div>

  <div class="animControl">
    <button type="button" class="speedBtn" id="speedBtn" onclick="setSpeed()"><img src="assets/images/icons/speedometer.png"> Speed</button>
    <button type="button" class="palyBtn" id="palyBtn">
      <span id="consumeTime">00:00:00</span>
      <img id="playbtnIcon" src="assets/images/icons/play.png">
      <img id="pausebtnIcon" src="assets/images/icons/pause.png">
      <span id="totalTime">00:00:00</span>
    </button>
    <button type="button" class="resetBtn" id="resetBtn" onclick="resetAnimation()"><img src="assets/images/icons/refresh.png"> Reset</button>
  </div>

</div>
<button type="button" class="animationRestoreBtn" id="animationRestoreBtn" onclick="showAnimationPanel()"><img src="assets/images/icons/animation16.png"> Animation Restore</button>
