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
 
/**$.ajax({
  url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
  method: 'GET',
  dataType: 'json',
  success: function(response) {
    var dataArr = response;
	var featuresArr =[]
	for (let i = 0; i < dataArr.length; i++) {
	var obj = dataArr[i];
	featuresArr.push(new ol.Feature({geometry: new ol.geom.Point(ol.proj.fromLonLat(obj.location.coordinates))}));
	}
	  
	var layer = new ol.layer.Vector({
		 source: new ol.source.Vector({
			 features: featuresArr
		 })
	 });
	map.addLayer(layer);
  },
  error: function(xhr, status, error) {
    console.log('Error:', error);
  }
});
**/


