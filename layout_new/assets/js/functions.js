$(document).ready(function () {

    function hidelefttabs() {
        $('#trackingComBox').hide();
        $('#transportationComBox').hide();
        $('#trackingDevicesBox').hide();
        $('#busFinderBox').hide();
        $('#geofencesBox').hide();
        $('#settingBox').hide();
    }

    $(".trackingCom>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#trackingComBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#trackingComBox').show();
            resetTheFilterOnClose('trackingComSeAl', 1);
        }
    });

    $(".transportationCom>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#transportationComBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#transportationComBox').show();
            resetTheFilterOnClose('transportationComSeA1', 2);
        }
    });

    $(".trackingDevices>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#trackingDevicesBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#trackingDevicesBox').show();
            resetTheFilterOnClose('trackingDevicesSeAl', 3);
        }
    });

    $(".busFinder>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#busFinderBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#busFinderBox').show();
        }
    });

    $(".geofences>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#geofencesBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#geofencesBox').show();
        }
    });

    $(".settings>a").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#settingBox').hide();
        } else {
            $(".rightMenu>nav>div>a").removeClass("active");
            $(this).addClass("active");
            hidelefttabs();
            $('#settingBox').show();
        }
    });

    $(".mapPoint>.pointSv").click(function () {
        $(".mapPoint>.pointSv").removeClass("active");
        $(this).addClass("active");
    });

    $('#opacity-slider').on("change mousemove", function () {
        $('#slider-value').html($(this).val());
    });

    $("#busFinderTable,#geofencesTable,#busesFilterFromDrawGeofenceTable").tablesorter({
        //widgets: ['zebra'], sortList: [[0,0]]
        widgets: ['zebra'], sortList: [[0, 0]]
    });

    $("#geofenceEditButton").click(function () {
        $('#viewGeofenceDetails').hide();
        $('#editGeofenceDetails').show();
    });
    $("#geofenceEditCancelButton").click(function () {
        $('#viewGeofenceDetails').show();
        $('#editGeofenceDetails').hide();
    });

    $("#palyBtn").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('#playbtnIcon').show();
            $('#pausebtnIcon').hide();
            animationState(false);
        } else {
            $(this).addClass("active");
            $('#playbtnIcon').hide();
            $('#pausebtnIcon').show();
            animationState(true);
        }
    });

    $(".nClose").click(function () {
        $('.notification').animate({top: "0px", opacity: "0.1"}, function () {
            $('.notification').hide();
            $('.notification').css({"opacity": "1.0"});
        });
    });

    $(".noConfirm").click(function () {
        $('.boxPopUpTabCon').animate({top: "0px", opacity: "0.1"}, function () {
            $('.boxPopUpTabCon').hide();
            $('.boxPopUpTabCon').css({"opacity": "1.0", "top": "50%"});
            $("#confirmationBox").hide();
            $('.boxPopUpTabCon').show();
        });
    });

    $(".yesConfirm").click(function () {
        $("#confirmationBox").hide();
        $(".popUpBox").hide();
    });

    //Layer Change from Dropdown
    $("#setLayer").on("change", function () {
        var SelectedLang = $(this).val();
        if (SelectedLang == '1') {
            filterGeofenceLayerData(1, 'المنافذ');
        } else if (SelectedLang == '2') {
            filterGeofenceLayerData(2, 'رمضان');
        } else if (SelectedLang == '3') {
            filterGeofenceLayerData(3, 'المشاعر المقدسة');
        } else if (SelectedLang == '4') {
            filterGeofenceLayerData(4, 'غير محدد');
        }
    });


    //Language Change from Dropdown
    $("#setLanguage").on("change", function () {
        var SelectedLang = $(this).val();
        if (SelectedLang == 'en') {
            location.href = '?lang=en';
        } else {
            location.href = '?lang=ar';
        }
    });

    //Browser Full Screen ON/OFF
    $(".fullscreen").click(function () {
        $(document).fullScreen(true);
        //check if broswer deniy the full screen
        $(document).bind("fullscreenchange", function (e) {
            $(document).fullScreen() ? $("#fullScreenOn").hide() : $("#fullScreenOn").show();
            $(document).fullScreen() ? $("#fullScreenOff").show() : $("#fullScreenOff").hide();
        });
    });

    $("#fullScreenOff").click(function () {
        $(document).fullScreen(false);
        $(this).hide();
        $("#fullScreenOn").show();
    });

    $("button.actionBtn").click(function () {
        $(".moreAction").hide();
        $(this).children(".moreAction").show();
        //console.log("button.actionBtn");
    });


    //Amination slider value update
    var animSlider = document.getElementById("animationRangeSlider");
    //var output = document.getElementById("demo");
    //output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    animSlider.oninput = function () {
        //output.innerHTML = this.value;
        animationSliderVal(this.value);
    }

});


// functions by Ans
let mapType = '';

