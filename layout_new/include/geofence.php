
<!-- View and update geofences details -->
<div class="popUpBox" id="viewGeofenceDialogBox">
  <div class="boxPopUpTab viewEdit">
    <span class="close exit" onclick="unselectAllFeatures()"></span>
    <div class="boxHeader">
      <img src="assets/images/icons/icon-fg.png">
      <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'GeofenceInformation'); ?></h1>
    </div>
    <div id="result2"></div>
    <div id="viewGeofenceDetails">
      <div class="boxBody">
        <table>
            <tr>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabicName'); ?>
                <span id ="arabicNameGeofence" ></span>
              </td>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'englishName'); ?>
                <span id ="englishNameGeofence"></span>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?>
                <span id ="typeGeofence"></span>
              </td>
              <td class="np">
                <table>
                  <tr>
                    <td>
                      <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'district'); ?>
                      <span id ="districtGeofence"></span>
                    </td>
                     <td>
                      <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'site'); ?>
                      <span id ="siteGeofence"></span>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?>
                <span id ="descriptionGeofence"></span>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?>
                <span id ="stationNameGeofence"></span>
              </td>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'category'); ?>
                <span id ="categoryGeofence"></span>
              </td>
            </tr>
            <tr>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationType'); ?>
                <span id ="stationTypeGeofence"></span>
              </td>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?>
                <span id ="stationCodeGeofence"></span>
              </td>
            </tr>

            <tr>
              <td>
                <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'codeId'); ?>
                <span id ="codeIdGeofence"></span>
              </td>
              <td>
                Name
                <span id ="genericName"></span>
              </td>
            </tr>

            <tr>
              <td>
                Geofence Type
                <span id ="geofenceType"></span>
              </td>
              <td>
                Season
                <span id ="seasonType"></span>
              </td>
            </tr>
          </table>
      </div>
      <div class="boxFooter">
        
        <button type="button" class="exportGeo" id="exportGeofence" onclick=""><img src="assets/images/icons/export.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'exportGeoJSON'); ?></span>
        </button>
        
        <input type="hidden" id="geofence_id" name="geofence_id" value="">
        <button type="button" class="delete" id="geofenceDelete" onclick="" disabled><img src="assets/images/icons/trash.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'delete'); ?></span>
        </button>
        
        <button type="button" class="edit" id="geofenceEditButton" onclick=""><img src="assets/images/icons/edit.svg">
          <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'edit'); ?></span>
        </button>
      </div>
    </div>


    <div id="editGeofenceDetails">

      <form role="form" id="geofenceEditForm" action="" >
        <div class="boxBody">
          <table>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabicName'); ?></label>
                <input type="text" class="inputText" id="arabic_name_edit" name="arabic_name_edit" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'englishName'); ?></label>
                <input type="text" class="inputText" id="english_name_edit" name="english_name_edit" maxlength="120"/>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="np">
                <table>
                  <tr>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?></label>
                      <!-- <input type="text" class="inputText" id="type_edit" name="type_edit" maxlength="120"/> -->
                      <select id="type_edit" name="type_edit" class="bgSelect2">
                        <option value="مركز ترحيب">مركز ترحيب</option>
                        <option value="مخازن حافلات"></option>
                      </select>
                    </td>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'district'); ?></label>
                      <input type="text" class="inputText" id="district_edit" name="district_edit" maxlength="120"/>
                    </td>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'site'); ?></label>
                      <input type="text" class="inputText" id="site_edit" name="site_edit" maxlength="120"/>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?></label>
                <input type="text" class="inputText" id="description_edit" name="description_edit" maxlength="280"/>
              </td>
            </tr>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?></label>
                <input type="text" class="inputText" id="station_name_edit" name="station_name_edit" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'category'); ?></label>
                <input type="text" class="inputText" id="category_edit" name="category_edit" maxlength="120"/>
              </td>
            </tr>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationType'); ?></label>
                <input type="text" class="inputText" id="station_type_edit" name="station_type_edit" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?></label>
                <input type="text" class="inputText" id="station_code_edit" name="station_code_edit" maxlength="120"/>
              </td>
            </tr>

            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'codeId'); ?></label>
                <input type="text" class="inputText" id="code_id_edit" name="code_id_edit" maxlength="120"/>
              </td>
              <td>
                <label>Name</label>
                <input type="text" class="inputText" id="generic_name_edit" name="generic_name_edit" maxlength="120"/>
              </td>
            </tr>

            <tr>
              <td>
                <label>Geofence Type</label>
                <select id="geofence_type_edit" name="geofence_type_edit" class="bgSelect2">
                  <option value="Polygon">Polygon</option>
                  <option value="Line">Line</option>
                </select>
              </td>
              <td>
                <label>Season</label>
                <select id="season_edit" name="season_edit" class="bgSelect2">
                  <option value="Hajj">Hajj</option>
                  <option value="Umrah">Umrah</option>
                  <option value=" المصلين بين المدن"> المصلين بين المدن</option>
                  <option value="المشاعر المقدسة">المشاعر المقدسة</option>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="boxFooter">
          <!-- <input type="hidden" id="coordinate_arr_edit" name="coordinate_arr_edit" value=""> -->
          <input type="hidden" id="geofenceUpdate_id" name="geofenceUpdate_id" value="">
          
          <button type="button" class="delete" id="geofenceEditCancelButton">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Cancel'); ?></span>
          </button>
          <button type="button" class="save" id="geofenceUpdate"><img src="assets/images/icons/check-mark-32.png">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Update'); ?></span>
          </button>
        </div>
      </form>
      
    </div>
  </div>
