$( document ).ready(function() {

  function hidelefttabs(){
    $('#trackingComBox').hide();
    $('#transportationComBox').hide();
    $('#trackingDevicesBox').hide();
    $('#busFinderBox').hide();
    $('#geofencesBox').hide();
    $('#settingBox').hide();
  }
   
  $(".trackingCom>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#trackingComBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#trackingComBox').show();
      resetTheFilterOnClose('trackingComSeAl',1);
    }
  });
   
  $(".transportationCom>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#transportationComBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#transportationComBox').show();
      resetTheFilterOnClose('transportationComSeA1',2);
    }
  });
   
  $(".trackingDevices>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#trackingDevicesBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#trackingDevicesBox').show();
      resetTheFilterOnClose('trackingDevicesSeAl',3);
    }
  });
   
  $(".busFinder>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#busFinderBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#busFinderBox').show();
    }
  });
   
  $(".geofences>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#geofencesBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#geofencesBox').show();
    }
  });

  $(".settings>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      hidelefttabs();
      $('#settingBox').show();
    }
  });
   
  $(".mapPoint>.pointSv").click(function() { 
      $(".mapPoint>.pointSv").removeClass("active");
      $(this).addClass("active");
  });
  
  $('#opacity-slider').on("change mousemove", function() {
    $('#slider-value').html($(this).val());
  });

   $("#busFinderTable,#geofencesTable,#busesFilterFromDrawGeofenceTable").tablesorter({
      //widgets: ['zebra'], sortList: [[0,0]]
      widgets: ['zebra'], sortList: [[0,0]]
    });

  $("#geofenceEditButton").click(function() { 
      $('#viewGeofenceDetails').hide();
      $('#editGeofenceDetails').show();
  });
  $("#geofenceEditCancelButton").click(function() { 
      $('#viewGeofenceDetails').show();
      $('#editGeofenceDetails').hide();
  });

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

  //Layer Change from Dropdown
  $("#setLayer").on("change",function(){
    var SelectedLang = $(this).val();
    if(SelectedLang == '1'){
      filterGeofenceLayerData(1,'المنافذ');
    }
    else if(SelectedLang == '2'){
      filterGeofenceLayerData(2,'رمضان');
    }
    else if(SelectedLang == '3'){
      filterGeofenceLayerData(3,'المشاعر المقدسة');
    }
    else if(SelectedLang == '4'){
      filterGeofenceLayerData(4,'غير محدد');
    }
  });


  //Language Change from Dropdown
  $("#setLanguage").on("change",function(){
    var SelectedLang = $(this).val();
    if(SelectedLang == 'en'){
      location.href = '?lang=en';
    }else{
      location.href = '?lang=ar';
    }
  });

  //Browser Full Screen ON/OFF
  $(".fullscreen").click(function(){
    $(document).fullScreen(true);
    //check if broswer deniy the full screen
    $(document).bind("fullscreenchange", function(e) {
       $(document).fullScreen() ? $("#fullScreenOn").hide() : $("#fullScreenOn").show();
       $(document).fullScreen() ? $("#fullScreenOff").show() : $("#fullScreenOff").hide();
    });
  });

  $("#fullScreenOff").click(function(){
    $(document).fullScreen(false);
    $(this).hide();
    $("#fullScreenOn").show();
  });


});

function tableSorterDataUpdate() {
  $("#busesFilterFromDrawGeofenceTable").trigger("update");
  //console.log("tableSorterDataUpdate");
}

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

function showBusCounter(activeNo, totalNumber)
{
  $("#showBusData").html(activeNo);
  $("#totalBusData").html(totalNumber);
}


/////Geofence--------------------------------
$( document ).ready(function() {

  //reset previously set border colors and hide all message on .keyup()
  $("#geofenceAdd input, #geofenceAdd textarea").keyup(function() { 
      $("#geofenceAdd input, #geofenceAdd textarea").css('border-color',''); 
      $("#newGeofenceDialogBox #result").slideUp();
  });
  $("#newGeofenceDialogBox #result").slideUp();

});

