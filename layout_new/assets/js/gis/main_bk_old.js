// Create a new map instance
var osmLayer;
var mapboxLayer;
var googleMap;
var googleMapHybrid;
var map;

function initMap() {
  map = new ol.Map({
    target: 'mapContainer1', // The ID of the div element where the map should be rendered
    view: new ol.View({
      center: ol.proj.fromLonLat([45.0792, 23.8859]), // The initial center coordinates of the map, transformed to EPSG:3857
      zoom: 7, // The initial zoom level
      controls: ol.control.defaults({
        attribution: false,
        zoom: false,
      }),
    })
  });

  // Add a basemap layer
  osmLayer = new ol.layer.Tile({
    source: new ol.source.OSM() // OpenStreetMap as the basemap source
  });

  // Add the osm layer to the map
  map.addLayer(osmLayer);

  //import createMap from 'ol-mapbox-style';

  //createMap('mapboxLayer', 'https://api.mapbox.com/styles/v1/shahbazatta/cli1o0xfg02hy01qyfvv19qkf.html?title=view&access_token=pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ&zoomwheel=true&fresh=true#15.53/21.422597/39.827034')
  //.then(function(mapboxLayer) {
  // map is an ol/Map instance with the layers from the Mapbox style object
  //});
  // mapboxLayer =  new ol.layer.Tile({
  //       source: new ol.source.XYZ({
  // 	      //url: 'https://api.mapbox.com/styles/v1/shahbazatta/cli1o0xfg02hy01qyfvv19qkf.html?access_token=pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ' //this works
  // 		          url: 'https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ' //this works
  // 	  })
  //     })

  mapboxLayer = new ol.layer.Tile({
    source: new ol.source.XYZ({
      url: 'https://api.mapbox.com/styles/v1/shahbazatta/cli1o0xfg02hy01qyfvv19qkf/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ',
      attributions: 'Map data © <a href="https://www.mapbox.com/">Mapbox</a>',
    }),
  })
  map.addLayer(mapboxLayer);

  googleMap = new ol.layer.Tile({
    source: new ol.source.XYZ({
      url: 'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}'
    })
  });

  map.addLayer(googleMap);

  googleMapHybrid = new ol.layer.Tile({
    source: new ol.source.XYZ({
      url: 'http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}'
    })
  });

  map.addLayer(googleMapHybrid);

}

