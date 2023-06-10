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

   $("#busFinderTable,#geofencesTable").tablesorter({
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


});

function showGeofenceDialogBox()
{
    $('#viewGeofenceDialogBox').show();
    $('#viewGeofenceDetails').show();
    $('#editGeofenceDetails').hide();
}