function getTripDates($this, mapType) {
    mapType = $this.getAttribute('data-type');
    getImeiNo = $this.getAttribute('data-imei');
    $('.datePickerWrapper').find('#mapTypeInput').val(mapType);
    showDateRange();
    //console.log("this is: " + imeiNo);
    //showDeckGLPopup();
}

// Show Deck GL Popup
function showDeckGLPopup(imei, sDate, eDate) {
    //alert(mapType)
    const deckPopup = $('.deck-popup');
    deckPopup.css({visibility: 'visible'}).animate({
        opacity: 1,
        width: "100%",
    }, 800, "linear", function () {


        //console.log("imei no: " + imei + " Start Date: " + sDate + " End Date: " + eDate);
        $.ajax({
            url: "./data/get_glMapData.php",
            method: "POST",
            dataType: "json",
            data: {
                api_key: "becdf4fbbbf49dbc",
                imei_no: imei,
                start_date: sDate,
                end_date: eDate
            },
            success: function (response) {
                //close laoder
                let animationDataArr = response;
                let pathways = []
                let timesArr = []
                //alert('success')
                for (let i = 0; i < animationDataArr.length; i++) {
                    let data = animationDataArr[i];
                    pathways.push(data.location.coordinates)
                    timesArr.push(data.avltm);
                    //console.log(data.location.coordinates);
                }

                initDeckGlMap(pathways, timesArr)
                //console.log('animationDataArr:', pathways);
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
            }
        });
    });
}

function hideDeckGLPopup() {
    const deckPopup = $('.deck-popup');
    const deckPopupClose = $('.deck-popup .close');
    deckPopupClose.on('click', function () {
        deckPopup.animate({
            opacity: 0,
            width: 0,
        });
    })
}

hideDeckGLPopup()

var getImeiNo;

function animationImei(cb) {
    const imeiNo = cb.getAttribute('data-imei');
    getImeiNo = imeiNo;
    showDateRange();
    //console.log("this is: " + imeiNo);
}

