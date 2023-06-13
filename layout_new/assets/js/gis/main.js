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
      attribution : false,
      zoom : false,
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
  source:new ol.source.XYZ({
        url: 'http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}'
      })
});

map.addLayer(googleMap);

googleMapHybrid = new ol.layer.Tile({
  source:new ol.source.XYZ({
        url:'http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}'
      })
});

map.addLayer(googleMapHybrid);

}


  
var stationLyr;
var busesLyr;
var busesDataSource;
var clusterSource;
var drawSource = new ol.source.Vector();
var draw;
var clusterLayer;
var clusterAnimateLayer;
// Use this function on the draw geofence button click
function toggleDrawGeofenceCtrl() {
  draw.setActive(!draw.getActive());
  if($('#draw_geofence').is(':visible'))
  {
    $('#activeDGF').hide();
    $('#deactiveDGF').show();
  }else{
    $('#activeDGF').show();
    $('#deactiveDGF').hide();
  }
}

 // Style for the clusters
 var styleCache = {};
 function getStyle (feature, resolution){
   var size = feature.get('features').length;
   var style = styleCache[size];
   if (!style) {
     var color = size>50 ? "0, 197, 115" : size>10 ? "255, 103, 0" : "0, 151, 222";
     var radius = Math.max(8, Math.min(size*0.75, 20));
     var dash = 2*Math.PI*radius/6;
     var dash = [ 0, dash, dash, dash, dash, dash, dash ];
     style = styleCache[size] = new ol.style.Style({
       image: new ol.style.Circle({
         radius: radius,
         stroke: new ol.style.Stroke({
           color: "rgba("+color+",0.5)", 
           width: 10 ,
           //lineDash: dash,
           lineCap: "round"
         }),
         fill: new ol.style.Fill({
           color:"rgba("+color+",1)"
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
   return style;
 }

 var busesData = [];
function addBusFeatures(dataArr) {
  var featuresArr = [];
  busesData = dataArr;
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
  style: function(feature) {
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
if (vizTypeId ==null) {
  clusterAnimateLayer.setVisible(false);
}
else {
  clusterLayer.setVisible(false);
}

}

function addBusFeaturesReasign(dataArr) {
  var featuresArr = [];
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
  style: function(feature) {
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
if (vizTypeId ==null) {
  clusterAnimateLayer.setVisible(false);
}
else {
  clusterLayer.setVisible(false);
}

}
function switchBaseMaps() {
	var options = document.getElementById("bmap").options;
	var layer_type = parseInt(options[options.selectedIndex].value);
	if (layer_type==1)
	{
		googleMap.setVisible(true);  //show layer
		osmLayer.setVisible(false); //hide layer	
		mapboxLayer.setVisible(false);
		googleMapHybrid.setVisible(false);
	}
	if (layer_type==0)
	{
		googleMap.setVisible(false);  //hide layer
		mapboxLayer.setVisible(false);
		googleMapHybrid.setVisible(false);
		osmLayer.setVisible(true); //show layer	
	}
	if (layer_type==2)
	{
		googleMap.setVisible(false);  //hide layer
		osmLayer.setVisible(false);
		googleMapHybrid.setVisible(false);
		mapboxLayer.setVisible(true); //show layer	
	}
	if (layer_type==3)
	{
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
    $('#newGeofenceDialogBox').show();
    $('#coordinate_arr').val(drawGeofenceCord);

  });

  // Add the draw interaction to the map
  map.addInteraction(draw);
  draw.setActive(false);
}

var busDataArr ;
var selectedGeofence ;
var selectInteraction;

function getAllBusesData() {
  //ajax call to api get all bus data
  // open loader @khuram,waqas
  $.ajax({
    url: 'https://tracking.naqaba.com.sa/api/getDevicesDataLive?token=cebc8011932a85c60a7e079b840bf083161812d3&min=10',
    method: 'GET',
    dataType: 'json',
    success: function(response) {
      //close laoder
      busDataArr = response;
      addBusFeatures(busDataArr);
selectInteraction = new ol.interaction.Select({
  layers: [clusterLayer,stationLyr,clusterAnimateLayer]
});

// Add the Select interaction to the map
map.addInteraction(selectInteraction);
// Listen for feature selection event
selectInteraction.on('select', function(event) {
	 if (draw.getActive() ==false)
	 {
		  var selectedFeatures = event.selected; // Array of selected features
		  var deselectedFeatures = event.deselected; // Array of deselected features
		  if (selectedFeatures.length>0){
			  var data;
        var coordinates;
        var main_Id;

    		if (selectedFeatures[0].getProperties().properties==undefined){
    		  data  = selectedFeatures[0].getProperties().features[0]['values_']['properties'];
    		}
    		else {
    			data = selectedFeatures[0].getProperties().properties['attributes']
    			selectedGeofence = selectedFeatures[0];
          coordinates = selectedFeatures[0].getProperties().properties['geometry']
          main_Id = selectedGeofence.getProperties().properties._id.$oid;
          document.getElementById("geofence_id").value = main_Id;
    		}

     

		  var obj_str ="";
		  // for (var key in data)
		  // {
			//   obj_str += key+" : "+data[key] +"\n"
		  // }

		    // alert(obj_str);
        if(data['_id'] != null && data['_id'] != undefined){
          //document.getElementById('resultbusToolTipBox').innerText = obj_str;
          //$('#busToolTipBox').show();
          document.getElementById("imei_no").innerHTML = data['imei'];
          document.getElementById("avltm").innerHTML = new Date(data["avltm"]).toISOString();
          document.getElementById("up_time").innerHTML = new Date(data["updatedon"]).toISOString();
          document.getElementById("cr_time").innerHTML = new Date(data["createdon"]).toISOString();
          document.getElementById("cr_time").innerHTML = new Date(data["createdon"]).toISOString();
          document.getElementById("ang").innerHTML = data['ang'];
          document.getElementById("speed").innerHTML = data['spd'];
          document.getElementById("bus_no").innerHTML = data['device'].hasOwnProperty('busid') ? data['device']['busid'] : 'N/A'; 
          document.getElementById("operator_no").innerHTML = data['device'].hasOwnProperty('bus_oper_no') ? data['device']['bus_oper_no'] : 'N/A';
          document.getElementById("device_comp").innerHTML = data['device'].hasOwnProperty('device_comp') ? data['device']['device_comp'] : 'N/A';
          document.getElementById("engplate_no").innerHTML = data['device'].hasOwnProperty('engplate_no') ? data['device']['engplate_no'] : 'N/A';
          document.getElementById("odata").innerHTML = data['odata'];
          
          $('#busDialogBox').show();

        }else{
          document.getElementById("arabicNameGeofence").innerHTML = data['Arabic_Name'];
          document.getElementById("englishNameGeofence").innerHTML = data['English_Name'];
          document.getElementById("typeGeofence").innerHTML = data['Type']
          document.getElementById("districtGeofence").innerHTML = data['District'];
          document.getElementById("areaGeofence").innerHTML = data['Area'];
          document.getElementById("descriptionGeofence").innerHTML = data['Description'];
          document.getElementById("categoryGeofence").innerHTML = data['Category'];
          document.getElementById("siteGeofence").innerHTML = data['Site']; 
          document.getElementById("stationTypeGeofence").innerHTML = data['Station_type'];
          document.getElementById("stationCodeGeofence").innerHTML = data['Station_Code'];
          document.getElementById("stationNameGeofence").innerHTML = data['Station_Name'];
          document.getElementById("codeIdGeofence").innerHTML = data['Code_ID'];
          document.getElementById("shapeLengthGeofence").innerHTML = data['SHAPE_Length'];
          document.getElementById("shapeAreaGeofence").innerHTML = data['SHAPE_Area'];

          document.getElementById("arabic_name_edit").value = data['Arabic_Name'];
          document.getElementById("english_name_edit").value = data['English_Name'];
          document.getElementById("type_edit").value = data['Type']
          document.getElementById("district_edit").value = data['District'];
          document.getElementById("area_edit").value = data['Area'];
          document.getElementById("description_edit").value = data['Description'];
          document.getElementById("category_edit").value = data['Category'];
          document.getElementById("site_edit").value = data['Site']; 
          document.getElementById("station_type_edit").value = data['Station_type'];
          document.getElementById("station_code_edit").value = data['Station_Code'];
          document.getElementById("station_name_edit").value = data['Station_Name'];
          document.getElementById("code_id_edit").value = data['Code_ID'];
          document.getElementById("shape_length_edit").value = data['SHAPE_Length'];
          document.getElementById("shape_area_edit").value = data['SHAPE_Area'];
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
},
error: function(xhr, status, error) {
  console.log('Error:', error);
}
});


}

function getAllGeofence()
{
	//show loader box  @khuram,waqas
    $.ajax({
         url: "./data/get_geofence.php",
         method: "POST",
         dataType: "json",
        data: {
          api_key: "becdf4fbbbf49dbc",
         },
         success: function(data){
       console.log(data);
       //hide loader dialog box @khuram,waqas
			 var stationArr = [];
			  for (let i = 0; i < data.length; i++) {
				var obj = data[i];
				var polygon = new ol.geom.Polygon(obj.geometry.coordinates).transform('EPSG:4326','EPSG:3857');
        var category =obj.attributes.Category;
        var color_rgba = "rgba(0, 199, 254, 0.24)";
        if (category=="موقف") {
          color_rgba ='rgba(171, 71, 194, 0.24)';
        }
        if (category=="محطة") {
          color_rgba ='rgba(141, 104, 202,0.24)';
        }
        
				var feature = new ol.Feature({
				  geometry:polygon,
				  properties: obj
        });
        var stationStyle = new ol.style.Style({
					stroke: new ol.style.Stroke({
					  color: color_rgba,
					  width: 2,
					  //lineDash: [5]
					}),
					fill: new ol.style.Fill({
					  color: color_rgba, 
					}),
					text: new ol.style.Text({
						font: '12px Calibri,sans-serif',
						fill: new ol.style.Fill({ color: '#000' }),
						stroke: new ol.style.Stroke({
						  color: '#fff', width: 2
						}),
						// get the text from the feature - `this` is ol.Feature
						// and show only under certain resolution
					//	text: this.getProperties().properties['attributes']['Arabic_Name'] : ''
					  })
				  });
        feature.setStyle(stationStyle);
				//feature.setId(obj._id);
				stationArr.push(feature);
			  }
			  
			  
			  var stationSource = new ol.source.Vector({
											features: stationArr
											});
			  
				
				stationLyr = new ol.layer.Vector({
					source: stationSource,
					style: stationStyle,
				  });
			  //stationLyr.setZIndex(11);
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
          // $('#toolTipBox').show();
         },
     });
}

function exportAsGeoJson()
{
	var writer=new ol.format.GeoJSON();
	var cloneFeat = selectedGeofence.clone();
	cloneFeat.getGeometry().transform( 'EPSG:3857', 'EPSG:4326')
    var geoJsonStr = writer.writeFeature(cloneFeat);
	var dw_geojson = document.getElementById('downloadGeojsonFile');
	//dw_geojson.setAttribute("id","exportGeoJson");
	dw_geojson.setAttribute("href",     geoJsonStr     );
	dw_geojson.setAttribute("download", "export_geofence.geojson");
	dw_geojson.click();
	
}

function downloadJSON() {
	
	var writer=new ol.format.GeoJSON();
	var cloneFeat = selectedGeofence.clone();
	cloneFeat.getGeometry().transform( 'EPSG:3857', 'EPSG:4326')
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




//document.getElementById("draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl);

 /*document.getElementById("bmap").onchange = function(){
					switchBaseMaps();
 };
 
setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes


//$(document).ready(function() {
   
   $("#applySettingBtn").click(function(){
        addBusFeatures(busDataArr);
    }); 
	
	$("#exportGeofence").click(function(){
        downloadJSON();
    }); 
	
//});




*/



function updateFilterList1(event,i){

}

function updateFilterList2(event,i){

}

function updateFilterList3(event,i){

}
function trackingDevicesSearchEvent(event){
  var value = document.getElementById(event).value;
  if(value && value != ''){
    if(busesData && busesData.length){
      value = value.toLowerCase()
      var dataFilter = busesData.filter(x =>
         String(x.device.bus_oper_no).toLowerCase().includes(value) ||
         String(x.device.busid).toLowerCase().includes(value) ||
         String(x.device.device_comp).toLowerCase().includes(value) ||
         String(x.device.engplate_no).toLowerCase().includes(value) ||
         String(x.device.license_ser_no).toLowerCase().includes(value) ||
         String(x.device.plate_no).toLowerCase().includes(value) ||
         String(x.device.trnspt_comp_ar).toLowerCase().includes(value) ||
         String(x.device.trnspt_comp_id).toLowerCase().includes(value)
         );  
      if(dataFilter && dataFilter.length){
        addBusFeaturesReasign(dataFilter);
        for (let i = 0; i < devicesList.length; i++) {
          var check = busesData.filter(x =>
              String(x.device.device_comp).toLowerCase().includes(devicesList[i].device_comp) 
            );  
         if(check && check.length){
           document.getElementById(`mainListRowsTransportationCompaniesDynamiclistRow${i}`).checked = true;
         }else{
          document.getElementById(`mainListRowsTransportationCompaniesDynamiclistRow${i}`).checked = false;
         }
        }
        for (let i = 0; i < transportationCompanyList.length; i++) {
          var check = busesData.filter(x =>
            String(x.device.trnspt_comp_ar).toLowerCase().includes(transportationCompanyList[i].trnspt_comp_ar) 
            );  
         if(check && check.length){
           document.getElementById(`TrackingDeviceslistRow${i}`).checked = true;
         }else{
           document.getElementById(`TrackingDeviceslistRow${i}`).checked = false;
         }
        }
        
      }
    }
  }else{
    addBusFeaturesReasign(busesData);
    loadFiltersDataDevicesCompany(devicesList);
    loadFiltersDatatransportationCompanyList(transportationCompanyList);
    loadFiltersDatacompanyList(companyList);
  }
}

function unselectAllFeatures() {
//call this function to unselect features
  selectInteraction.getFeatures().clear();
}

function zoomTo(amount){
  const view = map.getView();
  const zoom = view.getZoom();
  view.animate({ zoom: zoom + amount})
}

$( document ).ready(function() {
  initMap();
  addDrawInteraction();
  getAllGeofence();
  switchBaseMaps();
  getAllBusesData();
  //loadFiltersDataDevicesCompany();
    
  document.getElementById("bmap").onchange = function(){ //add switch basemap listener
					switchBaseMaps();
 };


// setInterval(getAllBusesData, 240 * 1000); //api call after every 4 minutes

 document.getElementById("draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl); //draw gerofence control listener
 document.getElementById("de_draw_geofence").addEventListener("click", toggleDrawGeofenceCtrl); //draw gerofence control listener

  $("#applySettingBtn").click(function(){
    addBusFeatures(busDataArr);
  }); 


  
  
  


});
