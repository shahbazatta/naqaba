var rows = 0;
var start, end;
var csvparser;
var pauseChecked = false;
var printStepChecked = false;

$(function()
{
	$('#uploadBtn').change(function()
	{
		rows = 0;

		var files = $('#uploadBtn')[0].files;
		var config = buildConfig();

		


		if (files.length > 0)
		{
			
				for (var i = 0; i < files.length; i++)
				{
					if (files[i].size > 1024 * 1024 * 10)
					{
						alert("A file you've selected is larger than 10 MB;");
						return;
					}
				}
			

			start = performance.now();
			
			$('#uploadBtn').parse({
				config: config
			});
		}
		else
		{
			start = performance.now();
			var results = Papa.parse(txt, config);
			console.log("Synchronous parse results:", results);
		}
	});

});



function buildConfig()
{
	return {
		newline: getLineEnding(),
		header: true,
		complete: completeFn,
		error: errorFn
	};

	function getLineEnding()
	{
		if ($('#newline-n').is(':checked'))
			return "\n";
		else if ($('#newline-r').is(':checked'))
			return "\r";
		else if ($('#newline-rn').is(':checked'))
			return "\r\n";
		else
			return "";
	}
}



function errorFn(error, file)
{
	console.log("ERROR:", error, file);
}

function completeFn()
{
	end = performance.now();
	if ( arguments[0] && arguments[0].data)
		
		rows = arguments[0].data.length;
	//csvparser = arguments[0].data;
	//console.log(arguments[0].data);
	//console.log("Rows:", rows);
	getcsvdata(arguments[0].data);
}
function getcsvdata(data){
	
	var dataArr = [];
	var heatMap = [];
	var mapData = [];
	var ownResult = [];
	
	var index=0;
	while(data[index]){
		
		dataArr.push(data[index]);			
		index++;
	}
	
	index=0;
	for(index=0; index < dataArr.length; index++){
		//var set_data = [3];
		//set_data[0]=dataArr[index].Altitude;
		//set_data[1]=dataArr[index].Latitude;
		//set_data[2]=dataArr[index].Longitude;
		
		var countVal = dataArr[index].Altitude;
		
		heatMap.push({count:countVal,lon:dataArr[index].Longitude,lat:dataArr[index].Latitude});
	}
	
	index=0;
	for(index=0; index < dataArr.length; index++){
		
		var geomWKTVal = null;
		
		mapData.push({value:null,time:dataArr[index].Time,gid:dataArr[index].ID,geomWKT:geomWKTVal,altitude:dataArr[index].Altitude,deviceId:dataArr[index].DeviceId,geom:null,postTime:dataArr[index].PostTime,latitude:dataArr[index].Latitude,longitude:dataArr[index].Longitude,speed:dataArr[index].Speed,network:dataArr[index].Network,operator:dataArr[index].Operator,strength:dataArr[index].Strength});
	}
	ownResult.push({heatMapData:heatMap,mapData:mapData});
	
	//console.log(dataArr);
	
	csvparser = ownResult;
	//console.log(csvparser);
}