function showGeofenceDialogBox()
{
    $('#viewGeofenceDialogBox').show();
    $('#viewGeofenceDetails').show();
    $('#editGeofenceDetails').hide();
}

$("#geofenceSave").click(function() {
    //get input field values
    var arabic_name     = $('#arabic_name').val(); 
    var english_name    = $('#english_name').val();
    var type            = $('#type').val();
    var district        = $('#district').val();
    var description     = $('#description').val();
    var category        = $('#category').val();
    var site            = $('#site').val();
    var station_type    = $('#station_type').val();
    var station_code    = $('#station_code').val();
    var station_name    = $('#station_name').val();
    var code_id         = $('#code_id').val();
    //var area            = $('#area').val();
    //var shape_length    = $('#shape_length').val();
    //var shape_area      = $('#shape_area').val();
    var generic_name     = $('#generic_name').val();
    var geofence_type    = $('#geofence_type').val();
    var season           = $('#season').val();
    var coordinate_arr   = $('#coordinate_arr').val();
    var flag = true;
    /********validate all our form fields***********/
    if(arabic_name==""){ $('#arabic_name').css('border-color','red'); flag = false; }
    if(english_name==""){ $('#english_name').css('border-color','red'); flag = false; } 
    if(type=="") { $('#type').css('border-color','red'); flag = false; }
    if(district=="") { $('#district').css('border-color','red'); flag = false; }
    if(description=="") { $('#description').css('border-color','red'); flag = false; }
    if(category=="") { $('#category').css('border-color','red'); flag = false; }
    if(site=="") { $('#site').css('border-color','red'); flag = false; }
    if(station_type=="") { $('#station_type').css('border-color','red'); flag = false; }
    if(station_code=="") { $('#station_code').css('border-color','red'); flag = false; }
    if(station_name=="") { $('#station_name').css('border-color','red'); flag = false; }
    if(code_id=="") { $('#code_id').css('border-color','red'); flag = false; }
    if(generic_name=="") { $('#generic_name').css('border-color','red'); flag = false; }
    if(geofence_type=="") { $('#geofence_type').css('border-color','red'); flag = false; }
    if(season=="") { $('#season').css('border-color','red'); flag = false; }
    
    if(coordinate_arr=="") { 
      $("#newGeofenceDialogBox #result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
      flag = false; 
    }

    //check int
    if(Math.floor(station_type) == station_type && $.isNumeric(station_type)){ }else{ $('#station_type').css('border-color','red').val(''); flag = false; }
    if(Math.floor(station_code) == station_code && $.isNumeric(station_code)){ }else{ $('#station_code').css('border-color','red').val(''); flag = false; }
    
    // check float
    //if($.isNumeric(area)){ }else{ $('#area').css('border-color','red').val('');  flag = false; }
    //if($.isNumeric(shape_length)){ }else{ $('#shape_length').css('border-color','red').val(''); flag = false; }
    //if($.isNumeric(shape_area)){ }else{ $('#shape_area').css('border-color','red').val(''); flag = false; }

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
              site : site,
              description : description,
              station_name : station_name,
              category : category,
              station_type : station_type,
              station_code : station_code,
              code_id : code_id,
              generic_name : generic_name,
              geofence_type : geofence_type,
              season : season,
              coordinates : coordinate_arr
            },
            beforeSend: function() {
                $('#geofenceSave, #geofenceDiscard').attr('disabled', true);
                $('#geofenceSave').after('<div class="wait">&nbsp;<img src="assets/images/icons/loading.gif" alt="" /></div>');

            },
            complete: function() {
                $('#geofenceSave, #geofenceDiscard').attr('disabled', false);
                $('.wait').remove();
            },  
            success: function(data)
            {
              if(data.type == 'error')
              {
                  output = 'Error: '+data.text+'';
              }else{
                  output = 'Success: '+data.text+'';
                  $('#geofenceAdd input[type=text]').val(''); 
                  $('#geofenceAdd textarea').val(''); 

                  $('.boxPopUpTab').animate({top:"0px",opacity:"0.1"}, function(){
                      $('.boxPopUpTab').hide();
                      //Black Box hide
                      $('.popUpBox').animate({opacity:"0.1"}, function(){
                        $('.popUpBox').hide();
                        $('.popUpBox').css({"opacity":"1.0"});
                        $('.boxPopUpTab').show();
                        //Set to Default
                        $('.boxPopUpTab').css({"top":"20px","opacity":"1.0"});
                      });
                  }); 

                  toggleDrawGeofenceCtrl();
                  getAllGeofence(); //add all geofence
              }

              //$("#newGeofenceDialogBox #result").hide().html(output).slideDown();
              showNotification(output);
                      
            }
        });
    }
});

