$(document).ready(function () {



});
// Radial Area Chart Imei
function chartViewImei(cb) {
    const getChartImeiNo = cb.getAttribute('data-imei');
    console.log("this is chart imei no: " + getChartImeiNo);
    $("#radialAreaChart").show();
    $('#dateRangeRACImei').focus();

}
function setChartSeed() {
    
    $("#racWrapper").show();

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

        

        console.log("start: " + start.format('DD-MM-YYYY') + " end: " + end.format('DD-MM-YYYY') );
        //console.log("this getImeiNo: " + getImeiNo);

    });
});

window.onload = function () {
    
    // Dimensions
    const margin = {left: 50, right: 50, top: 50, bottom: 50};
    let width, height;

    // Data
    let data = [];
    const days = d3.timeDay.range(new Date(2020, 5, 1), new Date(2021, 2, 1));

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
    onresize = _ => redraw(true);
    d3.interval(_ => {
    makeData();
    redraw();
    }, duration * 2);

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
        //console.log(v1 + ' ----- ' + v0);
    data = days.map(date => {
      v1 = Math.min(v1 + random([-1, 1]), 60)
      v0 = Math.min(Math.max(v0 + random([-1, 1]), 1), v1 - 5)
      //console.log(v1 + ' -- ' + v0);
      const obj = {
        date,
        v1,
        v0
      };
      //console.log(obj);
      return obj;

    });
    }

    function randBetween(min, max){
    return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function random(arr){
    return arr[randBetween(0, arr.length - 1)];
    }

};

 