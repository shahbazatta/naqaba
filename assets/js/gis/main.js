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

var googleMap = new ol.layer.Tile({
  source:new ol.source.XYZ({
        url: 'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}'
      })
});

map.addLayer(googleMap);


var busesLyr;
var busesDataSource;
var clusterSource;
var drawSource = new ol.source.Vector();
var draw;

// Use this function on the draw geofence button click
function toggleDrawGeofenceCtrl() {
  draw.setActive(!draw.getActive());
}

function switchBaseMaps() {
	var options = document.getElementById("bmap").options;
	var layer_type = parseInt(options[options.selectedIndex].value);
	if (layer_type==1)
	{
		googleMap.setZIndex(2);  //show layer
		osmLayer.setZIndex(-1); //hide layer	
	}
	if (layer_type==2)
	{
		googleMap.setZIndex(-1);  //hide layer
		osmLayer.setZIndex(2); //show layer	
	}
	
}

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
    var polygon = event.feature.getGeometry();
    console.log('Polygon drawing ended:', polygon.getCoordinates());
    // Do something with the drawn polygon geometry
    $('#geofenceDialogBox').show();
  });

  // Add the draw interaction to the map
  map.addInteraction(draw);
  draw.setActive(false);
}

function getAllBusesData() {
  //ajax call to api get all bus data
  $.ajax({
    url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
    method: 'GET',
    dataType: 'json',
    success: function(response) {
      var dataArr = response;
      var featuresArr = [];
      for (let i = 0; i < dataArr.length; i++) {
        var obj = dataArr[i];
        var feature = new ol.Feature({
          geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates)),
          properties: obj
        });
        feature.setId(obj.imei);
        var iconStyle = new ol.style.Style({
          image: new ol.style.Icon({
            src: 'assets/images/pointerIcon3.png', // Replace with the path to your bus icon image
            scale: 0.20 // Adjust the scale as needed
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

var clusterLayer = new ol.layer.Vector({
  source: clusterSource,
  style: function(feature) {
    var size = feature.get('features').length;
    var style = new ol.style.Style({
      image: new ol.style.Icon({
        src: 'assets/images/pointerIcon3.png', // Replace with the path to your bus icon image
        scale: 0.20 // Adjust the scale as needed
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

// Add the cluster layer to the map
map.addLayer(clusterLayer);

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
				var polygon = new ol.geom.Polygon(obj.geometry.coordinates);

				var feature = new ol.Feature({
				  geometry:polygon,
				  properties: obj
				});
				feature.setId(obj._id);
				stationArr.push(feature);
			  }
			  var stationSource = new ol.source.Vector(
			  {
				  		features: featuresArr
			  }
			  );
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
				var stationLyr = new ol.layer.Vector({
					source: stationSource,
					style: stationStyle,
				  });
			  
			  map.addLayer(stationLyr)
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

addDrawInteraction();
getAllBusesData();
getAllGeofence();
document.getElementById("draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl);

 document.getElementById("bmap").onchange = function(){
					switchBaseMaps();
 };
 



setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes