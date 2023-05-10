var attribution = new ol.control.Attribution({
     collapsible: false
 });

 var map = new ol.Map({
     controls: ol.control.defaults({attribution: false}).extend([attribution]),
     layers: [
         new ol.layer.Tile({
             source: new ol.source.OSM({
                 url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                 attributions: [ ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>' ],
                 maxZoom: 18
             })
         })
     ],
     target: 'mapContainer',
     view: new ol.View({
		 projection: 'EPSG:4326',
         center: ol.proj.fromLonLat([39.9182243347168,21.48110580444336]),
         maxZoom: 18,
         zoom: 12
     })
 });
 
var layer = new ol.layer.Vector({
     source: new ol.source.Vector({
         features: [
             new ol.Feature({
                 geometry: new ol.geom.Point(ol.proj.fromLonLat([39.9182243347168,21.48110580444336]))
             })
         ]
     })
 });
 map.addLayer(layer);