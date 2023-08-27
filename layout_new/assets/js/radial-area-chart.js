$(document).ready(function () {

  

  // $.ajax({
  //     type: 'post',
  //     url: "./data/get_radialChartData.php.php",
  //     dataType: 'json',
  //     data: {
  //         arabic_name: arabic_name,
  //         english_name: english_name,
  //         type: type,
  //         district: district,
  //         description: description,
  //         category: category,
  //         site: site,
  //         station_type: station_type,
  //         station_code: station_code,
  //         station_name: station_name,
  //         code_id: code_id,
  //         generic_name: generic_name,
  //         geofence_type: geofence_type,
  //         season: season,
  //         //coordinates : coordinate_arr,
  //         geofence_update_id: geofence_update_id
  //     },
  //     beforeSend: function () {
  //         $('#geofenceUpdate, #geofenceCancle').attr('disabled', true);
  //         $('#geofenceSave').after('<div class="wait">&nbsp;<img src="assets/images/icons/loading.gif" alt="" /></div>');
  //     },
  //     complete: function () {
  //         $('#geofenceUpdate, #geofenceCancle').attr('disabled', false);
  //         $('.wait').remove();
  //     },
  //     success: function (data) {
  //         if (data.type == 'error') {
  //             //output = '<div class="error">'+data.text+'</div>';
  //             output = 'Error: ' + data.text + '';

  //         } else {
  //             //output = '<div class="success">'+data.text+'</div>';
  //             output = 'Success: ' + data.text + '';

  //             $('#geofenceAdd input[type=text]').val('');
  //             $('#geofenceAdd textarea').val('');

  //             $('.boxPopUpTab').animate({top: "0px", opacity: "0.1"}, function () {
  //                 $('.boxPopUpTab').hide();
  //                 //Black Box hide
  //                 $('.popUpBox').animate({opacity: "0.1"}, function () {
  //                     $('.popUpBox').hide();
  //                     $('.popUpBox').css({"opacity": "1.0"});
  //                     $('.boxPopUpTab').show();
  //                     //Set to Default
  //                     $('.boxPopUpTab').css({"top": "20px", "opacity": "1.0"});
  //                 });
  //             });
  //             getAllGeofence(); //add all geofence
  //         }

  //         $("#result").hide().html(output).slideDown();
  //         showNotification(output);

  //     }
  // });

});
let getChartImeiNo;
let startdate;
let enddate;

let s_date;
let e_date;
// Radial Area Chart Imei
function chartViewImei(cb) {
    getChartImeiNo = cb.getAttribute('data-imei');
    //console.log("this is chart imei no: " + getChartImeiNo);
    $("#radialAreaChart").show();
    $('#dateRangeRACImei').focus();
    $('#chartImeiNo').html(getChartImeiNo);
    $("#racWrapper").hide();

}

$(function () {
    $('#dateRangeRACImei').daterangepicker({
        opens: 'right',
        locale: {
            applyLabel: 'Apply Date Range',
            format: "DD/MM/YYYY"
        }
    }, function (start, end, label) {
        
        //mapType = $('.datePickerWrapper').find('#mapTypeInput').val();

        
        //$(".busFinder>a").removeClass("active");
        //$('#busFinderBox').hide();
        //$(".animationPanel").show();

        //$("#startDateRange").html(start.format('D MMMM, YYYY'));
        //$("#endDateRange").html(end.format('D MMMM, YYYY'));

        

        //console.log("start: " + start.format('DD-MM-YYYY') + " end: " + end.format('DD-MM-YYYY') );
        //console.log("this getImeiNo: " + getImeiNo);

      startdate = start.format('DD-MM-YYYY');
      enddate = end.format('DD-MM-YYYY');

      s_date = start.format('YYYY, MM, DD');
      e_date = end.format('YYYY, MM, DD');

    });
});

function setChartSeed() {
    
    $("#racWrapperLoading").show();
    $("#racWrapper").empty();

    //$("#racWrapper").show();
    console.log("imei: " + getChartImeiNo + " start: " + s_date + " end: " + e_date );

    $.ajax({
      url: "./data/get_radialChartData.php",
      method: "POST",
      dataType: "json",
      data: {
          api_key: "becdf4fbbbf49dbc",
          imei_no: getChartImeiNo,
          start_date: startdate,
          end_date: enddate
      },
      success: function (response) {
          //close laoder
          //let animationDataArr = response;
          //let pathways = []
          //let timesArr = []
          //alert('success')
          // for (let i = 0; i < animationDataArr.length; i++) {
          //     let data = animationDataArr[i];
          //     pathways.push(data.location.coordinates)
          //     timesArr.push(data.avltm);
          //     //console.log(data.location.coordinates);
          // }

          //initDeckGlMap(pathways, timesArr)
          //console.log('response:', response);
          $("#racWrapperLoading").hide();
          $("#racWrapper").show();
          radialChartInitialize(response);
      },
      error: function (xhr, status, error) {
          console.log('Error:', error);
      }
  });
}

