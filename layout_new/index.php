<?php
// ----------------------------------------------------------------------------------------------------
// - Display Errors
// ----------------------------------------------------------------------------------------------------
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
require_once("config/config.php");
require_once("verify/verify.php");
require_once("lang/language.php");
require_once("data/get_avlDevicesDataAll.php");
$classObject = new GetAvlDevicesData();
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Scroll Bar -->
    <link type="text/css" href="assets/plugin/scrollBar/css/perfect-scrollbar.css" rel="stylesheet" media="all"/>
    <script type="text/javascript" src="assets/plugin/scrollBar/js/perfect-scrollbar.js"></script>

    <!--Table Sorter-->
    <script src="assets/plugin/sorter/jquery.tablesorter.js"></script>
    <link rel="stylesheet" href="assets/plugin/sorter/style.css" type="text/css"/>

    <!-- Full Screen Browser Js  -->
    <script src="assets/plugin/fullScreen/jquery.fullscreen-min.js"></script>

    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css"
          type="text/css">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

    <!-- Date picker -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    <!--Deck GL Map plugin style-->
    <link href="https://libs.cartocdn.com/mapbox-gl/v1.13.0/mapbox-gl.css" rel="stylesheet"/>

    <!-- Custom Code -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/gis/main.js"></script>
    <script src="assets/js/gis/ol-ext.js"></script>
    <link rel="stylesheet" href="assets/css/ol-ext.css" type="text/css"/>

    <!-- Styling -->
    <link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen"/>

    <link rel="stylesheet" href="assets/css/deck-gl-style.css" type="text/css" media="screen"/>

    <?php if ($lang_type == 'ar') { ?>
        <link rel="stylesheet" href="assets/css/style_arabic.css" type="text/css" media="screen"/>
    <?php } ?>

    <!--[if lt IE 9]>
    <script src="assets/js/html5.js"></script>
    <link rel="stylesheet" href="assets/css/ie.css">
    <![endif]-->
</head>
<body>

<!--==========Start Main Content Area==========-->
<!--Deck gl map wrapper-->
<div class="deck-popup">
    <div class="popup-header">
        <button type="button" class="close"><img src="assets/images/icons/close.svg" alt="close"> Close Map</button>
    </div>
    <div id="deckGlMap"></div>
</div>

<!-- Map Wrapper -->
<div class="mapWrapper1" id="mapContainer1">
    <!-- <img src="assets/images/bg__tem.png" width="100%" height="100%"> -->
</div>


<div class="mainContainer">

    <!-- Right Menu Strip -->
    <?php include 'include/right_nav.php'; ?>

    <!-- Left Top Buttons -->
    <!-- <div class="leftTopButtons">
      <nav>

        <div id="activeDGF"><a href="javascript:void(0)" id="draw_geofence"><img src="assets/images/icons/pen_tool.svg"></a></div>
        <div id="deactiveDGF"><a href="javascript:void(0)" id="de_draw_geofence"><img src="assets/images/icons/close.svg"></a></div>


      </nav>
    </div> -->

    <!-- Left Bottom Buttons -->
    <div class="leftBottomButtons">
        <nav>
            <div>
                <div onclick="zoomTo(+1)"><a href="javascript:void(0)"><img src="assets/images/icons/plus.svg"></a>
                </div>
                <div onclick="zoomTo(-1)"><a href="javascript:void(0)"><img src="assets/images/icons/minus.svg"></a>
                </div>
            </div>

        </nav>
    </div>
    <div class="leftBottomButtonsR">
        <nav>
            <div>
                <div onclick="resetExtent()"><a href="javascript:void(0)"><img
                            src="assets/images/icons/navigate.svg"></a></div>
                <div id="fullScreenOn" class="fullscreen"><a href="javascript:void(0)"><img
                            src="assets/images/icons/maximize.svg"></a></div>
                <div id="fullScreenOff" class=""><a href="javascript:void(0)" id="de_draw_geofence"><img
                            src="assets/images/icons/close.svg"></a></div>
            </div>

        </nav>
    </div>