</div>


<!-- New geofences Added -->
<div class="popUpBox" id="newGeofenceDialogBox">
  <div class="boxPopUpTab addNew">
    <!-- <span class="close exit" id=""></span> -->
    <div class="boxHeader">
      <img src="assets/images/icons/icon-fg.png">
      <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'WriteGeofenceDetials'); ?></h1>
    </div>
    <div id="result"></div>
    <div id="geofenceDialogBoxData">
      <form role="form" id="geofenceAdd" action="" >
        <div class="boxBody">
          <table>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'arabicName'); ?></label>
                <input type="text" class="inputText" id="arabic_name" name="arabic_name" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'englishName'); ?></label>
                <input type="text" class="inputText" id="english_name" name="english_name" maxlength="120"/>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="np">
                <table>
                  <tr>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'type'); ?></label>
                      
                      <!-- <input type="text" class="inputText" id="type" name="type" maxlength="120"/> -->
                      <select id="type" name="type" class="bgSelect2">
                        <option value="مركز ترحيب">مركز ترحيب</option>
                        <option value="مخازن حافلات"></option>
                      </select>
                    </td>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'district'); ?></label>
                      <input type="text" class="inputText" id="district" name="district" maxlength="120"/>
                    </td>
                    <td>
                      <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'site'); ?></label>
                      <input type="text" class="inputText" id="site" name="site" maxlength="120"/>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'description'); ?></label>
                <input type="text" class="inputText" id="description" name="description" maxlength="280"/>
              </td>
            </tr>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationName'); ?></label>
                <input type="text" class="inputText" id="station_name" name="station_name" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'category'); ?></label>
                <input type="text" class="inputText" id="category" name="category" maxlength="120"/>
              </td>
            </tr>
            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationType'); ?></label>
                <input type="text" class="inputText" id="station_type" name="station_type" maxlength="120"/>
              </td>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'stationCode'); ?></label>
                <input type="text" class="inputText" id="station_code" name="station_code" maxlength="120"/>
              </td>
            </tr>

            <tr>
              <td>
                <label><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'codeId'); ?></label>
                <input type="text" class="inputText" id="code_id" name="code_id" maxlength="120"/>
              </td>
              <td>
                <label>Name</label>
                <input type="text" class="inputText" id="generic_name" name="generic_name" maxlength="120"/>
              </td>
            </tr>

            <tr>
              <td>
                <label>Geofence Type</label>
                <!-- <input type="text" class="inputText" id="season" name="geofence_type" maxlength="120"/> -->
                <select id="geofence_type" name="geofence_type" class="bgSelect2">
                  <option value="Polygon">Polygon</option>
                  <option value="Line">Line</option>
                </select>
              </td>
              <td>
                <label>Season</label>
                <!-- <input type="text" class="inputText" id="season" name="season" maxlength="120"/> -->
                <select id="season" name="season" class="bgSelect2">
                  <option value="Hajj">Hajj</option>
                  <option value="Umrah">Umrah</option>
                  <option value=" المصلين بين المدن"> المصلين بين المدن</option>
                  <option value="المشاعر المقدسة">المشاعر المقدسة</option>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="boxFooter">
          <input type="hidden" id="coordinate_arr" name="coordinate_arr" value="">
          
          <button type="button" class="delete exit" id="geofenceDiscard" onclick="toggleDrawGeofenceCtrl()"><img src="assets/images/icons/trash.svg">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Discard'); ?></span>
          </button>
          <button type="button" class="save" id="geofenceSave" onclick=""><img src="assets/images/icons/check-mark-32.png">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'save'); ?></span>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>


<!-- Geofence Delete Confirmation Box -->
<div class="popUpBox popUpConfirm" id="confirmationBox">
  <div class="boxPopUpTabCon">
    <div class="boxHeader">
      <img src="assets/images/icons/question-mark.png">
      <h1><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Confirmation'); ?></h1>
    </div>
    <div id="result"></div>
    <div id="">
      <form role="form" id="" action="" >
        <div class="boxBody">
          <p id="confirmationText"></p>
        </div>

        <div class="boxFooter">
          <button type="button" class="no noConfirm"><img src="assets/images/icons/trash.svg">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'No'); ?></span>
          </button>
          <button type="button" class="yes yesConfirm" id="geofenceDeleteConfirm"><img src="assets/images/icons/check-mark-32.png">
            <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Yes'); ?></span>
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Geofence Bus Filter From Draw Selection Box -->
<div class="popUpBox busesFilterFromDrawGeofence" id="busesFilterFromDrawGeofence">
  <!-- <div class="searchBoxForMenu">
    <input type="text" onkeyup=""  name="busListSearch" id="busListSearch" placeholder="Search" class="search">
    <button type="button" class="searchButton"><img src="assets/images/icons/search.svg"></button>
  </div> -->

  <!--Companies list-->
  <div class="mainListRows newScrollBar" id="bffdg">
    <table id="busesFilterFromDrawGeofenceTable" class="tableNeo tablesorter">
      <thead>
          <tr>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'Company'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'CompanyArabic'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'BusOperatingNo'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'DeviceCompany'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompany'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompanyArabic'); ?></th>
            <th><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'IMEINo'); ?></th>
          </tr>
        </thead>
        <tbody id="busesFilterFromDrawGeofence_tbody_id">
          
        </tbody>
    </table>

  </div>
  <div id="deactive_bffdg">
    <a href="javascript:void(0)" id="busesFilterFDGCLose">
      <img src="assets/images/icons/back_white.png">
    </a>
  </div>
</div>