// initialize Deck GL Maps
let deckAminLoopRunning = false;
let animationId;
var deckgl;
function initDeckGlMap(pathways, timesArr) {

    //console.log(pathways[1][0])
    //console.log(timesArr)

    //Convert the first timestamp to seconds (divide by 1000 to convert from milliseconds to seconds)
    const firstTimestamp = timesArr[0] / 1000;
    // Calculate relative times based on the first timestamp
    timesArr = timesArr.map((timestamp) => Math.round((timestamp / 1000 - firstTimestamp) / 60));


    let ANIMATION_SPEED = 40;
    const INITIAL_PAUSE = 1;

    // set speed on click
    const speedBtn = $("#speedBtn");

    speedBtn.on("click", function(e) {
        //alert("Ok");
        if (speedState === 0) {
            ANIMATION_SPEED = 80;
            speed = 1000;
            speedState++;
        } else if (speedState === 1) {
            ANIMATION_SPEED = 120;
            speed = 100;
            speedState++;
        } else if (speedState === 2) {
            ANIMATION_SPEED = 180;
            speed = 10;
            speedState = 0;
        }
    })

    const colors = {0: [253, 128, 93], 'others': [23, 184, 190]};

    const getColor = i => {
        if (typeof i === 'undefined' || !(i in colors)) {
            i = 'others'
        }
        return colors[i];
    }

    deckgl = new deck.DeckGL({
        container: 'deckGlMap',
        mapStyle: cartoBaseMap,
        initialViewState: {
            longitude: pathways[0][1],
            latitude: pathways[0][0],
            zoom: 20,
            minZoom: 2,
            maxZoom: 20,
            pitch: 0,
            bearing: 0,
        }
    });

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

        deckgl = new deck.DeckGL({
            container: 'deckGlMap',
            mapStyle: cartoBaseMap,
            initialViewState: view.fitBounds(bbox(json)),
            controller: true
        });

        const deckMap = deckgl.getMapboxMap();

        deckMap.addControl(new mapboxgl.ScaleControl({
            maxWidth: 160,
            unit: 'metric'
        }));

        let time = 0;
        const RATE_ANIMATION_FRAME = 50;

        function animate() {
            time = (time + ANIMATION_SPEED / RATE_ANIMATION_FRAME) % (interval[1] - interval[0]);
            if (deckAminLoopRunning) {
                animationId = window.requestAnimationFrame(animate);
            }
        }
        function startAnimation() {
            deckAminLoopRunning = true;
            animate();
        }

        function stopAnimation() {
            deckAminLoopRunning = false;
            window.cancelAnimationFrame(animationId);
        }

        let running = false;

        $(".palyBtn").on('click',function() {
            if (running) {
                running = false;
                stopAnimation();
            }else {
                running = true;
                startAnimation();
            }
        });

        setInterval(() => {
            deckgl.setProps({
                layers: [
                    new deck.TripsLayer({
                        id: 'trips-layer',
                        data: json,
                        getPath: d => d.path,
                        getTimestamps: d => d.timestamps,
                        getColor: d => getColor(d.vendor),
                        opacity: 0.5,
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

    //window.requestAnimationFrame(animationId);
}

var stationLyr;
var busesLyr;
var busesDataSource;
var clusterSource;
var drawSource = new ol.source.Vector();
var clipBusDataSource = new ol.source.Vector();
var draw;
var clusterLayer;
var clusterAnimateLayer;
var stationSource;
// Use this function on the draw geofence button click
function toggleDrawGeofenceCtrl() {
  draw.setActive(!draw.getActive());
  if (draw.getActive() == false) {
    drawSource.clear();
  }
  if ($('#draw_geofence').is(':visible')) {
    $('#activeDGF').hide();
    $('#deactiveDGF').show();
  } else {
    $('#activeDGF').show();
    $('#deactiveDGF').hide();
  }
}

function toggleClipBusDataCtrl() {
  drawClip.setActive(!drawClip.getActive());
  if (drawClip.getActive() == false) {
    clipBusDataSource.clear();
    addBusFeatures(busDataArr);
  }

}

// Style for the clusters
var styleCache = {};
function getStyle(feature, resolution) {
  var iconStyle = new ol.style.Style({
    image: new ol.style.Icon({
      src: 'assets/images/icons/mapPoint2.png', // Replace with the path to your bus icon image
      scale: 0.60, // Adjust the scale as needed
      //opacity: 0.23

      opacity: parseFloat(document.getElementById("slider-value").value)

    })
  })
  var size = feature.get('features').length;
  var style = styleCache[size];
  if (!style) {
    var color = size > 50 ? "0, 197, 115" : size > 10 ? "255, 103, 0" : "0, 151, 222";
    var radius = Math.max(8, Math.min(size * 0.75, 20));
    var dash = 2 * Math.PI * radius / 6;
    var dash = [0, dash, dash, dash, dash, dash, dash];
    style = styleCache[size] = new ol.style.Style({
      image: new ol.style.Circle({
        radius: radius,
        stroke: new ol.style.Stroke({
          color: "rgba(" + color + ",0.5)",
          width: 10,
          //lineDash: dash,
          lineCap: "round"
        }),
        fill: new ol.style.Fill({
          color: "rgba(" + color + ",1)"
        })
      }),
      text: new ol.style.Text({
        text: size.toString(),
        //font: 'bold 12px comic sans ms',
        //textBaseline: 'top',
        fill: new ol.style.Fill({
          color: '#fff'
        })
      })
    });
  }
  if (size<=1) {
    style = iconStyle;
  }
  return style;
}

var busesData = [];
var busesDataFilterReference = [];
function addBusFeatures(dataArr) {
  var featuresArr = [];
  busesDataFilterReference = [];
  busesData = dataArr;
  showBusCounter(busesData.length, "14120");
  var image_path = document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('src');
  for (let i = 0; i < dataArr.length; i++) {
    var obj = dataArr[i];
    var feature = new ol.Feature({
      geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates)),
      properties: obj
    });
    feature.setId(obj.imei);
    feature.setProperties(obj);
    var iconStyle = new ol.style.Style({
      image: new ol.style.Icon({
        src: image_path, // Replace with the path to your bus icon image
        scale: 0.60, // Adjust the scale as needed
        //opacity: 0.23

        opacity: parseFloat(document.getElementById("slider-value").value)

      })
    });

    // Set the icon style for the feature
    feature.setStyle(iconStyle);
    featuresArr.push(feature);
  }
  if (busesDataSource != undefined) {
    busesDataSource.clear();
  }

  busesDataSource = new ol.source
    .Vector({
      features: featuresArr
    });
  // Create a cluster source with a distance of 40 pixels
  clusterSource = new ol.source.Cluster({
    distance: 50,
    source: busesDataSource
  });

  clusterLayer = new ol.layer.Vector({
    source: clusterSource,
    style: function (feature) {
      var size = feature.get('features').length;
      var style = new ol.style.Style({
        image: new ol.style.Icon({
          src: image_path, // Replace with the path to your bus icon image
          scale: 0.60, // Adjust the scale as needed
          opacity: parseFloat(document.getElementById("slider-value").value)
        }),
        text: new ol.style.Text({
          text: size.toString(),
          fill: new ol.style.Fill({
            color: '#FFFFFF'
          })
        })
      });
      return style;
    }
  });
  clusterLayer.setZIndex(5);

  // Add the cluster layer to the map
  map.addLayer(clusterLayer);

  clusterAnimateLayer = new ol.layer.AnimatedCluster({
    name: 'Cluster',
    source: clusterSource,
    animationDuration: 700,
    // Cluster style
    style: getStyle
  });

  map.addLayer(clusterAnimateLayer);
  clusterAnimateLayer.setZIndex(4);
  var vizTypeId = document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('id');
  if (vizTypeId == null) {
    clusterAnimateLayer.setVisible(false);
  }
  else {
    clusterLayer.setVisible(false);
  }

  //Hide loading bus data message
  $('#loadingBusData').hide();
}
var blink = true;
function addAnimateFeatures(dataArr) {
  var featuresArr = [];
  busesDataFilterReference = [];
  busesData = dataArr;
  showBusCounter(busesData.length, "14120");
  // var image_path = styles.geoMarker;//document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('src');
  for (let i = 0; i < dataArr.length; i++) {
    var obj = dataArr[i];
    var feature = new ol.Feature({
      geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates)),
      properties: obj
    });
    feature.setId(obj.imei);
    feature.setProperties(obj);
    var iconStyle = styles.geoMarker;
    // new ol.style.Style({
    //   image: new ol.style.Icon({
    //     src: image_path, // Replace with the path to your bus icon image
    //     scale: 0.60, // Adjust the scale as needed
    //     //opacity: 0.23

    //     opacity: parseFloat(document.getElementById("slider-value").value)

    //   })
    // });

    // Set the icon style for the feature
    feature.setStyle(iconStyle);
    featuresArr.push(feature);
  }
  if (busesDataSource != undefined) {
    busesDataSource.clear();
  }

  busesDataSource = new ol.source
    .Vector({
      features: featuresArr
    });
  // Create a cluster source with a distance of 40 pixels
  clusterSource = new ol.source.Cluster({
    distance: 50,
    source: busesDataSource
  });

  clusterLayer = new ol.layer.Vector({
    source: clusterSource,
    style: function (feature) {
      var size = feature.get('features').length;
      var style = new ol.style.Style({
        image: styles.geoMarker,
        text: new ol.style.Text({
          text: size.toString(),
          fill: new ol.style.Fill({
            color: '#FFFFFF'
          })
        })
      });
      return style;
    }
  });
  clusterLayer.setZIndex(5);

  // Add the cluster layer to the map
  map.addLayer(clusterLayer);
  blink = !blink;

  var selectedStyle;
  if (blink)
    selectedStyle = styles.geoMarker;
  else
    selectedStyle = styles.icon;
  clusterAnimateLayer = new ol.layer.AnimatedCluster({
    name: 'Cluster',
    source: clusterSource,
    animationDuration: 700,
    // Cluster style
    style: selectedStyle
  });

  map.addLayer(clusterAnimateLayer);
  clusterAnimateLayer.setZIndex(4);
  var vizTypeId = document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('id');
  if (vizTypeId == null) {
    clusterAnimateLayer.setVisible(false);
  }
  else {
    clusterLayer.setVisible(false);
  }

  //Hide loading bus data message
  $('#loadingBusData').hide();
}

function addBusFeaturesReasign(dataArr) {
  var featuresArr = [];
  busesDataFilterReference = dataArr;
  showBusCounter(busesDataFilterReference.length, "14120");
  var image_path = document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('src');
  for (let i = 0; i < dataArr.length; i++) {
    var obj = dataArr[i];
    var feature = new ol.Feature({
      geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates)),
      properties: obj
    });
    feature.setId(obj.imei);
    feature.setProperties(obj);
    var iconStyle = new ol.style.Style({
      image: new ol.style.Icon({
        src: image_path, // Replace with the path to your bus icon image
        scale: 0.60, // Adjust the scale as needed
        //opacity: 0.23

        opacity: parseFloat(document.getElementById("slider-value").value)

      })
    });

    // Set the icon style for the feature
    feature.setStyle(iconStyle);
    featuresArr.push(feature);
  }
  if (busesDataSource != undefined) {
    busesDataSource.clear();
  }

  busesDataSource = new ol.source
    .Vector({
      features: featuresArr
    });
  // Create a cluster source with a distance of 40 pixels
  clusterSource = new ol.source.Cluster({
    distance: 50,
    source: busesDataSource
  });

  clusterLayer = new ol.layer.Vector({
    source: clusterSource,
    style: function (feature) {
      var size = feature.get('features').length;
      var style = new ol.style.Style({
        image: new ol.style.Icon({
          src: image_path, // Replace with the path to your bus icon image
          scale: 0.60, // Adjust the scale as needed
          opacity: parseFloat(document.getElementById("slider-value").value)
        }),
        text: new ol.style.Text({
          text: size.toString(),
          fill: new ol.style.Fill({
            color: '#FFFFFF'
          })
        })
      });
      return style;
    }
  });
  //clusterLayer.setZIndex(10);

  // Add the cluster layer to the map
  map.addLayer(clusterLayer);

  clusterAnimateLayer = new ol.layer.AnimatedCluster({
    name: 'Cluster',
    source: clusterSource,
    animationDuration: 700,
    // Cluster style
    style: getStyle
  });
  map.addLayer(clusterAnimateLayer);
  var vizTypeId = document.getElementsByClassName("pointSv active")[0].children[1].getAttribute('id');
  if (vizTypeId == null) {
    clusterAnimateLayer.setVisible(false);
  }
  else {
    clusterLayer.setVisible(false);
  }
initSelectInteraction();
}
var cartoBaseMap = "https://basemaps.cartocdn.com/gl/dark-matter-gl-style/style.json";

function switchBaseMaps() {
  var options = document.getElementById("bmap").options;
  var layer_type = parseInt(options[options.selectedIndex].value);
  if (layer_type == 1) {
    googleMap.setVisible(true);  //show layer
	cartoBaseMap = "https://basemaps.cartocdn.com/gl/voyager-gl-style/style.json";
    osmLayer.setVisible(false); //hide layer
    mapboxLayer.setVisible(false);
    googleMapHybrid.setVisible(false);
  }
  if (layer_type == 0) {
    googleMap.setVisible(false);  //hide layer
    mapboxLayer.setVisible(false);
    googleMapHybrid.setVisible(false);
    osmLayer.setVisible(true); //show layer
  }
  if (layer_type == 2) {
    googleMap.setVisible(false);  //hide layer
    osmLayer.setVisible(false);
    googleMapHybrid.setVisible(false);
    mapboxLayer.setVisible(true); //show layer
  }
  if (layer_type == 3) {
    googleMap.setVisible(false);  //hide layer
    osmLayer.setVisible(false);
    googleMapHybrid.setVisible(true);
    mapboxLayer.setVisible(false); //show layer
  }

}

var drawGeofenceCord;
function addDrawInteraction() {
  var geofenceStyle = new ol.style.Style({
    stroke: new ol.style.Stroke({
      color: 'green',
      width: 2,
      //lineDash: [5]
    }),
    fill: new ol.style.Fill({
      color: 'rgba(0, 0, 255, 0.1)',
    }),
  });

  var drawLayer = new ol.layer.Vector({
    source: drawSource,
    style: geofenceStyle,
  });

  // Add the vector layer to the map
  // drawLayer.setZIndex(12);
  map.addLayer(drawLayer);

  // Create a draw interaction for polygons
  draw = new ol.interaction.Draw({
    source: drawSource,
    type: 'Polygon',
    active: false
  });

  // Event listener for drawstart event
  draw.on('drawstart', function (event) {
    console.log('Polygon drawing started');
  });

  // Event listener for drawend event
  draw.on('drawend', function (event) {
    var polygon = event.feature.getGeometry().clone();
    var src = 'EPSG:3857';
    var dest = 'EPSG:4326';
    polygon.transform(src, dest)

    drawGeofenceCord = polygon.getCoordinates();
    console.log('Polygon drawing ended:', polygon.getCoordinates());
    // Do something with the drawn polygon geometry
    $('#newGeofenceDialogBox').show();
    $('#coordinate_arr').val(drawGeofenceCord);

  });

  // Add the draw interaction to the map
  map.addInteraction(draw);
  draw.setActive(false);
}

var drawClip;
var filterGeoData =[];
function addClipBusDataInteraction() {
  var geofenceStyle = new ol.style.Style({
    stroke: new ol.style.Stroke({
      color: 'orange',
      width: 2,
      //lineDash: [5]
    }),
    fill: new ol.style.Fill({
      color: 'rgba(255, 0, 255, 0.1)',
    }),
  });

  var clipLayer = new ol.layer.Vector({
    source: clipBusDataSource,
    style: geofenceStyle,
  });

  // Add the vector layer to the map
  // drawLayer.setZIndex(12);
  map.addLayer(clipLayer);

  // Create a draw interaction for polygons
  drawClip = new ol.interaction.Draw({
    source: clipBusDataSource,
    type: 'Polygon',
    active: false
  });

  // Event listener for drawstart event
  drawClip.on('drawstart', function (event) {
    console.log('Polygon drawing started');
    clipBusDataSource.clear();
  });

  // Event listener for drawend event
  drawClip.on('drawend', function (event) {
    var polygon = event.feature.getGeometry().clone();
    var src = 'EPSG:3857';
    var dest = 'EPSG:4326';
    polygon.transform(src, dest)
    filterGeoData =[];
    for (var idx in busDataArr){
      var cord = busDataArr[idx].location.coordinates;
      var intersect = polygon.intersectsCoordinate(cord);
      if (intersect){
        filterGeoData.push(busDataArr[idx]);
      }
    }
    addBusFeatures(filterGeoData);
    // Do something with the drawn polygon geometry
    // open buses filter popup
    showGeofenceFilterBusesPopup(busesData)
  });

  // Add the draw interaction to the map
  map.addInteraction(drawClip);
  drawClip.setActive(false);
}


var busDataArr;
var selectedGeofence;
var selectInteraction;
const styles = {
  'icon': new ol.style.Style({
    image: new ol.style.Circle({
      radius: 7,
      fill: new ol.style.Fill({color: "rgba(0,151,222,1.0)"}),
      stroke: new ol.style.Stroke({
        color: "rgba(0,151,222,0.5)",
        width: 7,
      }),
    }),
  }),
  'geoMarker': new ol.style.Style({
    image: new ol.style.Circle({
      radius: 7,
      fill: new ol.style.Fill({color: "rgba(0,151,222,1.0)"}),
      stroke: new ol.style.Stroke({
        color: "rgba(0,151,222,0.5)",
        width: 12,
      }),
    }),
  }),
};
function initSelectInteraction () {
  selectInteraction = new ol.interaction.Select({
    layers: [clusterLayer, stationLyr, clusterAnimateLayer]
  });

  // Add the Select interaction to the map
  map.addInteraction(selectInteraction);
  // Listen for feature selection event
  selectInteraction.on('select', function (event) {
    if (draw.getActive() == false) {
      var selectedFeatures = event.selected; // Array of selected features
      var deselectedFeatures = event.deselected; // Array of deselected features
      if (selectedFeatures.length > 0) {
        var data;
        var coordinates;
        var main_Id;

        if (selectedFeatures[0].getProperties().properties == undefined) {
          data = selectedFeatures[0].getProperties().features[0]['values_']['properties'];
        }
        else {
          data = selectedFeatures[0].getProperties().properties['attributes']
          selectedGeofence = selectedFeatures[0];
          coordinates = selectedFeatures[0].getProperties().properties['geometry']
          main_Id = selectedGeofence.getProperties().properties._id.$oid;
          document.getElementById("geofence_id").value = main_Id;
        }



        var obj_str = "";
        // for (var key in data)
        // {
        //   obj_str += key+" : "+data[key] +"\n"
        // }

        // alert(obj_str);
        if (data['_id'] != null && data['_id'] != undefined) {
          //document.getElementById('resultbusToolTipBox').innerText = obj_str;
          //$('#busToolTipBox').show();
          document.getElementById("imei_no").innerHTML = data['imei'];
          document.getElementById("avltm").innerHTML = new Date(data["avltm"]).toLocaleString();
          //document.getElementById("up_time").innerHTML = new Date(data["updatedon"]).toLocaleString();
          document.getElementById("cr_time").innerHTML = new Date(data["createdon"]).toLocaleString();
          document.getElementById("ang").innerHTML = data['ang'];
          document.getElementById("speed").innerHTML = data['spd'];
          document.getElementById("bus_no").innerHTML = data['device'].hasOwnProperty('busid') ? data['device']['busid'] : 'N/A';
          document.getElementById("operator_no").innerHTML = data['device'].hasOwnProperty('bus_oper_no') ? data['device']['bus_oper_no'] : 'N/A';
          document.getElementById("device_comp").innerHTML = data['device'].hasOwnProperty('device_comp') ? data['device']['device_comp'] : 'N/A';
          document.getElementById("engplate_no").innerHTML = data['device'].hasOwnProperty('engplate_no') ? data['device']['engplate_no'] : 'N/A';
          document.getElementById("plate_no").innerHTML = data['device'].hasOwnProperty('plate_no') ? data['device']['plate_no'] : 'N/A';
          // document.getElementById("trnspt_comp_ar").innerHTML = data['device'].hasOwnProperty('trnspt_comp_ar') ? data['device']['trnspt_comp_ar'] : 'N/A';
          document.getElementById("trnspt_comp").innerHTML = data['device'].hasOwnProperty('trnspt_comp_ar') ? data['device']['trnspt_comp_ar'] : 'N/A';
          document.getElementById("odata").innerHTML = data['odata'];

          $('#busDialogBox').show();

        } else {
          document.getElementById("arabicNameGeofence").innerHTML = data['ArabicName'];
          document.getElementById("englishNameGeofence").innerHTML = data['EnglishName'];
          document.getElementById("typeGeofence").innerHTML = data['Type']
          document.getElementById("districtGeofence").innerHTML = data['District'];
          document.getElementById("descriptionGeofence").innerHTML = data['Description'];
          document.getElementById("categoryGeofence").innerHTML = data['Category'];
          document.getElementById("siteGeofence").innerHTML = data['Site'];
          document.getElementById("stationTypeGeofence").innerHTML = data['Station_type'];
          document.getElementById("stationCodeGeofence").innerHTML = data['Station_Code'];
          document.getElementById("stationNameGeofence").innerHTML = data['Station_Name'];
          document.getElementById("codeIdGeofence").innerHTML = data['Code_ID'];
          document.getElementById("genericName").innerHTML = data['Name'];
          document.getElementById("geofenceType").innerHTML = data['Geofence_Type'];
          document.getElementById("seasonType").innerHTML = data['Season'];

          document.getElementById("arabic_name_edit").value = data['ArabicName'];
          document.getElementById("english_name_edit").value = data['EnglishName'];
          document.getElementById("type_edit").value = data['Type']
          document.getElementById("district_edit").value = data['District'];
          document.getElementById("description_edit").value = data['Description'];
          document.getElementById("category_edit").value = data['Category'];
          document.getElementById("site_edit").value = data['Site'];
          document.getElementById("station_type_edit").value = data['Station_type'];
          document.getElementById("station_code_edit").value = data['Station_Code'];
          document.getElementById("station_name_edit").value = data['Station_Name'];
          document.getElementById("code_id_edit").value = data['Code_ID'];
          document.getElementById("generic_name_edit").value = data['Name'];
          document.getElementById("geofence_type_edit").value = data['Geofence_Type'];
          document.getElementById("season_edit").value = data['Season'];
          // document.getElementById("gtype_edit").value = data['gtype'];
          //document.getElementById("coordinate_arr_edit").value = coordinates.coordinates;
          document.getElementById("geofenceUpdate_id").value = main_Id;
          //alert(main_Id);

          showGeofenceDialogBox();
        }
      }

    }
    // Perform actions with selected or deselected features
    // ...
  });
}
var busesDataFiltered = [];


function getAllBusesData() {
  //ajax call to api get all bus data
  // open loader @khuram,waqas
  $('#loadingBusData').show();

  // $.ajax({
  //   url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
  //   method: 'GET',
  //   dataType: 'json',
  //   success: function(response) {
  //     //close laoder
  //     busDataArr = response;
  //     addBusFeatures(busDataArr);
  //     selectInteraction = new ol.interaction.Select({
  //       layers: [clusterLayer,stationLyr,clusterAnimateLayer]
  //     });

  $.ajax({
    url: "./data/get_deviceDataLive.php",
    method: "POST",
    dataType: "json",
    data: {
      api_key: "becdf4fbbbf49dbc",
    },
    success: function (response) {
      //close laoder
      busesDataFiltered = busDataArr = response;

      addBusFeatures(busDataArr);
      initSelectInteraction();
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    }
  });


}

function addGeofenceData(data) {
  var stationArr = [];
  for (let i = 0; i < data.length; i++) {
    var obj = data[i];
    var polygon = new ol.geom.Polygon(obj.geometry.coordinates).transform('EPSG:4326', 'EPSG:3857');
    var category = obj.attributes.Category;
    var color_rgba = "rgba(0, 199, 254, 0.24)";
    if (category == "موقف") {
      color_rgba = 'rgba(171, 71, 194, 0.24)';
    }
    if (category == "محطة") {
      color_rgba = 'rgba(141, 104, 202,0.24)';
    }

    var styleFunction = function (feature) {

      var attributeValue = feature.getProperties().properties.attributes.Category; // Replace 'attributeName' with the actual attribute name

      // Define different styles based on attribute values
      if (attributeValue === 'موقف') {
        return new ol.style.Style({
          fill: new ol.style.Fill({
            color: 'rgba(141, 104, 202,0.24)'
          }),
          stroke: new ol.style.Stroke({
            color: 'rgba(141, 104, 202,0.24)',
            width: 2
          })
        });
      } else if (attributeValue === 'محطة') {
        return new ol.style.Style({
          fill: new ol.style.Fill({
            color: 'rgba(0, 199, 254, 0.24)'
          }),
          stroke: new ol.style.Stroke({
            color: 'rgba(0, 199, 254, 0.24)',
            width: 2
          })
        });
      } else {
        // Default style for other attribute values
        return new ol.style.Style({
          fill: new ol.style.Fill({
            color: 'rgba(209, 26, 219,0.24)'
          }),
          stroke: new ol.style.Stroke({
            color: 'rgba(209, 26, 219,0.24)',
            width: 2
          })
        });
      }
    };

    var feature = new ol.Feature({
      geometry: polygon,
      properties: obj
    });

    //feature.setStyle(stationStyle);
    //feature.setId(obj._id);
    stationArr.push(feature);
  }

  if (stationSource !== undefined) {
    stationSource.clear();
  }
  stationSource = new ol.source.Vector({
    features: stationArr
  });


  stationLyr = new ol.layer.Vector({
    source: stationSource,
    style: styleFunction,
  });
  stationLyr.setZIndex(2);
  map.addLayer(stationLyr);
  initSelectInteraction();
  map.getView().fit(stationSource.getExtent());
}

var geofenceDataArr = [];
var geofenceDataAvailable = false;
function getPreDataAllGeofence() {
  //show loader box  @khuram,waqas
  //$('#loadingGeofenceData').show();

  $.ajax({
    url: "./data/get_geofence.php",
    method: "POST",
    dataType: "json",
    data: {
      api_key: "becdf4fbbbf49dbc",
    },
    success: function (data) {
      // console.log(data);
      //hide loader dialog box @khuram,waqas
      geofenceDataArr = data;
      geofenceDataAvailable = true;

      $('#geofencesTable').show();
      $('#geofencesTableLoading').hide();


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

function getAllGeofence() {

  //show loader box  @khuram,waqas
  $('#loadingGeofenceData').show();

  if(geofenceDataAvailable){
    addGeofenceData(geofenceDataArr);
  }else{

  }

  //Hide Geofence Data message
  $('#loadingGeofenceData').hide();

}

function exportAsGeoJson() {
  var writer = new ol.format.GeoJSON();
  var cloneFeat = selectedGeofence.clone();
  cloneFeat.getGeometry().transform('EPSG:3857', 'EPSG:4326')
  var geoJsonStr = writer.writeFeature(cloneFeat);
  var dw_geojson = document.getElementById('downloadGeojsonFile');
  //dw_geojson.setAttribute("id","exportGeoJson");
  dw_geojson.setAttribute("href", geoJsonStr);
  dw_geojson.setAttribute("download", "export_geofence.geojson");
  dw_geojson.click();

}



function downloadJSON() {

  var writer = new ol.format.GeoJSON();
  var cloneFeat = selectedGeofence.clone();
  cloneFeat.getGeometry().transform('EPSG:3857', 'EPSG:4326')
  var geoJsonStr = writer.writeFeature(cloneFeat);

  //const jsonContent = JSON.stringify(jsonData);
  const blob = new Blob([geoJsonStr], { type: 'application/json' });
  const url = URL.createObjectURL(blob);

  const link = document.createElement('a');
  link.href = url;
  link.download = "geofnece_export_.eojson";
  document.body.appendChild(link);

  link.click();

  document.body.removeChild(link);
  URL.revokeObjectURL(url);
}

// Functions By Ans
// Show Deck GL Popup
function showDeckGLPopup(imei, sDate, eDate) {

    const deckPopup = $('.deck-popup');
    deckPopup.css({visibility: 'visible'}).animate({
        opacity: 1,
        width: "100%",
    }, 400, "linear", function () {

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
                console.log(response)
                animationDataArr = response;
                addAnimateFeatures(animationDataArr);
                $('#animBarLoading').hide();
                $('#animBar').show();
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

// Hide the GL map
const deckPopupClose = $('.deck-popup .close');
deckPopupClose.on('click', function () {
    hideDeckGLPopup()
})
function hideDeckGLPopup() {
    const deckPopup = $('.deck-popup');
    deckPopup.animate({
        opacity: 0,
        width: 0,
    });
}

hideDeckGLPopup()

var animationDataArr = [];
function getDataForAnim(imei, sDate, eDate, mapType) {

    $('#animBar').hide();
    $('#animBarLoading').show();

    if (mapType === "gl-map") {
        document.getElementById("animationRangeSlider").value = 0.00;
        showDeckGLPopup(imei, sDate, eDate, mapType);
        return;
    }

  console.log("imei no: " + imei + " Start Date: " + sDate + " End Date: " + eDate);


  $.ajax({
    url: "./data/get_animationData.php",
    method: "POST",
    dataType: "json",
    data: {
      api_key: "becdf4fbbbf49dbc",
      imei_no: imei,
      start_date: sDate,
      end_date: eDate
    },
    success: function (response) {
        console.log(response);
      //close laoder
      animationDataArr = response;
      addAnimateFeatures(animationDataArr);
      $('#animBarLoading').hide();
      $('#animBar').show();
      //console.log('animationDataArr:', animationDataArr);
      //document.getElementsByClassName("animBarFill")[0].style.width= 0+"%";
      document.getElementById("animationRangeSlider").value = 0.00;
      // runFor100Seconds();
    },
    error: function (xhr, status, error) {
      console.log('Error:', error);
    }
  });


}



/*document.getElementById("bmap").onchange = function(){
         switchBaseMaps();
};

setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes


//$(document).ready(function() {

  $("#applySettingBtn").click(function(){
       addBusFeatures(busDataArr);
   });



//});

*/


function resetTheFilterOnClose(id, filterType){
  addBusFeatures(busesData);
  //onSelectAllCheckBox(id, filterType);
  //const myDiv = document.getElementById(id);
  document.getElementById(id).checked = true;

  if (filterType == 1) {
    resetfilterCheckBoxSettings("mainListRowsTrackingCompany");
  } else if (filterType == 2) {
    resetfilterCheckBoxSettings("mainListRowsTransportationCompanies");
  } else if (filterType == 3) {
    resetfilterCheckBoxSettings("mainListRowsTrackingDevices");
  } else if (filterType == 4) {
    // resetfilterCheckBoxSettings("mainListRowsTrackingDevices");
  }


}

function singalCheckbox(cb, oid, filterType) {

  var value = document.getElementById(oid.id).value;
  //alert("lang: " + cb.getAttribute('data-language'));
  var language = cb.getAttribute('data-language');


  //alert(cb.checked);
  if (!cb.checked) {
    if(filterType == 1){ document.getElementById('trackingComSeAl').checked = false; }
    if(filterType == 2){ document.getElementById('transportationComSeA1').checked = false; }
    if(filterType == 3){ document.getElementById('trackingDevicesSeAl').checked = false; }
  }

  if (cb.checked) {
    //Add
    // var dataFilter = busesData.filter(x =>
    //   filterType == 1 ? String(x.device.avl_comp_ar) == value ||
    //     String(x.device.avl_comp) == value :
    //     filterType == 2 ? String(x.device.trnspt_comp_ar) == value ||
    //       String(x.device.trnspt_comp) == value :
    //       filterType == 3 ? String(x.device.device_comp) == value :
    //         filterType == 4 ? String(x.device.imei) == value : false
    // );

    var dataFilter = busesData.filter(function(data) {
      if(filterType == 1){
        return data.device.avl_comp_ar == value  || data.device.avl_comp == value;
      }else if (filterType == 2) {
        return data.device.trnspt_comp_ar == value  || data.device.trnspt_comp == value;
      }
      else if (filterType == 3) {
        return data.device.device_comp == value;
      }
      else{
        return data.device.imei == value;
      }
    });
    //alert("add dataFilter: " + dataFilter.length + " busesData.length: " + busesData.length + " value: " + value);

    if(busesDataFiltered.length <= 0){
      busesDataFiltered = dataFilter;
    }else{
      var tem_arr = busesDataFiltered.concat(dataFilter);
      busesDataFiltered = tem_arr;
    }
    addBusFeaturesReasign(busesDataFiltered);
    //document.getElementById(oid.id).checked = true;// .setAttribute("checked", true);

  } else {
    //remove

    // var dataFilter = busesData.filter(x =>
    //   filterType == 1 ? String(x.device.avl_comp_ar) != value ||
    //     String(x.device.avl_comp) != value :
    //     filterType == 2 ? String(x.device.trnspt_comp_ar) != value ||
    //       String(x.device.trnspt_comp) != value :
    //       filterType == 3 ? String(x.device.device_comp) != value :
    //         filterType == 4 ? String(x.device.imei) != value : false
    // );
    //console.log("busesDataFiltered "+busesDataFiltered.length);


    busesDataFiltered = busesDataFiltered.filter(function(data) {
      if(filterType == 1){
        if(language == 'ar'){
          return data.device.avl_comp_ar != value
        }else{
          return data.device.avl_comp != value
        }
      }else if(filterType == 2){
        if(language == 'ar'){
          return data.device.trnspt_comp_ar != value
        }else{
          return data.device.trnspt_comp != value
        }
      }else if(filterType == 3){
        return data.device.device_comp != value
      }else{
        //filterType == 4
        return data.device.imei != value
      }
    });

    addBusFeaturesReasign(busesDataFiltered);



      //document.getElementById(oid.id).checked = false;// .removeAttribute("checked");


  }
}

function onSelectAllCheckBox(id, filterType) {
  const myDiv = document.getElementById(id);

  if (myDiv.checked) {
    addBusFeaturesReasign(busesData);
    busesDataFiltered = busesData;
    if (filterType == 1) {
      resetfilterCheckBoxSettings("mainListRowsTrackingCompany");
    } else if (filterType == 2) {
      resetfilterCheckBoxSettings("mainListRowsTransportationCompanies");
    } else if (filterType == 3) {
      resetfilterCheckBoxSettings("mainListRowsTrackingDevices");
    } else if (filterType == 4) {
      // resetfilterCheckBoxSettings("mainListRowsTrackingDevices");
    }
  } else {
    addBusFeaturesReasign([]);
    busesDataFiltered = [];
    if (filterType == 1) {
      uncheckfilterCheckBoxSettings("mainListRowsTrackingCompany");
    } else if (filterType == 2) {
      uncheckfilterCheckBoxSettings("mainListRowsTransportationCompanies");
    } else if (filterType == 3) {
      uncheckfilterCheckBoxSettings("mainListRowsTrackingDevices");
    } else if (filterType == 4) {
      // uncheckfilterCheckBoxSettings("mainListRowsTrackingDevices",value);
    }
  }
}


function resetfilterCheckBoxSettings(id) {
  const myDiv = document.getElementById(id);
  const inputElements = myDiv.querySelectorAll("input");
  for (i = 0; i < inputElements.length; ++i) {
    each = inputElements[i];
    document.getElementById(each.id).checked = true;// .setAttribute("checked", true);
  }
}

function uncheckfilterCheckBoxSettings(id) {
  const myDiv = document.getElementById(id);
  const inputElements = myDiv.querySelectorAll("input");
  for (i = 0; i < inputElements.length; ++i) {
    each = inputElements[i];
    document.getElementById(each.id).checked = false;// .removeAttribute("checked");
  }
}

function trackingDevicesSearchEvent(event, filterType) {
  var value = document.getElementById(event).value;
  if (value && value != '') {
    if (busesData && busesData.length) {
      value = value.toLowerCase()
      var dataFilter = busesData.filter(x =>
        filterType == 1 ? String(x.device.avl_comp_ar).toLowerCase().includes(value) ||
          String(x.device.avl_comp).toLowerCase().includes(value) :
          filterType == 2 ? String(x.device.trnspt_comp_ar).toLowerCase().includes(value) ||
            String(x.device.trnspt_comp).toLowerCase().includes(value) :
            filterType == 3 ? String(x.device.device_comp).toLowerCase().includes(value) :
              filterType == 4 ? String(x.imei).toLowerCase().includes(value) : false
      );
      if (dataFilter && dataFilter.length) {
        addBusFeaturesReasign(dataFilter);
        if (filterType == 1) {
          filterCheckBoxSettings("mainListRowsTrackingCompany", value);
        } else if (filterType == 2) {
          filterCheckBoxSettings("mainListRowsTransportationCompanies", value);
        } else if (filterType == 3) {
          filterCheckBoxSettings("mainListRowsTrackingDevices", value);
        } else if (filterType == 4) {
          applyIemiFilter('iemiSearchList',value);
        }

      }
    }
  } else {
    addBusFeaturesReasign(busesData);
    if (filterType == 1) {
      resetfilterCheckBoxSettings("mainListRowsTrackingCompany");
    } else if (filterType == 2) {
      resetfilterCheckBoxSettings("mainListRowsTransportationCompanies");
    } else if (filterType == 3) {
      resetfilterCheckBoxSettings("mainListRowsTrackingDevices");
    } else if (filterType == 4) {
      resetIemiFilter('iemiSearchList');
    }
  }
}

function applyIemiFilter(id,value){
  const myDiv = document.getElementById(id);
  const inputElements = myDiv.querySelectorAll("tr");
  for (i = 0; i < inputElements.length; ++i) {
    each = inputElements[i];
    if (String(each.id).includes(value)) {
      var el = document.getElementById(each.id);
      if(el){
        el.classList.remove("d-none");
      }
    } else {
      var el = document.getElementById(each.id);
      if(el){
        el.classList.add("d-none");
      }
    }
  }
}

function resetIemiFilter(id){
  const myDiv = document.getElementById(id);
  const inputElements = myDiv.querySelectorAll("tr");
  for (i = 0; i < inputElements.length; ++i) {
    each = inputElements[i];
      var el = document.getElementById(each.id);
      if(el){
        el.classList.remove("d-none");
      }
  }
}

function filterCheckBoxSettings(id, value) {
  const myDiv = document.getElementById(id);
  const inputElements = myDiv.querySelectorAll("input");
  for (i = 0; i < inputElements.length; ++i) {
    each = inputElements[i];
    if (String(each.value).toLowerCase().includes(value)) {
      document.getElementById(each.id).checked = true;// .setAttribute("checked", true);
      document.getElementById(each.id).classList.add("d-none");
    } else {
      document.getElementById(each.id).checked = false;// .removeAttribute("checked");
      document.getElementById(each.id).classList.add("d-none");
    }
  }
}

function unselectAllFeatures() {
  //call this function to unselect features
  selectInteraction.getFeatures().clear();
}

function geofenceSearchEvent(event, geofencesTable) {
  var value = document.getElementById(event).value;
  console.log("value: " + value);
  if (value != null && value != '') {
    const myDiv = document.getElementById(geofencesTable);
    const inputElements = myDiv.querySelectorAll("tr");

    //console.log("inputElements length: " + inputElements.length);
    //console.log("inputElements: ", inputElements);

    for (i = 0; i < inputElements.length; ++i) {
      each = inputElements[i];

      if (each.id && each.id != '') {
        const myDiv = document.getElementById(each.id);
        const trInputs = myDiv.querySelectorAll("input");

        if (trInputs && trInputs.length) {
          for (j = 0; j < trInputs.length; ++j) {
            var element = trInputs[j].dataset;
            //console.log("element: ", element);
            if (String(element.geofencename).includes(value) ||
              String(element.arabicname).includes(value) ||
              String(element.englishname).includes(value) ||
              String(element.codeid).includes(value) ||
              String(element.season).includes(value)) {
              var el = document.getElementById(each.id);
              if (el) {
                el.classList.remove("d-none");
              }
            } else {
              var el = document.getElementById(each.id);
              if (el) {
                el.classList.add("d-none");
              }
            }
          }
        }
      }

    }
    filterGeofenceData(value);
  } else {
    const myDiv = document.getElementById(geofencesTable);
    const inputElements = myDiv.querySelectorAll("tr");
    for (i = 0; i < inputElements.length; ++i) {
      each = inputElements[i];
      if (each.id && each.id != '') {
        var el = document.getElementById(each.id);
        if (el) {
          el.classList.remove("d-none");
        }
      }
    }
    addGeofenceData(geofenceDataArr);
  }
}


var imeiBusesFiltered = [];
function busImeiCheckBox (cb){
  const imeiNo = cb.getAttribute('data-imei');
  if (cb.checked) {
    //console.log(imeiBusesFiltered);
    var dataFilter1 = busesData.filter(function(data) {
      return data.imei == imeiNo;
    });
    //console.log(dataFilter1);

    if(imeiBusesFiltered.length <= 0){
      imeiBusesFiltered = dataFilter1;
    }else{
      var tem_arr = imeiBusesFiltered.concat(dataFilter1);
      imeiBusesFiltered = tem_arr;
    }
    addBusFeaturesReasign(imeiBusesFiltered);

  }else{

    var dataFilter2 = imeiBusesFiltered.filter(function(data) {
      return data.imei != imeiNo;
    });

    console.log(dataFilter2.length);

    if(dataFilter2.length > 0){

      imeiBusesFiltered = dataFilter2;
      addBusFeaturesReasign(imeiBusesFiltered);

    }else{
      imeiBusesFiltered = [];
      addBusFeaturesReasign(busesData);
    }


    //console.log(dataFilter);

  }
}


function zoomTo(amount) {
  const view = map.getView();
  const zoom = view.getZoom();
  view.animate({ zoom: zoom + amount })
}

function resetExtent() {
  map.getView().fit(busesDataSource.getExtent());

}

var filterBusDataArr = []
function filterBusesData(filter_type, value) {
  for (var idx in busDataArr) {
    if (filter_type == 1) {
      if (busDataArr[idx].device.trnspt_comp_ar == value) {
        filterBusDataArr.push(busDataArr[idx]);
      }
    }
  }
}

var filterGeofenceArr = [];
function filterGeofenceData(geofenceName) {
  filterGeofenceArr = [];
  for (var idx in geofenceDataArr) {
      if (geofenceDataArr[idx].attributes.EnglishName.includes(geofenceName) ||
          geofenceDataArr[idx].attributes.ArabicName.includes(geofenceName) ||
          geofenceDataArr[idx].attributes.Description.includes(geofenceName) ||
          geofenceDataArr[idx].attributes.Code_ID.includes(geofenceName)

        ) {
        filterGeofenceArr.push(geofenceDataArr[idx]);
    }
  }
  addGeofenceData(filterGeofenceArr);
}

var filterGeofenceLayerArr = [];
var firstTime = true;
function filterGeofenceLayerData(filter_type, geofenceName) {
  if (firstTime) {
    getAllGeofence();
    firstTime = false;
  }
  filterGeofenceLayerArr = [];
  for (var idx in geofenceDataArr) {
    if (filter_type == 1) {
      if (geofenceDataArr[idx].attributes.Season.includes('المنافذ')) {
        filterGeofenceLayerArr.push(geofenceDataArr[idx]);
      }
    }
    if (filter_type == 2) {

      if (geofenceDataArr[idx].attributes.Season.includes('رمضان')) {
        filterGeofenceLayerArr.push(geofenceDataArr[idx]);
      }
    }
    if (filter_type == 3) {
      if (geofenceDataArr[idx].attributes.Season.includes('المشاعر المقدسة')) {
        filterGeofenceLayerArr.push(geofenceDataArr[idx]);
      }

    }
    if (filter_type == 4) {
      if (!geofenceDataArr[idx].attributes.Season.includes('المنافذ')
      && !geofenceDataArr[idx].attributes.Season.includes('رمضان')
      && !geofenceDataArr[idx].attributes.Season.includes('المشاعر المقدسة')) {
        filterGeofenceLayerArr.push(geofenceDataArr[idx]);
      }

    }
  }
  addGeofenceData(filterGeofenceLayerArr);
}

var idGeofenceFiltered = [];
function geofenceCheckBox (cb){
  const idGeofence = cb.getAttribute('data-id');

  if (cb.checked) {
    var geoDataFilter1 = geofenceDataArr.filter(function(data) {
     return data._id.$oid == idGeofence;
    });



    if(idGeofenceFiltered.length <= 0){
      idGeofenceFiltered = geoDataFilter1;
    }else{
      var tem_arr = idGeofenceFiltered.concat(geoDataFilter1);
      idGeofenceFiltered = tem_arr;
    }

    //console.log("Checked: " + idGeofence);
    //console.log("idGeofenceFiltered length: " + idGeofenceFiltered.length);

    addGeofenceData(idGeofenceFiltered);

  }else{

    var geoDataFilter2 = idGeofenceFiltered.filter(function(data) {
      return data._id.$oid != idGeofence;
    });

    //console.log("Unchecked: " + idGeofence);
    //console.log("geoDataFilter2 length: " + geoDataFilter2.length);

    if(geoDataFilter2.length > 0){

      idGeofenceFiltered = geoDataFilter2;
      addGeofenceData(idGeofenceFiltered);

    }else{
      idGeofenceFiltered = [];
      stationLyr.setVisible(false);
    }
  }
}


//filterGeofenceData(1,'Parking Allith Road - the coast'); call to search geofence on english name
//filterGeofenceData(2,'موقف السيارات ربوة منى (صدقي)');  call to search geofence on arabic name
$(document).ready(function () {
  initMap();
  addDrawInteraction();
  addClipBusDataInteraction();
  // getAllGeofence();

  switchBaseMaps();
  getAllBusesData();
  //loadFiltersDataDevicesCompany();

  getPreDataAllGeofence()

  $("#exportGeofence").click(function () {
    downloadJSON();
  });
  document.getElementById("bmap").onchange = function () { //add switch basemap listener
    switchBaseMaps();
  };


  // setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes

  document.getElementById("draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl); //draw gerofence control listener
  document.getElementById("de_draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl); //draw gerofence control listener
  document.getElementById("activeGeoAna").addEventListener("click", toggleClipBusDataCtrl); //draw gerofence control listener
  document.getElementById("deactive_bffdg").addEventListener("click", toggleClipBusDataCtrl); //draw gerofence control listener
  // document.getElementById("palyBtn").addEventListener("click", runFor100Seconds);

  $("#applySettingBtn").click(function () {
    addBusFeatures(busDataArr);
  });




});

function closeFilterOnClose(id, imageid) {
  document.getElementById(id).style.display = "none";
  var element = document.getElementById(imageid);
  element.classList.remove("active");
}

function showGeofenceFilterBusesPopup(busesData){
  $('#busesFilterFromDrawGeofence').show();
  if(busesData && busesData.length){
    var data = "";
    busesData.forEach((element,i) => {
      data = data + `<tr id='busesFilterFromDrawGeofence_tbody_id_tr_${i}'>
                          <td>${element.device.avl_comp_ar}</td>
                          <td>${element.device.bus_oper_no}</td>
                          <td>${element.device.device_comp}</td>
                          <td>${element.device.trnspt_comp_ar}</td>
                          <td>${element.imei}</td>
      </tr>`;
    });
    document.getElementById("busesFilterFromDrawGeofence_tbody_id").innerHTML = data;
  }else{
    document.getElementById("busesFilterFromDrawGeofence_tbody_id").innerHTML = "";
  }
  tableSorterDataUpdate();
}

// Function to execute after 100 seconds
function after100Seconds() {
  //console.log("100 seconds have passed!");
  // sliderValue = 0;
  // currentIndex = 0;
  //document.getElementsByClassName("animBarFill")[0].style.width= sliderValue+"%";
  document.getElementById("animationRangeSlider").value = sliderValue;
  runFor100Seconds();
  // Add your desired code here
  // currentIndex =0;
}

// Delay function
function delay(milliseconds) {
  return new Promise(resolve => setTimeout(resolve, milliseconds));
}
var play= true;
var currentIndex =0;
var sliderValue=0.0;
var reset = false;
// var stop = false;
// Run for 100 seconds
async function runFor100Seconds() {
  // play =!play;
  // stop = false;
  // play = true;
  // currentIndex = val;
  if (animationDataArr != undefined)
    currentIndex = (animationDataArr.length * sliderValue) / 100;
  else
    currentIndex = 0;

  if (currentIndex>=animationDataArr.length)
    currentIndex = 0;

  for (let i = currentIndex; i < animationDataArr.length; i++) {
    //console.log("Time elapsed:", (i + 1), "second(s)");
    if (animationDataArr == undefined)
        break;
    if (!play) {
      sliderValue = (i/animationDataArr.length)*100;
      break;
    }
    if (reset) {
      reset = false;
      break;
    }
    var percentBar = i+1;
    currentIndex =i;
    sliderValue = (i/animationDataArr.length)*100;
    //console.log("animation slider value:  " + sliderValue+"%");
    //change this line for animation slider
    //document.getElementsByClassName("animBarFill")[0].style.width= sliderValue+"%";

    document.getElementById("animationRangeSlider").value = sliderValue;

    sliceBusDataArr = animationDataArr.slice(i,i+1);
    addAnimateFeatures(sliceBusDataArr);
    var imeiText = document.getElementById('totalTime');
    var timeText = document.getElementById('consumeTime');
    imeiText.textContent = sliceBusDataArr[0].imei+':IMEI';
    timeText.textContent = new Date(sliceBusDataArr[0].avltm).toLocaleDateString("en-GB") + ' ' +new Date(sliceBusDataArr[0].avltm).toLocaleTimeString("default");
    var animationDataArrCoords = sliceBusDataArr[0].location.coordinates;
	//if (deckgl!=undefined) {
     //    panToLocation(animationDataArrCoords[0][0], animationDataArrCoords[0][1]); // latitude, longitude
		 //timeText.textContent = new Date(animationDataTimesArr[i]).toLocaleDateString("en-GB") + ' ' +new Date(animationDataTimesArr[i]).toLocaleTimeString("default");
	//	}

	var lt = parseInt(i);
    if (lt == 0)
      map.getView().fit(busesDataSource.getExtent(), {size:map.getSize(), maxZoom:8});
    else if (lt % 100 == 0)
      map.getView().fit(busesDataSource.getExtent(), {size:map.getSize(), maxZoom:map.getView().getZoom()});
    await delay(speed); // Delay for 1 second (1000 milliseconds)
  }
  if (currentIndex+1 == animationDataArr.length) {
    currentIndex = 0;
    sliderValue = 0;
  }
  if (play)
    after100Seconds();
  // after100Seconds(); // Call the function after 100 seconds
}


// animation slider function
function animationSliderVal(rangeVal) {
  // stop = true;
  // play = false;
  sliderValue = rangeVal;
  //document.getElementsByClassName("animBarFill")[0].style.width= sliderValue+"%";
  document.getElementById("animationRangeSlider").value = sliderValue;
  console.log("animation slider value while sliding:  " + sliderValue);
      $('#palyBtn').removeClass("active");
      $('#playbtnIcon').show();
      $('#pausebtnIcon').hide();
      $('#pausebtnIcon').hide();
      animationState(false);
  // runFor100Seconds(100-rangeVal);
}

// animation state function
function animationState(val) {
  play = val;
  if (play)
    runFor100Seconds();
}

function panToLocation(longitude, latitude) {
	var currentZoom = deckgl._getViewState().zoom;
    deckgl.setProps({
      initialViewState: {
        longitude: longitude,
        latitude: latitude,
        zoom: currentZoom
      }
    });
  }
