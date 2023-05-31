$( document ).ready(function() {
   
  $(".trackingCom>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      //$('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      //$('#settingBox').show();
    }
  });
   
  $(".transportationCom>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      //$('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      //$('#settingBox').show();
    }
  });
   
  $(".trackingDevices>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      //$('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      //$('#settingBox').show();
    }
  });
   
  $(".busFinder>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      //$('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      //$('#settingBox').show();
    }
  });
   
  $(".geofences>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      //$('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
      //$('#settingBox').show();
    }
  });

  $(".settings>a").click(function() { 
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      $('#settingBox').hide();
    }else{
      $(".rightMenu>nav>div>a").removeClass("active");
      $(this).addClass("active");
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


});