$("#geofenceUpdate").click(function() { 
    //get input field values
    var arabic_name     = $('#arabic_name_edit').val(); 
    var english_name    = $('#english_name_edit').val();
    var type            = $('#type_edit').val();
    var district        = $('#district_edit').val();
    var description     = $('#description_edit').val();
    var category        = $('#category_edit').val();
    var site            = $('#site_edit').val();
    var station_type    = $('#station_type_edit').val();
    var station_code    = $('#station_code_edit').val();
    var station_name    = $('#station_name_edit').val();
    var code_id         = $('#code_id_edit').val();
    var generic_name    = $('#generic_name_edit').val();
    var geofence_type   = $('#geofence_type_edit').val();
    var season          = $('#season_edit').val();
    //var coordinate_arr  = $('#coordinate_arr_edit').val();
    var geofence_update_id  = $('#geofenceUpdate_id').val();

    var flag = true;
    /********validate all our form fields***********/
    if(arabic_name==""){ $('#arabic_name_edit').css('border-color','red'); flag = false; }
    if(english_name==""){ $('#english_name_edit').css('border-color','red'); flag = false; } 
    if(type=="") { $('#type_edit').css('border-color','red'); flag = false; }
    if(district=="") { $('#district_edit').css('border-color','red'); flag = false; }
    if(description=="") { $('#description_edit').css('border-color','red'); flag = false; }
    if(category=="") { $('#category_edit').css('border-color','red'); flag = false; }
    if(site=="") { $('#site_edit').css('border-color','red'); flag = false; }
    if(station_type=="") { $('#station_type_edit').css('border-color','red'); flag = false; }
    if(station_code=="") { $('#station_code_edit').css('border-color','red'); flag = false; }
    if(station_name=="") { $('#station_name_edit').css('border-color','red'); flag = false; }
    if(code_id=="") { $('#code_id_edit').css('border-color','red'); flag = false; }
    if(generic_name=="") { $('#generic_name_edit').css('border-color','red'); flag = false; }
    if(geofence_type=="") { $('#geofence_type_edit').css('border-color','red'); flag = false; }
    if(season=="") { $('#season_edit').css('border-color','red'); flag = false; }
    // if(coordinate_arr=="") { 
    //   $("#result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
    //   flag = false; 
    // }
    if(geofence_update_id=="") { 
      showNotification("Error: Wrong Geofence Id, reload the page and try again.");
      flag = false; 
    }

    //check int
    if(Math.floor(station_type) == station_type && $.isNumeric(station_type)){ }else{ $('#station_type_edit').css('border-color','red').val(''); flag = false; }
    if(Math.floor(station_code) == station_code && $.isNumeric(station_code)){ }else{ $('#station_code_edit').css('border-color','red').val(''); flag = false; }
    
    // check float
    //if($.isNumeric(area)){ }else{ $('#area_edit').css('border-color','red').val('');  flag = false; }
    //if($.isNumeric(shape_length)){ }else{ $('#shape_length_edit').css('border-color','red').val(''); flag = false; }
   // if($.isNumeric(shape_area)){ }else{ $('#shape_area_edit').css('border-color','red').val(''); flag = false; }
  //  var typecode = '';
  //  if ($geo_type == "مركز تفويج")
  //    typecode = "TC";
  //  elseif(geo_type == "محطة  نقل")
  //    typecode = "S"
  //  elseif(geo_type == "موقف سيارات")
  //    typecode = "P"
  //  elseif(geo_type == "مخزن حافلات")
  //    typecode = "BD"
  //  elseif(geo_type == "صالة")
  //    typecode = "T"
  //  elseif(geo_type == "ميقات")
  //    typecode = "L"
  //  elseif(geo_type == "مركز ترجيب")
  //    typecode = "WC"
  //  elseif(geo_type == "مركز اسناد")
  //    typecode = "EC"
  //  elseif(geo_type == "مسار")
  //    typecode = "M"
  //  elseif(geo_type == "حي")
  //    typecode = "D"
 
 
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
            description : description,
            category : category,
            site : site,
            station_type : station_type,
            station_code : station_code,
            station_name : station_name,
            code_id : code_id,
            generic_name : generic_name,
            geofence_type : geofence_type,
            season : season,
            //coordinates : coordinate_arr,
            geofence_update_id : geofence_update_id
          },
          beforeSend: function() {
              $('#geofenceUpdate, #geofenceCancle').attr('disabled', true);
              $('#geofenceSave').after('<div class="wait">&nbsp;<img src="assets/images/icons/loading.gif" alt="" /></div>');
          },
          complete: function() {
              $('#geofenceUpdate, #geofenceCancle').attr('disabled', false);
              $('.wait').remove();
          },  
          success: function(data)
          {
            if(data.type == 'error')
            {
                //output = '<div class="error">'+data.text+'</div>';
                output = 'Error: '+data.text+'';

            }else{
                //output = '<div class="success">'+data.text+'</div>';
                output = 'Success: '+data.text+'';

                $('#geofenceAdd input[type=text]').val(''); 
                $('#geofenceAdd textarea').val(''); 

                $('.boxPopUpTab').animate({top:"0px",opacity:"0.1"}, function(){
                    $('.boxPopUpTab').hide();
                    //Black Box hide
                    $('.popUpBox').animate({opacity:"0.1"}, function(){
                      $('.popUpBox').hide();
                      $('.popUpBox').css({"opacity":"1.0"});
                      $('.boxPopUpTab').show();
                      //Set to Default
                      $('.boxPopUpTab').css({"top":"20px","opacity":"1.0"});
                    });
                }); 
                getAllGeofence(); //add all geofence
            }

            $("#result").hide().html(output).slideDown();
            showNotification(output);
                    
          }
      });
    }
});
    