</div>
<!--==========End Main Content Area==========-->


<!-- All Bus Popups -->
<?php include 'include/bus.php'; ?>

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
    <div id="loadingBusData"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'LoadingBusData'); ?>...
    </div>
    <div
        id="loadingGeofenceData"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'LoadingGeofenceData'); ?>
        ...
    </div>
</div>

<!-- Bus Counter  -->
<div class="busCounterData">
    <span id="showBusData">0</span> / <span id="totalBusData">0</span>
</div>

<!--Start scripts-->

<script type="text/javascript">
    $(document).ready(function () {

        //showNotification("Success: Here is text for notification");
        //showConfirmation("Do you really want to delete?");
        //$("#confirmationBox").show();
        //$('#newGeofenceDialogBox').show();
        //$('#busDialogBox').show();
        //$('#geofenceDialogBox').show();
    });
</script>

<!--Start Deck GL Scripts-->
<script src="https://unpkg.com/deck.gl@^8.6.5/dist.min.js"></script>
<script src="https://unpkg.com/@deck.gl/carto@^8.6.5/dist.min.js"></script>
<script src="https://libs.cartocdn.com/mapbox-gl/v1.13.0/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>

<script src="assets/js/functions.js"></script>

<script type="text/javascript">
    /*const ANIMATION_SPEED = 40;
    const INITIAL_PAUSE = 1;
    const colors = {0: [253, 128, 93], 'others': [23, 184, 190]};

    const getColor = i => {
        if (typeof i === 'undefined' || !(i in colors)) {
            i = 'others'
        }
        ;
        return colors[i];
    }

    new deck.DeckGL({
        container: 'deckGlMap',
        //mapboxApiAccessToken: 'pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ',
        mapStyle: 'https://basemaps.cartocdn.com/gl/positron-nolabels-gl-style/style.json',
        initialViewState: {longitude: 39.456, latitude: 23.344, zoom: 1}
    });


    var pathways = [
        [
            39.556800842285156,
            24.34454345703125
        ],
        [
            39.556800842285156,
            24.34454345703125
        ],
        [
            39.556461334228516,
            24.347759246826172
        ],
        [
            39.552734375,
            24.353837966918945
        ],
        [
            39.552734375,
            24.353837966918945
        ],
        [
            39.58393859863281,
            24.432825088500977
        ],
        [
            39.58393859863281,
            24.432825088500977
        ],
        [
            39.633270263671875,
            24.450973510742188
        ],
        [
            39.6246223449707,
            24.45707130432129
        ],
        [
            39.622032165527344,
            24.4622802734375
        ],
        [
            39.62726974487305,
            24.467451095581055
        ],
        [
            39.630897521972656,
            24.470134735107422
        ],
        [
            39.6182975769043,
            24.49931526184082
        ],
        [
            39.61373519897461,
            24.501205444335938
        ],
        [
            39.582366943359375,
            24.480802536010742
        ],
        [
            39.577728271484375,
            24.483074188232422
        ],
        [
            39.58403015136719,
            24.47999382019043
        ],
        [
            39.594478607177734,
            24.477336883544922
        ],
        [
            39.60143280029297,
            24.480323791503906
        ],
        [
            39.60143280029297,
            24.480323791503906
        ],
        [
            39.62458419799805,
            24.44166374206543
        ],
        [
            39.617862701416016,
            24.44009780883789
        ],
        [
            39.618038177490234,
            24.432144165039062
        ],
        [
            39.631675720214844,
            24.43267059326172
        ],
        [
            39.631675720214844,
            24.43267059326172
        ],
        [
            39.629188537597656,
            24.448179244995117
        ],
        [
            39.628883361816406,
            24.453187942504883
        ],
        [
            39.628883361816406,
            24.453187942504883
        ],
        [
            39.62458801269531,
            24.442026138305664
        ],
        [
            39.57889175415039,
            24.43151092529297
        ],
        [
            39.55195236206055,
            24.417423248291016
        ],
        [
            39.55195236206055,
            24.417423248291016
        ],
        [
            39.55195236206055,
            24.417423248291016
        ],
        [
            39.55195236206055,
            24.417423248291016
        ],
        [
            39.54354476928711,
            24.391416549682617
        ],
        [
            39.55182647705078,
            24.34441375732422
        ],
        [
            39.55182647705078,
            24.34441375732422
        ],
        [
            39.55182647705078,
            24.34441375732422
        ],
        [
            39.55732345581055,
            24.33070182800293
        ],
        [
            39.55057907104492,
            24.295303344726562
        ],
        [
            39.55057907104492,
            24.295303344726562
        ],
        [
            39.561038970947266,
            24.316247940063477
        ],
        [
            39.561038970947266,
            24.316247940063477
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55633544921875,
            24.333486557006836
        ],
        [
            39.55441665649414,
            24.34456443786621
        ],
        [
            39.55657958984375,
            24.34357452392578
        ],
        [
            39.55657958984375,
            24.34357452392578
        ],
        [
            39.55563735961914,
            24.3494930267334
        ],
        [
            39.55563735961914,
            24.3494930267334
        ],
        [
            39.56310272216797,
            24.28668975830078
        ],
        [
            39.564327239990234,
            24.19243621826172
        ],
        [
            39.572696685791016,
            24.165386199951172
        ],
        [
            39.582786560058594,
            24.107088088989258
        ],
        [
            39.59404373168945,
            24.053726196289062
        ],
        [
            39.55618667602539,
            23.99207305908203
        ],
        [
            39.58566665649414,
            23.910539627075195
        ],
        [
            39.60862731933594,
            23.872882843017578
        ],
        [
            39.60862731933594,
            23.872882843017578
        ],
        [
            39.629478454589844,
            23.837024688720703
        ],
        [
            39.66501998901367,
            23.791391372680664
        ],
        [
            39.72528076171875,
            23.76325225830078
        ],
        [
            39.79326629638672,
            23.699871063232422
        ],
        [
            39.79326629638672,
            23.699871063232422
        ],
        [
            39.79326629638672,
            23.699871063232422
        ],
        [
            39.82682418823242,
            23.601682662963867
        ],
        [
            39.86140441894531,
            23.555248260498047
        ],
        [
            39.86692428588867,
            23.501218795776367
        ],
        [
            39.917724609375,
            23.338607788085938
        ],
        [
            39.929683685302734,
            23.29576873779297
        ],
        [
            39.948917388916016,
            23.249300003051758
        ],
        [
            39.95443344116211,
            23.19532585144043
        ],
        [
            39.949520111083984,
            23.140207290649414
        ],
        [
            39.95341110229492,
            23.09914207458496
        ],
        [
            39.895816802978516,
            22.91561508178711
        ],
        [
            39.87543869018555,
            22.870729446411133
        ],
        [
            39.87543869018555,
            22.870729446411133
        ],
        [
            39.79840850830078,
            22.79524803161621
        ],
        [
            39.79840850830078,
            22.79524803161621
        ],
        [
            39.69691848754883,
            22.695083618164062
        ],
        [
            39.645748138427734,
            22.628076553344727
        ],
        [
            39.645748138427734,
            22.628076553344727
        ],
        [
            39.645748138427734,
            22.628076553344727
        ],
        [
            39.63340759277344,
            22.59140396118164
        ],
        [
            39.50414276123047,
            22.484054565429688
        ],
        [
            39.465457916259766,
            22.461410522460938
        ],
        [
            39.418914794921875,
            22.43709373474121
        ],
        [
            39.3620719909668,
            22.430675506591797
        ],
        [
            39.36117172241211,
            22.428943634033203
        ],
        [
            39.34778594970703,
            22.40911865234375
        ],
        [
            39.34778594970703,
            22.40911865234375
        ],
        [
            39.30329513549805,
            22.33404541015625
        ],
        [
            39.25162124633789,
            22.305429458618164
        ],
        [
            39.25162124633789,
            22.305429458618164
        ],
        [
            39.25162124633789,
            22.305429458618164
        ],
        [
            39.25162124633789,
            22.305429458618164
        ],
        [
            39.26904296875,
            22.131507873535156
        ],
        [
            39.26904296875,
            22.131507873535156
        ],
        [
            39.31147766113281,
            22.055343627929688
        ],
        [
            39.35990524291992,
            21.964658737182617
        ],
        [
            39.35990524291992,
            21.964658737182617
        ],
        [
            39.42640686035156,
            21.808053970336914
        ],
        [
            39.456275939941406,
            21.760061264038086
        ],
        [
            39.56399154663086,
            21.67728614807129
        ],
        [
            39.56399154663086,
            21.67728614807129
        ],
        [
            39.56399154663086,
            21.67728614807129
        ],
        [
            39.56399154663086,
            21.67728614807129
        ],
        [
            39.59375,
            21.665571212768555
        ],
        [
            39.661705017089844,
            21.636302947998047
        ],
        [
            39.711822509765625,
            21.62320327758789
        ],
        [
            39.80945587158203,
            21.392486572265625
        ],
        [
            39.82489776611328,
            21.39206314086914
        ],
        [
            39.77996826171875,
            21.348052978515625
        ],
        [
            39.7588005065918,
            21.40591812133789
        ],
        [
            39.76096725463867,
            21.40182113647461
        ],
        [
            39.7622184753418,
            21.410165786743164
        ],
        [
            39.781002044677734,
            21.415117263793945
        ],
        [
            39.80666732788086,
            21.382295608520508
        ],
        [
            39.80521011352539,
            21.375530242919922
        ],
        [
            39.79371643066406,
            21.360685348510742
        ],
        [
            39.77372360229492,
            21.354602813720703
        ],
        [
            39.759944915771484,
            21.402416229248047
        ],
        [
            39.73090362548828,
            21.43210220336914
        ],
        [
            39.760128021240234,
            21.400808334350586
        ]
    ];

    var timesArr = [
        0,
        6,
        12,
        18,
        24,
        30,
        36,
        42,
        48,
        54,
        60,
        66,
        72,
        78,
        84,
        90,
        96,
        102,
        108,
        114,
        120,
        126,
        132,
        138,
        144,
        150,
        156,
        162,
        168,
        174,
        180,
        186,
        192,
        198,
        204,
        210,
        216,
        222,
        228,
        234,
        240,
        246,
        252,
        258,
        264,
        270,
        276,
        282,
        288,
        294,
        300,
        306,
        312,
        318,
        324,
        330,
        336,
        342,
        348,
        354,
        360,
        366,
        372,
        378,
        384,
        390,
        396,
        402,
        408,
        414,
        420,
        426,
        432,
        438,
        444,
        450,
        456,
        462,
        468,
        474,
        480,
        486,
        492,
        498,
        504,
        510,
        516,
        522,
        528,
        534,
        540,
        546,
        552,
        558,
        564,
        570,
        576,
        582,
        588,
        594,
        600,
        606,
        612,
        618,
        624,
        630,
        636,
        642,
        648,
        654,
        660,
        666,
        672,
        678,
        684,
        690,
        696,
        702,
        708,
        714,
        720,
        726,
        732,
        738,
        744,
        750,
        756,
        762,
        768,
        774
    ];
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
                        shadowEnabled: false
                    })
                ]
            });
        }, 50);

        window.requestAnimationFrame(animate);
    }*/
</script>
</body>
</html>