function radialChartInitialize(rData) {

    let length_rData = rData.length;

    // Dimensions
    const margin = {left: 50, right: 50, top: 50, bottom: 50};
    let width, height;

    // Data
    let data = [];
    const days = d3.timeDay.range(new Date(rData[0].date), new Date(rData[length_rData-1].date));

    // Scales
    const xScale = d3.scaleTime()
      .domain(d3.extent(days))
      .range([0, Math.PI * 2]);

    const yScale = d3.scaleRadial()
      .domain([0, 100]);

    // Generators
    const areaGenerator = d3.areaRadial()
      .angle(d => xScale(d.date))
      .innerRadius(d => yScale(d.v0))
      .outerRadius(d => yScale(d.v1))
      .curve(d3.curveBasis);

    // Elements
    const svg = d3.select("#racWrapper").append("svg");
    const g = svg.append("g");

    const xAxis = g.append("g")
      .attr("class", "axis");

    const xAxisTicks = xAxis.selectAll(".tick")
      .data(d3.timeMonth.every(1).range(...d3.extent(days)))
    .enter().append("g")
      .attr("class", "tick");

    xAxisTicks.append("text")
      .attr("dy", -15)
      .text(d => `${d3.timeFormat("%b")(d)}.`);

    xAxisTicks.append("line")
      .attr("y2", -10);

    const yAxis = g.append("g")
      .attr("class", "axis");

    const yAxisTicks = yAxis.selectAll(".tick")
      .data(yScale.ticks(4).slice(1))
    .enter().append("g")
      .attr("class", "tick");

    const yAxisCircles = yAxisTicks.append("circle");

    const yAxisTextTop = yAxisTicks.append("text")
      .attr("dy", -5)
      .text(d => d);

    const yAxisTextBottom = yAxisTicks.append("text")
      .attr("dy", 12)
      .text(d => d);

    // Updater
    const duration = 750;
    makeData();
    redraw();
    //onresize = _ => redraw(true);
    //d3.interval(_ => {
    //makeData();
    //redraw();
    //}, duration * 2);

    function redraw(resizing){
    const diameter = Math.min(innerWidth, innerHeight);
    width = diameter - margin.left - margin.right;
    height = diameter - margin.top - margin.bottom;

    yScale
        .range([0, height / 2]);

    svg
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom);

    g
        .attr("transform", `translate(${margin.left + width / 2}, ${margin.top + height / 2})`);

    xAxisTicks
        .attr("transform", (d, i, e) => {
          const point = [width / 2, 0];
          const angle = i / e.length * 360;
          const rotated = geometric.pointRotate(point, 270 + angle);
          return `translate(${rotated}) rotate(${angle})`;
        });

    yAxisCircles
        .attr("r", d => yScale(d));

    yAxisTextTop.attr("y", d => yScale(d));

    yAxisTextBottom.attr("y", d => -yScale(d));

    // General update pattern for the area, whose data changes
    const area = g.selectAll(".area")
        .data([data]);

    if (resizing){
      area
          .attr("d", areaGenerator);
    }
    else {
      area.transition().duration(duration)
          .attr("d", areaGenerator);
    }

    area.enter().append("path")
        .attr("class", "area")
        .attr("d", areaGenerator)
        .style("opacity", 0)
      .transition().duration(duration)
        .style("opacity", 1); 
    }

    // Functions for generating random data
    
    
    function makeData(){

    let v0 = randBetween(5, 25);
        v1 = randBetween(40, 60);
    //console.log(days);
    //console.log(days.length);

    let ino = 0;
    //let length_rData = rData.length;
    let length_days = days.length;

    if(length_rData >= length_days){
        data = days.map(date => {
        //v1 = Math.min(v1 + random([-1, 1]), 60)
        //v0 = Math.min(Math.max(v0 + random([-1, 1]), 1), v1 - 5)
        
        v0 = rData[ino].min;
        v1 = rData[ino].max;
        //console.log(rData[ino].count);

        //console.log(data);
        const obj = {
          date,
          v1,
          v0
        };
        //console.log(ino);
        ino++;
        return obj;
      });
      }else{
        console.log('days and data not matched');
      }

    

      //console.log('ino:', ino);
      console.log('rData:', rData);
      //console.log('length_rData:', length_rData);
      console.log('data:', data);
      //console.log('length_days:', length_days);
    }

    function randBetween(min, max){
    return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function random(arr){
    return arr[randBetween(0, arr.length - 1)];
    }

};