$("#geofenceDelete").click(function() { 
  showConfirmation("Do you really want to delete?");
});

$("#geofenceDeleteConfirm").click(function() { 
    //get input field values
    var geofence_id  = $('#geofence_id').val();
    var flag = true;
    /********validate all our form fields***********/
    if(geofence_id=="") { 
      //$("#result2").hide().html('<div class="error">Wrong Draw Geofence Id</div>').slideDown();
      showNotification("Error: Wrong Geofence Id, reload the page and try again.");
      flag = false; 
    }
    /********Validation end here ****/
    /* If all are ok then we send ajax request to email_send.php *******/
    if(flag) 
    {
        $.ajax({
            type: 'post',
            url: "./data/delete_geofence.php", 
            dataType: 'json',
            data: {
              geofence_id : geofence_id
            },
            beforeSend: function() {
                //$('#geofenceSave').attr('disabled', true);
                //$('#geofenceSave').after('<span class="wait">&nbsp;<img src="image/loading.gif" alt="" /></span>');
                
            },
            complete: function() {
                //$('#geofenceSave').attr('disabled', false);
                //$('.wait').remove();
            },  
            success: function(data)
            {
              //alert(geofence_id);
              console.log(data);

              if(data.type == 'error')
              {
                  output = 'Error: '+data.text;
              }else{
                  output = 'Success: '+data.text;
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

                  getAllGeofence();
              }

              //$("#result2").hide().html(output).slideDown();
              showNotification(output);
                      
            },
            error: function (request, status, error) {
                //alert(request.responseText);
                //$("#result2").hide().html(request.responseText).slideDown();
                showNotification(request.responseText);
            }
        });
    }
});