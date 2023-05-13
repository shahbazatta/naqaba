// Create a new map instance
var map = new ol.Map({
  target: 'mapContainer', // The ID of the div element where the map should be rendered
  view: new ol.View({
    center: ol.proj.fromLonLat([45.0792, 23.8859]), // The initial center coordinates of the map, transformed to EPSG:3857
    zoom: 7 // The initial zoom level
  })
});

// Add a basemap layer
var basemapLayer = new ol.layer.Tile({
  source: new ol.source.OSM() // OpenStreetMap as the basemap source
});

// Add the basemap layer to the map
map.addLayer(basemapLayer);
var busesLyr;
var busesDataSource;
var drawSource = new ol.source.Vector();
var draw;

//use this funtion on draw geofence button click
function toggleDrawGeofenceCtrl()
	{
		draw.setActive(!draw.getActive())
	}
function addDrawInteraction()
	{
		var geofenceStyle =  new ol.style.Style({
			stroke: new ol.style.Stroke({
			  color: 'green',
			  width: 2,
			  lineDash:[5]
			}),
			fill: new ol.style.Fill({
			  color: 'rgba(0, 0, 255, 0.1)',
			}),
		  })
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
		});

		// Add the draw interaction to the map
		
		map.addInteraction(draw);
		draw.setActive(false);
	}


function getAllBusesData()  
{
	//ajax call to api get all bus data
	$.ajax({
	  url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
	  method: 'GET',
	  dataType: 'json',
	  success: function(response) {
		var dataArr = response;
		var featuresArr =[]
		for (let i = 0; i < dataArr.length; i++) {
			var obj = dataArr[i];			
			var feature = new ol.Feature({
				geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates)),
				properties: obj
			  });
			feature.setId(obj.imei)
			var iconStyle = new ol.style.Style({
				image: new ol.style.Icon({
				  src: 'assets/images/icon_bus4.png', // Replace with the path to your bus icon image
				  scale: 0.17// Adjust the scale as needed
				})
			  });

			  // Set the icon style for the feature
			  feature.setStyle(iconStyle);
			featuresArr.push(feature);
		}
		 
		busesDataSource = new ol.source.Vector({
				 features: featuresArr
			 })
		 busesLyr = new ol.layer.Vector({
			 source: busesDataSource
		 });
		map.addLayer(busesLyr);
	  },
	  error: function(xhr, status, error) {
		console.log('Error:', error);
	  }
	});
}
addDrawInteraction()
getAllBusesData();