// window.onload = function () {
    
//     // Dimensions
//     const margin = {left: 50, right: 50, top: 50, bottom: 50};
//     let width, height;

//     // Data
//     let data = [];
//     const days = d3.timeDay.range(new Date(2020, 5, 1), new Date(2021, 2, 1));

//     // Scales
//     const xScale = d3.scaleTime()
//       .domain(d3.extent(days))
//       .range([0, Math.PI * 2]);

//     const yScale = d3.scaleRadial()
//       .domain([0, 100]);

//     // Generators
//     const areaGenerator = d3.areaRadial()
//       .angle(d => xScale(d.date))
//       .innerRadius(d => yScale(d.v0))
//       .outerRadius(d => yScale(d.v1))
//       .curve(d3.curveBasis);

//     // Elements
//     const svg = d3.select("#racWrapper").append("svg");
//     const g = svg.append("g");

//     const xAxis = g.append("g")
//       .attr("class", "axis");

//     const xAxisTicks = xAxis.selectAll(".tick")
//       .data(d3.timeMonth.every(1).range(...d3.extent(days)))
//     .enter().append("g")
//       .attr("class", "tick");

//     xAxisTicks.append("text")
//       .attr("dy", -15)
//       .text(d => `${d3.timeFormat("%b")(d)}.`);

//     xAxisTicks.append("line")
//       .attr("y2", -10);

//     const yAxis = g.append("g")
//       .attr("class", "axis");

//     const yAxisTicks = yAxis.selectAll(".tick")
//       .data(yScale.ticks(4).slice(1))
//     .enter().append("g")
//       .attr("class", "tick");

//     const yAxisCircles = yAxisTicks.append("circle");

//     const yAxisTextTop = yAxisTicks.append("text")
//       .attr("dy", -5)
//       .text(d => d);

//     const yAxisTextBottom = yAxisTicks.append("text")
//       .attr("dy", 12)
//       .text(d => d);

//     // Updater
//     const duration = 750;
//     makeData();
//     redraw();
//     onresize = _ => redraw(true);
//     d3.interval(_ => {
//     makeData();
//     redraw();
//     }, duration * 2);

//     function redraw(resizing){
//     const diameter = Math.min(innerWidth, innerHeight);
//     width = diameter - margin.left - margin.right;
//     height = diameter - margin.top - margin.bottom;

//     yScale
//         .range([0, height / 2]);

//     svg
//         .attr("width", width + margin.left + margin.right)
//         .attr("height", height + margin.top + margin.bottom);

//     g
//         .attr("transform", `translate(${margin.left + width / 2}, ${margin.top + height / 2})`);

//     xAxisTicks
//         .attr("transform", (d, i, e) => {
//           const point = [width / 2, 0];
//           const angle = i / e.length * 360;
//           const rotated = geometric.pointRotate(point, 270 + angle);
//           return `translate(${rotated}) rotate(${angle})`;
//         });

//     yAxisCircles
//         .attr("r", d => yScale(d));

//     yAxisTextTop.attr("y", d => yScale(d));

//     yAxisTextBottom.attr("y", d => -yScale(d));

//     // General update pattern for the area, whose data changes
//     const area = g.selectAll(".area")
//         .data([data]);

//     if (resizing){
//       area
//           .attr("d", areaGenerator);
//     }
//     else {
//       area.transition().duration(duration)
//           .attr("d", areaGenerator);
//     }

//     area.enter().append("path")
//         .attr("class", "area")
//         .attr("d", areaGenerator)
//         .style("opacity", 0)
//       .transition().duration(duration)
//         .style("opacity", 1); 
//     }

//     // Functions for generating random data
//     function makeData(){
//     let v0 = randBetween(5, 25);
//         v1 = randBetween(40, 60);
//         //console.log(v1 + ' ----- ' + v0);
//     data = days.map(date => {
//       v1 = Math.min(v1 + random([-1, 1]), 60)
//       v0 = Math.min(Math.max(v0 + random([-1, 1]), 1), v1 - 5)
//       //console.log(v1 + ' -- ' + v0);
//       const obj = {
//         date,
//         v1,
//         v0
//       };
//       //console.log(obj);
//       return obj;

//     });
//     }

//     function randBetween(min, max){
//     return Math.floor(Math.random() * (max - min + 1) + min);
//     }

//     function random(arr){
//     return arr[randBetween(0, arr.length - 1)];
//     }

// };

 