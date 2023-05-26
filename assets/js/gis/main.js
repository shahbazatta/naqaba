// Create a new map instance
var map = new ol.Map({
  target: 'mapContainer', // The ID of the div element where the map should be rendered
  view: new ol.View({
    center: ol.proj.fromLonLat([45.0792, 23.8859]), // The initial center coordinates of the map, transformed to EPSG:3857
    zoom: 7 // The initial zoom level
  })
});

// Add a basemap layer
var osmLayer = new ol.layer.Tile({
  source: new ol.source.OSM() // OpenStreetMap as the basemap source
});

// Add the osm layer to the map
map.addLayer(osmLayer);
var mapboxLayer =  new ol.layer.Tile({
      source: new ol.source.XYZ({
		          url: 'https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2hhaGJhemF0dGEiLCJhIjoiTGFyTEVvSSJ9.5b1ITwm0plgm7rNy-umfWQ' //this works
	  })
    })
map.addLayer(mapboxLayer);
	
var googleMap = new ol.layer.Tile({
  source:new ol.source.XYZ({
        url: 'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}'
      })
});

map.addLayer(googleMap);

var stationLyr;
var busesLyr;
var busesDataSource;
var clusterSource;
var drawSource = new ol.source.Vector();
var draw;
var clusterLayer;
// Use this function on the draw geofence button click
function toggleDrawGeofenceCtrl() {
  draw.setActive(!draw.getActive());
}
function addBusFeatures(dataArr) {
	var featuresArr = [];
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
            src: 'assets/images/pointerIcon3.png', // Replace with the path to your bus icon image
            scale: 0.20, // Adjust the scale as needed
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
var image_path = document.getElementsByClassName("moreIcons active")[0].children[0].getAttribute('src');
clusterLayer = new ol.layer.Vector({
  source: clusterSource,
  style: function(feature) {
    var size = feature.get('features').length;
    var style = new ol.style.Style({
      image: new ol.style.Icon({
        src: image_path, // Replace with the path to your bus icon image
        scale: 0.20, // Adjust the scale as needed
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
}
function switchBaseMaps() {
	var options = document.getElementById("bmap").options;
	var layer_type = parseInt(options[options.selectedIndex].value);
	if (layer_type==1)
	{
		googleMap.setVisible(true);  //show layer
		osmLayer.setVisible(false); //hide layer	
		mapboxLayer.setVisible(false);
	}
	if (layer_type==0)
	{
		googleMap.setVisible(false);  //hide layer
		mapboxLayer.setVisible(false);
		osmLayer.setVisible(true); //show layer	
	}
	if (layer_type==2)
	{
		googleMap.setVisible(false);  //hide layer
		osmLayer.setVisible(false);
		mapboxLayer.setVisible(true); //show layer	
	}
	
}

var drawGeofenceCord;
function addDrawInteraction() {
  var geofenceStyle = new ol.style.Style({
					stroke: new ol.style.Stroke({
					  color: 'green',
					  width: 2,
					  lineDash: [5]
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
  drawLayer.setZIndex(12);
  map.addLayer(drawLayer);

  // Create a draw interaction for polygons
  draw = new ol.interaction.Draw({
    source: drawSource,
    type: 'Polygon',
    active: false
  });

  // Event listener for drawstart event
  draw.on('drawstart', function(event) {
    console.log('Polygon drawing started');
  });

  // Event listener for drawend event
  draw.on('drawend', function(event) {
    var polygon = event.feature.getGeometry().clone();
	var src = 'EPSG:3857';
	var dest = 'EPSG:4326';
	polygon.transform(src, dest)

	drawGeofenceCord = polygon.getCoordinates();
    console.log('Polygon drawing ended:', polygon.getCoordinates());
    // Do something with the drawn polygon geometry
    $('#geofenceDialogBox').show();
    $('#coordinate_arr').val(drawGeofenceCord);

  });

  // Add the draw interaction to the map
  map.addInteraction(draw);
  draw.setActive(false);
}

var busDataArr ;
function getAllBusesData() {
  //ajax call to api get all bus data
  $.ajax({
    url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
    method: 'GET',
    dataType: 'json',
    success: function(response) {
      busDataArr = response;
      addBusFeatures(busDataArr);
},
error: function(xhr, status, error) {
  console.log('Error:', error);
}
});


}

function getAllGeofence()
{
	
    $.ajax({
         url: "./data/get_geofence.php",
         method: "POST",
         dataType: "json",
        data: {
          api_key: "becdf4fbbbf49dbc",
         },
         success: function(data){
			 //console.log(data);
			 var stationArr = [];
			  for (let i = 0; i < data.length; i++) {
				var obj = data[i];
				var polygon = new ol.geom.Polygon(obj.geometry.coordinates).transform('EPSG:4326','EPSG:3857');

				var feature = new ol.Feature({
				  geometry:polygon,
				  properties: obj
				});
				//feature.setId(obj._id);
				stationArr.push(feature);
			  }
			  
			  
			  var stationSource = new ol.source.Vector({
											features: stationArr
											});
			  
				var stationStyle = new ol.style.Style({
					stroke: new ol.style.Stroke({
					  color: 'green',
					  width: 2,
					  lineDash: [5]
					}),
					fill: new ol.style.Fill({
					  color: 'rgba(0, 0, 255, 0.1)',
					}),
				  });
				stationLyr = new ol.layer.Vector({
					source: stationSource,
					style: stationStyle,
				  });
			  stationLyr.setZIndex(11);
			  map.addLayer(stationLyr);
			  map.getView().fit(stationSource.getExtent());

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
         },
     });
}

function initSelectInteraction()
{
	var selectInteraction = new ol.interaction.Select({
		  layers: [clusterLayer,stationLyr]
		});

	// Add the Select interaction to the map
	map.addInteraction(selectInteraction);
		// Listen for feature selection event
	selectInteraction.on('select', function(event) {
	 if (draw.getActive() ==false)
	 {
		  var selectedFeatures = event.selected; // Array of selected features
		  var deselectedFeatures = event.deselected; // Array of deselected features
		  if (selectedFeatures.length>=0){
			  var data;
		if (selectedFeatures[0].getProperties().properties==undefined){
		  data  = selectedFeatures[0].getProperties().features[0]['values_']['properties'];
		}
		else {
			data = selectedFeatures[0].getProperties().properties['attributes']
		}
		  var obj_str ="";
		  for (var key in data)
		  {
			  obj_str += key+" : "+data[key] +"\n"
		  }
		  
		  alert(obj_str);
		  }

	 }
  // Perform actions with selected or deselected features
  // ...
});
}

addDrawInteraction();
initSelectInteraction();
getAllGeofence();

getAllBusesData();

document.getElementById("draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl);

 document.getElementById("bmap").onchange = function(){
					switchBaseMaps();
 };
 
setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes

//$(document).ready(function() {
   
   $("#applySettingBtn").click(function(){
        addBusFeatures(busDataArr);
    }); 
//});