$(function () {
    $('#dateRangeImei').daterangepicker({
        opens: 'right',
        locale: {
            applyLabel: 'Apply Date Range',
            format: "DD/MM/YYYY"
        }
    }, function (start, end, label) {
        mapType = $('.datePickerWrapper').find('#mapTypeInput').val();

        closeDateRange();

        $(".moreAction").hide();
        $("#animationRestoreBtn").hide();

        $(".busFinder>a").removeClass("active");
        $('#busFinderBox').hide();

        $(".animationPanel").show();
        $("#startDateRange").html(start.format('D MMMM, YYYY'));
        $("#endDateRange").html(end.format('D MMMM, YYYY'));

        if (mapType === "gl-map") {
            $('#animBar').show();
            showDeckGLPopup(getImeiNo, start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'), mapType);
        } else {
            getDataForAnim(getImeiNo, start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'), mapType);
            console.log("this getImeiNo: " + getImeiNo);
        }

    });
});

function closeAnimationPanel() {
    $(".animationPanel").hide();
    currentIndex = 0;
    sliderValue = 0;
    reset = true;
    $('#palyBtn').removeClass("active");
    $('#playbtnIcon').show();
    $('#pausebtnIcon').hide();
    animationState(false);
    animationDataArr = undefined;
    addBusFeatures(busDataArr);
}

function hideAnimationPanel() {
    $(".animationPanel").hide();
    $("#animationRestoreBtn").show();
}

function showAnimationPanel() {
    $(".animationPanel").show();
    $("#animationRestoreBtn").hide();
}

function closeDateRange() {
    $("#datePickerWrapper").hide();
}

function showDateRange() {
    $("#datePickerWrapper").show();
    $('#dateRangeImei').focus();
    $('.daterangepicker .drp-buttons .btn.btn-primary').prop('disabled', true);
}

function changeDataPanel() {
    closeAnimationPanel();
    showDateRange();
    console.log("close panel");
}

function resetAnimation() {
    sliderValue = 0;
    currentIndex = 0;
    reset = true;
    //document.getElementsByClassName("animBarFill")[0].style.width= sliderValue+"%";
    document.getElementById("animationRangeSlider").value = sliderValue;

}

var speed = 100;
var speedState = 0;

function setSpeed() {
    if (speedState == 0) {
        speed = 1000;
        speedState++;
    } else if (speedState == 1) {
        speed = 100;
        speedState++;
    } else if (speedState == 2) {
        speed = 10;
        speedState = 0;
    }
}

function tableSorterDataUpdate() {
    $("#busesFilterFromDrawGeofenceTable").trigger("update");
    //console.log("tableSorterDataUpdate");
}

function showNotification(txt) {
    $("#notificationText").html(txt);
    $(".notification").show();
    setTimeout(function () {
        $('.notification').animate({top: "0px", opacity: "0.1"}, function () {
            $('.notification').hide();
            $('.notification').css({top: "20px", "opacity": "1.0"});
        });
    }, 6000);
}

function showConfirmation(txt) {
    $("#confirmationText").html(txt);
    $("#confirmationBox").show();
}

function showBusCounter(activeNo, totalNumber) {
    $("#showBusData").html(activeNo);
    $("#totalBusData").html(totalNumber);
}


/////Geofence--------------------------------
$(document).ready(function () {

    //reset previously set border colors and hide all message on .keyup()
    $("#geofenceAdd input, #geofenceAdd textarea").keyup(function () {
        $("#geofenceAdd input, #geofenceAdd textarea").css('border-color', '');
        $("#newGeofenceDialogBox #result").slideUp();
    });
    $("#newGeofenceDialogBox #result").slideUp();

});

function showGeofenceDialogBox() {
    $('#viewGeofenceDialogBox').show();
    $('#viewGeofenceDetails').show();
    $('#editGeofenceDetails').hide();
}

$("#geofenceSave").click(function () {
    //get input field values
    var arabic_name = $('#arabic_name').val();
    var english_name = $('#english_name').val();
    var type = $('#type').val();
    var district = $('#district').val();
    var description = $('#description').val();
    var category = $('#category').val();
    var site = $('#site').val();
    var station_type = $('#station_type').val();
    var station_code = $('#station_code').val();
    var station_name = $('#station_name').val();
    var code_id = $('#code_id').val();
    //var area            = $('#area').val();
    //var shape_length    = $('#shape_length').val();
    //var shape_area      = $('#shape_area').val();
    var generic_name = $('#generic_name').val();
    var geofence_type = $('#geofence_type').val();
    var season = $('#season').val();
    var coordinate_arr = $('#coordinate_arr').val();
    var flag = true;
    /********validate all our form fields***********/
    if (arabic_name == "") {
        $('#arabic_name').css('border-color', 'red');
        flag = false;
    }
    if (english_name == "") {
        $('#english_name').css('border-color', 'red');
        flag = false;
    }
    if (type == "") {
        $('#type').css('border-color', 'red');
        flag = false;
    }
    if (district == "") {
        $('#district').css('border-color', 'red');
        flag = false;
    }
    if (description == "") {
        $('#description').css('border-color', 'red');
        flag = false;
    }
    if (category == "") {
        $('#category').css('border-color', 'red');
        flag = false;
    }
    if (site == "") {
        $('#site').css('border-color', 'red');
        flag = false;
    }
    if (station_type == "") {
        $('#station_type').css('border-color', 'red');
        flag = false;
    }
    if (station_code == "") {
        $('#station_code').css('border-color', 'red');
        flag = false;
    }
    if (station_name == "") {
        $('#station_name').css('border-color', 'red');
        flag = false;
    }
    if (code_id == "") {
        $('#code_id').css('border-color', 'red');
        flag = false;
    }
    if (generic_name == "") {
        $('#generic_name').css('border-color', 'red');
        flag = false;
    }
    if (geofence_type == "") {
        $('#geofence_type').css('border-color', 'red');
        flag = false;
    }
    if (season == "") {
        $('#season').css('border-color', 'red');
        flag = false;
    }

    if (coordinate_arr == "") {
        $("#newGeofenceDialogBox #result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
        flag = false;
    }

    //check int
    if (Math.floor(station_type) == station_type && $.isNumeric(station_type)) {
    } else {
        $('#station_type').css('border-color', 'red').val('');
        flag = false;
    }
    if (Math.floor(station_code) == station_code && $.isNumeric(station_code)) {
    } else {
        $('#station_code').css('border-color', 'red').val('');
        flag = false;
    }

    // check float
    //if($.isNumeric(area)){ }else{ $('#area').css('border-color','red').val('');  flag = false; }
    //if($.isNumeric(shape_length)){ }else{ $('#shape_length').css('border-color','red').val(''); flag = false; }
    //if($.isNumeric(shape_area)){ }else{ $('#shape_area').css('border-color','red').val(''); flag = false; }

    /********Validation end here ****/
    /* If all are ok then we send ajax request to email_send.php *******/
    if (flag) {
        $.ajax({
            type: 'post',
            url: "./data/set_geofence.php",
            dataType: 'json',
            data: {
                arabic_name: arabic_name,
                english_name: english_name,
                type: type,
                district: district,
                site: site,
                description: description,
                station_name: station_name,
                category: category,
                station_type: station_type,
                station_code: station_code,
                code_id: code_id,
                generic_name: generic_name,
                geofence_type: geofence_type,
                season: season,
                coordinates: coordinate_arr
            },
            beforeSend: function () {
                $('#geofenceSave, #geofenceDiscard').attr('disabled', true);
                $('#geofenceSave').after('<div class="wait">&nbsp;<img src="assets/images/icons/loading.gif" alt="" /></div>');

            },
            complete: function () {
                $('#geofenceSave, #geofenceDiscard').attr('disabled', false);
                $('.wait').remove();
            },
            success: function (data) {
                if (data.type == 'error') {
                    output = 'Error: ' + data.text + '';
                } else {
                    output = 'Success: ' + data.text + '';
                    $('#geofenceAdd input[type=text]').val('');
                    $('#geofenceAdd textarea').val('');

                    $('.boxPopUpTab').animate({top: "0px", opacity: "0.1"}, function () {
                        $('.boxPopUpTab').hide();
                        //Black Box hide
                        $('.popUpBox').animate({opacity: "0.1"}, function () {
                            $('.popUpBox').hide();
                            $('.popUpBox').css({"opacity": "1.0"});
                            $('.boxPopUpTab').show();
                            //Set to Default
                            $('.boxPopUpTab').css({"top": "20px", "opacity": "1.0"});
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

$("#geofenceUpdate").click(function () {
    //get input field values
    var arabic_name = $('#arabic_name_edit').val();
    var english_name = $('#english_name_edit').val();
    var type = $('#type_edit').val();
    var district = $('#district_edit').val();
    var description = $('#description_edit').val();
    var category = $('#category_edit').val();
    var site = $('#site_edit').val();
    var station_type = $('#station_type_edit').val();
    var station_code = $('#station_code_edit').val();
    var station_name = $('#station_name_edit').val();
    var code_id = $('#code_id_edit').val();
    var generic_name = $('#generic_name_edit').val();
    var geofence_type = $('#geofence_type_edit').val();
    var season = $('#season_edit').val();
    //var coordinate_arr  = $('#coordinate_arr_edit').val();
    var geofence_update_id = $('#geofenceUpdate_id').val();

    var flag = true;
    /********validate all our form fields***********/
    if (arabic_name == "") {
        $('#arabic_name_edit').css('border-color', 'red');
        flag = false;
    }
    if (english_name == "") {
        $('#english_name_edit').css('border-color', 'red');
        flag = false;
    }
    if (type == "") {
        $('#type_edit').css('border-color', 'red');
        flag = false;
    }
    if (district == "") {
        $('#district_edit').css('border-color', 'red');
        flag = false;
    }
    if (description == "") {
        $('#description_edit').css('border-color', 'red');
        flag = false;
    }
    if (category == "") {
        $('#category_edit').css('border-color', 'red');
        flag = false;
    }
    if (site == "") {
        $('#site_edit').css('border-color', 'red');
        flag = false;
    }
    if (station_type == "") {
        $('#station_type_edit').css('border-color', 'red');
        flag = false;
    }
    if (station_code == "") {
        $('#station_code_edit').css('border-color', 'red');
        flag = false;
    }
    if (station_name == "") {
        $('#station_name_edit').css('border-color', 'red');
        flag = false;
    }
    if (code_id == "") {
        $('#code_id_edit').css('border-color', 'red');
        flag = false;
    }
    if (generic_name == "") {
        $('#generic_name_edit').css('border-color', 'red');
        flag = false;
    }
    if (geofence_type == "") {
        $('#geofence_type_edit').css('border-color', 'red');
        flag = false;
    }
    if (season == "") {
        $('#season_edit').css('border-color', 'red');
        flag = false;
    }
    // if(coordinate_arr=="") {
    //   $("#result").hide().html('<div class="error">Wrong Draw Geofence Coordinates</div>').slideDown();
    //   flag = false;
    // }
    if (geofence_update_id == "") {
        showNotification("Error: Wrong Geofence Id, reload the page and try again.");
        flag = false;
    }

    //check int
    if (Math.floor(station_type) == station_type && $.isNumeric(station_type)) {
    } else {
        $('#station_type_edit').css('border-color', 'red').val('');
        flag = false;
    }
    if (Math.floor(station_code) == station_code && $.isNumeric(station_code)) {
    } else {
        $('#station_code_edit').css('border-color', 'red').val('');
        flag = false;
    }

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
    if (flag) {
        $.ajax({
            type: 'post',
            url: "./data/update_geofence.php",
            dataType: 'json',
            data: {
                arabic_name: arabic_name,
                english_name: english_name,
                type: type,
                district: district,
                description: description,
                category: category,
                site: site,
                station_type: station_type,
                station_code: station_code,
                station_name: station_name,
                code_id: code_id,
                generic_name: generic_name,
                geofence_type: geofence_type,
                season: season,
                //coordinates : coordinate_arr,
                geofence_update_id: geofence_update_id
            },
            beforeSend: function () {
                $('#geofenceUpdate, #geofenceCancle').attr('disabled', true);
                $('#geofenceSave').after('<div class="wait">&nbsp;<img src="assets/images/icons/loading.gif" alt="" /></div>');
            },
            complete: function () {
                $('#geofenceUpdate, #geofenceCancle').attr('disabled', false);
                $('.wait').remove();
            },
            success: function (data) {
                if (data.type == 'error') {
                    //output = '<div class="error">'+data.text+'</div>';
                    output = 'Error: ' + data.text + '';

                } else {
                    //output = '<div class="success">'+data.text+'</div>';
                    output = 'Success: ' + data.text + '';

                    $('#geofenceAdd input[type=text]').val('');
                    $('#geofenceAdd textarea').val('');

                    $('.boxPopUpTab').animate({top: "0px", opacity: "0.1"}, function () {
                        $('.boxPopUpTab').hide();
                        //Black Box hide
                        $('.popUpBox').animate({opacity: "0.1"}, function () {
                            $('.popUpBox').hide();
                            $('.popUpBox').css({"opacity": "1.0"});
                            $('.boxPopUpTab').show();
                            //Set to Default
                            $('.boxPopUpTab').css({"top": "20px", "opacity": "1.0"});
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

$("#geofenceDelete").click(function () {
    showConfirmation("Do you really want to delete?");
});

$("#geofenceDeleteConfirm").click(function () {
    //get input field values
    var geofence_id = $('#geofence_id').val();
    var flag = true;
    /********validate all our form fields***********/
    if (geofence_id == "") {
        //$("#result2").hide().html('<div class="error">Wrong Draw Geofence Id</div>').slideDown();
        showNotification("Error: Wrong Geofence Id, reload the page and try again.");
        flag = false;
    }
    /********Validation end here ****/
    /* If all are ok then we send ajax request to email_send.php *******/
    if (flag) {
        $.ajax({
            type: 'post',
            url: "./data/delete_geofence.php",
            dataType: 'json',
            data: {
                geofence_id: geofence_id
            },
            beforeSend: function () {
                //$('#geofenceSave').attr('disabled', true);
                //$('#geofenceSave').after('<span class="wait">&nbsp;<img src="image/loading.gif" alt="" /></span>');

            },
            complete: function () {
                //$('#geofenceSave').attr('disabled', false);
                //$('.wait').remove();
            },
            success: function (data) {
                //alert(geofence_id);
                console.log(data);

                if (data.type == 'error') {
                    output = 'Error: ' + data.text;
                } else {
                    output = 'Success: ' + data.text;
                    $('#geofenceAdd input[type=text]').val('');
                    $('#geofenceAdd textarea').val('');

                    $('.popUpBoxTab').animate({top: "0px", opacity: "0.1"}, function () {
                        $('.popUpBoxTab').hide();
                        //Black Box hide
                        $('.popUpBox').animate({opacity: "0.1"}, function () {
                            $('.popUpBox').hide();
                            $('.popUpBox').css({"opacity": "1.0"});
                            $('.popUpBoxTab').show();
                            //Set to Default
                            $('.popUpBoxTab').css({"top": "20px", "opacity": "1.0"});
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


// initialize Deck GL Maps
function initDeckGlMap(pathways, timesArr) {

    //console.log(pathways[1][0])
    //console.log(timesArr)

    // Convert the first timestamp to seconds (divide by 1000 to convert from milliseconds to seconds)
    const firstTimestamp = timesArr[0] / 1000;
    // Calculate relative times based on the first timestamp
    timesArr = timesArr.map((timestamp) => Math.round((timestamp / 1000 - firstTimestamp) / 3600));

    //console.log(timesArr);

    const ANIMATION_SPEED = 40;
    const INITIAL_PAUSE = 1;
    const colors = {0: [253, 128, 93], 'others': [23, 184, 190]};

    const getColor = i => {
        if (typeof i === 'undefined' || !(i in colors)) {
            i = 'others'
        }
        return colors[i];
    }

    new deck.DeckGL({
        container: 'deckGlMap',
        //mapboxApiAccessToken: 'pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ',
        mapStyle: 'https://basemaps.cartocdn.com/gl/positron-nolabels-gl-style/style.json',
        initialViewState: {longitude: pathways[0][1], latitude: pathways[0][0], zoom: 1}
    });

    // var pathways = [
    //     [
    //         39.556800842285156,
    //         24.34454345703125
    //     ],
    //     [
    //         39.556800842285156,
    //         24.34454345703125
    //     ],
    //     [
    //         39.556461334228516,
    //         24.347759246826172
    //     ],
    //     [
    //         39.552734375,
    //         24.353837966918945
    //     ],
    //     [
    //         39.552734375,
    //         24.353837966918945
    //     ],
    //     [
    //         39.58393859863281,
    //         24.432825088500977
    //     ],
    //     [
    //         39.58393859863281,
    //         24.432825088500977
    //     ],
    //     [
    //         39.633270263671875,
    //         24.450973510742188
    //     ],
    //     [
    //         39.6246223449707,
    //         24.45707130432129
    //     ],
    //     [
    //         39.622032165527344,
    //         24.4622802734375
    //     ],
    //     [
    //         39.62726974487305,
    //         24.467451095581055
    //     ],
    //     [
    //         39.630897521972656,
    //         24.470134735107422
    //     ],
    //     [
    //         39.6182975769043,
    //         24.49931526184082
    //     ],
    //     [
    //         39.61373519897461,
    //         24.501205444335938
    //     ],
    //     [
    //         39.582366943359375,
    //         24.480802536010742
    //     ],
    //     [
    //         39.577728271484375,
    //         24.483074188232422
    //     ],
    //     [
    //         39.58403015136719,
    //         24.47999382019043
    //     ],
    //     [
    //         39.594478607177734,
    //         24.477336883544922
    //     ],
    //     [
    //         39.60143280029297,
    //         24.480323791503906
    //     ],
    //     [
    //         39.60143280029297,
    //         24.480323791503906
    //     ],
    //     [
    //         39.62458419799805,
    //         24.44166374206543
    //     ],
    //     [
    //         39.617862701416016,
    //         24.44009780883789
    //     ],
    //     [
    //         39.618038177490234,
    //         24.432144165039062
    //     ],
    //     [
    //         39.631675720214844,
    //         24.43267059326172
    //     ],
    //     [
    //         39.631675720214844,
    //         24.43267059326172
    //     ],
    //     [
    //         39.629188537597656,
    //         24.448179244995117
    //     ],
    //     [
    //         39.628883361816406,
    //         24.453187942504883
    //     ],
    //     [
    //         39.628883361816406,
    //         24.453187942504883
    //     ],
    //     [
    //         39.62458801269531,
    //         24.442026138305664
    //     ],
    //     [
    //         39.57889175415039,
    //         24.43151092529297
    //     ],
    //     [
    //         39.55195236206055,
    //         24.417423248291016
    //     ],
    //     [
    //         39.55195236206055,
    //         24.417423248291016
    //     ],
    //     [
    //         39.55195236206055,
    //         24.417423248291016
    //     ],
    //     [
    //         39.55195236206055,
    //         24.417423248291016
    //     ],
    //     [
    //         39.54354476928711,
    //         24.391416549682617
    //     ],
    //     [
    //         39.55182647705078,
    //         24.34441375732422
    //     ],
    //     [
    //         39.55182647705078,
    //         24.34441375732422
    //     ],
    //     [
    //         39.55182647705078,
    //         24.34441375732422
    //     ],
    //     [
    //         39.55732345581055,
    //         24.33070182800293
    //     ],
    //     [
    //         39.55057907104492,
    //         24.295303344726562
    //     ],
    //     [
    //         39.55057907104492,
    //         24.295303344726562
    //     ],
    //     [
    //         39.561038970947266,
    //         24.316247940063477
    //     ],
    //     [
    //         39.561038970947266,
    //         24.316247940063477
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55633544921875,
    //         24.333486557006836
    //     ],
    //     [
    //         39.55441665649414,
    //         24.34456443786621
    //     ],
    //     [
    //         39.55657958984375,
    //         24.34357452392578
    //     ],
    //     [
    //         39.55657958984375,
    //         24.34357452392578
    //     ],
    //     [
    //         39.55563735961914,
    //         24.3494930267334
    //     ],
    //     [
    //         39.55563735961914,
    //         24.3494930267334
    //     ],
    //     [
    //         39.56310272216797,
    //         24.28668975830078
    //     ],
    //     [
    //         39.564327239990234,
    //         24.19243621826172
    //     ],
    //     [
    //         39.572696685791016,
    //         24.165386199951172
    //     ],
    //     [
    //         39.582786560058594,
    //         24.107088088989258
    //     ],
    //     [
    //         39.59404373168945,
    //         24.053726196289062
    //     ],
    //     [
    //         39.55618667602539,
    //         23.99207305908203
    //     ],
    //     [
    //         39.58566665649414,
    //         23.910539627075195
    //     ],
    //     [
    //         39.60862731933594,
    //         23.872882843017578
    //     ],
    //     [
    //         39.60862731933594,
    //         23.872882843017578
    //     ],
    //     [
    //         39.629478454589844,
    //         23.837024688720703
    //     ],
    //     [
    //         39.66501998901367,
    //         23.791391372680664
    //     ],
    //     [
    //         39.72528076171875,
    //         23.76325225830078
    //     ],
    //     [
    //         39.79326629638672,
    //         23.699871063232422
    //     ],
    //     [
    //         39.79326629638672,
    //         23.699871063232422
    //     ],
    //     [
    //         39.79326629638672,
    //         23.699871063232422
    //     ],
    //     [
    //         39.82682418823242,
    //         23.601682662963867
    //     ],
    //     [
    //         39.86140441894531,
    //         23.555248260498047
    //     ],
    //     [
    //         39.86692428588867,
    //         23.501218795776367
    //     ],
    //     [
    //         39.917724609375,
    //         23.338607788085938
    //     ],
    //     [
    //         39.929683685302734,
    //         23.29576873779297
    //     ],
    //     [
    //         39.948917388916016,
    //         23.249300003051758
    //     ],
    //     [
    //         39.95443344116211,
    //         23.19532585144043
    //     ],
    //     [
    //         39.949520111083984,
    //         23.140207290649414
    //     ],
    //     [
    //         39.95341110229492,
    //         23.09914207458496
    //     ],
    //     [
    //         39.895816802978516,
    //         22.91561508178711
    //     ],
    //     [
    //         39.87543869018555,
    //         22.870729446411133
    //     ],
    //     [
    //         39.87543869018555,
    //         22.870729446411133
    //     ],
    //     [
    //         39.79840850830078,
    //         22.79524803161621
    //     ],
    //     [
    //         39.79840850830078,
    //         22.79524803161621
    //     ],
    //     [
    //         39.69691848754883,
    //         22.695083618164062
    //     ],
    //     [
    //         39.645748138427734,
    //         22.628076553344727
    //     ],
    //     [
    //         39.645748138427734,
    //         22.628076553344727
    //     ],
    //     [
    //         39.645748138427734,
    //         22.628076553344727
    //     ],
    //     [
    //         39.63340759277344,
    //         22.59140396118164
    //     ],
    //     [
    //         39.50414276123047,
    //         22.484054565429688
    //     ],
    //     [
    //         39.465457916259766,
    //         22.461410522460938
    //     ],
    //     [
    //         39.418914794921875,
    //         22.43709373474121
    //     ],
    //     [
    //         39.3620719909668,
    //         22.430675506591797
    //     ],
    //     [
    //         39.36117172241211,
    //         22.428943634033203
    //     ],
    //     [
    //         39.34778594970703,
    //         22.40911865234375
    //     ],
    //     [
    //         39.34778594970703,
    //         22.40911865234375
    //     ],
    //     [
    //         39.30329513549805,
    //         22.33404541015625
    //     ],
    //     [
    //         39.25162124633789,
    //         22.305429458618164
    //     ],
    //     [
    //         39.25162124633789,
    //         22.305429458618164
    //     ],
    //     [
    //         39.25162124633789,
    //         22.305429458618164
    //     ],
    //     [
    //         39.25162124633789,
    //         22.305429458618164
    //     ],
    //     [
    //         39.26904296875,
    //         22.131507873535156
    //     ],
    //     [
    //         39.26904296875,
    //         22.131507873535156
    //     ],
    //     [
    //         39.31147766113281,
    //         22.055343627929688
    //     ],
    //     [
    //         39.35990524291992,
    //         21.964658737182617
    //     ],
    //     [
    //         39.35990524291992,
    //         21.964658737182617
    //     ],
    //     [
    //         39.42640686035156,
    //         21.808053970336914
    //     ],
    //     [
    //         39.456275939941406,
    //         21.760061264038086
    //     ],
    //     [
    //         39.56399154663086,
    //         21.67728614807129
    //     ],
    //     [
    //         39.56399154663086,
    //         21.67728614807129
    //     ],
    //     [
    //         39.56399154663086,
    //         21.67728614807129
    //     ],
    //     [
    //         39.56399154663086,
    //         21.67728614807129
    //     ],
    //     [
    //         39.59375,
    //         21.665571212768555
    //     ],
    //     [
    //         39.661705017089844,
    //         21.636302947998047
    //     ],
    //     [
    //         39.711822509765625,
    //         21.62320327758789
    //     ],
    //     [
    //         39.80945587158203,
    //         21.392486572265625
    //     ],
    //     [
    //         39.82489776611328,
    //         21.39206314086914
    //     ],
    //     [
    //         39.77996826171875,
    //         21.348052978515625
    //     ],
    //     [
    //         39.7588005065918,
    //         21.40591812133789
    //     ],
    //     [
    //         39.76096725463867,
    //         21.40182113647461
    //     ],
    //     [
    //         39.7622184753418,
    //         21.410165786743164
    //     ],
    //     [
    //         39.781002044677734,
    //         21.415117263793945
    //     ],
    //     [
    //         39.80666732788086,
    //         21.382295608520508
    //     ],
    //     [
    //         39.80521011352539,
    //         21.375530242919922
    //     ],
    //     [
    //         39.79371643066406,
    //         21.360685348510742
    //     ],
    //     [
    //         39.77372360229492,
    //         21.354602813720703
    //     ],
    //     [
    //         39.759944915771484,
    //         21.402416229248047
    //     ],
    //     [
    //         39.73090362548828,
    //         21.43210220336914
    //     ],
    //     [
    //         39.760128021240234,
    //         21.400808334350586
    //     ]
    // ];
    // var timesArr = [
    //     0,
    //     6,
    //     12,
    //     18,
    //     24,
    //     30,
    //     36,
    //     42,
    //     48,
    //     54,
    //     60,
    //     66,
    //     72,
    //     78,
    //     84,
    //     90,
    //     96,
    //     102,
    //     108,
    //     114,
    //     120,
    //     126,
    //     132,
    //     138,
    //     144,
    //     150,
    //     156,
    //     162,
    //     168,
    //     174,
    //     180,
    //     186,
    //     192,
    //     198,
    //     204,
    //     210,
    //     216,
    //     222,
    //     228,
    //     234,
    //     240,
    //     246,
    //     252,
    //     258,
    //     264,
    //     270,
    //     276,
    //     282,
    //     288,
    //     294,
    //     300,
    //     306,
    //     312,
    //     318,
    //     324,
    //     330,
    //     336,
    //     342,
    //     348,
    //     354,
    //     360,
    //     366,
    //     372,
    //     378,
    //     384,
    //     390,
    //     396,
    //     402,
    //     408,
    //     414,
    //     420,
    //     426,
    //     432,
    //     438,
    //     444,
    //     450,
    //     456,
    //     462,
    //     468,
    //     474,
    //     480,
    //     486,
    //     492,
    //     498,
    //     504,
    //     510,
    //     516,
    //     522,
    //     528,
    //     534,
    //     540,
    //     546,
    //     552,
    //     558,
    //     564,
    //     570,
    //     576,
    //     582,
    //     588,
    //     594,
    //     600,
    //     606,
    //     612,
    //     618,
    //     624,
    //     630,
    //     636,
    //     642,
    //     648,
    //     654,
    //     660,
    //     666,
    //     672,
    //     678,
    //     684,
    //     690,
    //     696,
    //     702,
    //     708,
    //     714,
    //     720,
    //     726,
    //     732,
    //     738,
    //     744,
    //     750,
    //     756,
    //     762,
    //     768,
    //     774
    // ];
    //drawTrips([{"vendor":0,"path":[[139.8007914,35.5144044],[139.9108676,35.4396142]],"timestamps":[0,600]},{"vendor":1,"path":[[139.9108139,35.439529],[139.8008987,35.5140027]],"timestamps":[0,800]}]);

    drawTrips([{"vendor": 0, "path": pathways, "timestamps": timesArr}]);

    const setDropArea = (area) => {
        area.ondragover = () => false;
        area.ondrop = async event => {
            event.preventDefault();
            const promises = [];
            for (const file of event.dataTransfer.files) {
                if (file.name.split('.').pop() == 'json') {
                    promises.push(file.text());
                }
            }
            const results = await Promise.all(promises);
            drawTrips(results.map(JSON.parse).flat());
            return false;
        };
    }

    setDropArea(document.getElementById('deckGlMap'));

    function bbox(json) {
        let points = [];
        for (let e of json) {
            points = points.concat(e.path);
        }
        const b = turf.bbox(turf.multiPoint(points))
        return [[b[0], b[3]], [b[2], b[1]]];
    }

    function interval_timestamps(json) {
        let timestamps = [];
        for (let e of json) {
            timestamps = timestamps.concat(e.timestamps);
        }
        return [Math.min(...timestamps), Math.max(...timestamps)];
    }

    function drawTrips(json) {
        const interval = interval_timestamps(json);
        interval[0] -= ANIMATION_SPEED * INITIAL_PAUSE;
        const view = new deck.WebMercatorViewport({
            width: document.body.clientWidth,
            height: document.body.clientHeight
        });

        deck.carto.setDefaultCredentials({
            username: 'public',
            apiKey: 'default_public',
        });

        const deckgl = new deck.DeckGL({
            container: 'deckGlMap',
            mapStyle: deck.carto.BASEMAP.DARK_MATTER,
            initialViewState: view.fitBounds(bbox(json)),
            controller: true
        });

        const map = deckgl.getMapboxMap();

        map.addControl(new mapboxgl.ScaleControl({
            maxWidth: 160,
            unit: 'metric'
        }));

        let time = 0;
        const RATE_ANIMATION_FRAME = 50;

        function animate() {
            time = (time + ANIMATION_SPEED / RATE_ANIMATION_FRAME) % (interval[1] - interval[0]);
            window.requestAnimationFrame(animate);
        }

        setInterval(() => {
            deckgl.setProps({
                layers: [
                    new deck.TripsLayer({
                        id: 'trips-layer',
                        data: json,
                        getPath: d => d.path,
                        getTimestamps: d => d.timestamps,
                        getColor: d => getColor(d.vendor),
                        opacity: 0.8,
                        widthMinPixels: 3,
                        jointRounded: true,
                        capRounded: true,
                        trailLength: 180,
                        currentTime: time + interval[0],
                        //currentTime: 0,
                        shadowEnabled: false
                    })
                ]
            });
        }, 50);

        window.requestAnimationFrame(animate);
    }
}
