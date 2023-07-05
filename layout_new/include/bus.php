<!-- Popup Information for Bus click on bus icon -->
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
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'transportationCompany'); ?>
            <span id ="trnspt_comp">1685387738376</span>
          </td>
          
        </tr>
        <tr>
          <td colspan="1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'PlateNo'); ?>
            <span id ="plate_no">6474f9da97c5bc121663c1a9</span>
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