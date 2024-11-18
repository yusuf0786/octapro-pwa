if(document.querySelector("#chart-btc")) {
    var options = {
        series: [{
            name: 'series1',
            data: [41, 58, 98, 79]
        }],
        colors:['#8CC152'],
        chart: {
            toolbar: {show: false},
            height: 80,
            width:150,
            type: 'area'
        },
        grid:{show:false },
        xaxis: {
            labels: {show: false,},
            axisBorder: {show: false},
            axisTicks: {show: false,}	
        },
        yaxis: {labels: {show: false}},
        dataLabels: {enabled: false},
        stroke: {width:1},
        tooltip: {enabled:false},
    };

    var chart = new ApexCharts(document.querySelector("#chart-btc"), options);
    chart.render();
}

if(document.querySelector("#chart-eth")) {
    var options = {
        series: [{
            name: 'series1',
            data: [92, 93, 92, 91]
        }],
        colors:['#BF263C'],
        chart: {
            toolbar: {show: false},
            height: 80,
            width:150,
            type: 'area'
        },
        grid:{show:false },
        xaxis: {
            labels: {show: false,},
            axisBorder: {show: false},
            axisTicks: {show: false,}	
        },
        yaxis: {labels: {show: false}},
        dataLabels: {enabled: false},
        stroke: {width:1},
        tooltip: {enabled:false},
    };

    var chart = new ApexCharts(document.querySelector("#chart-eth"), options);
    chart.render();
}

if(document.querySelector("#chart-eur")) {
    var options = {
        series: [{
            name: 'series1',
            data: [192, 150, 170, 170]
        }],
        colors:['#5D9CEC'],
        chart: {
            toolbar: {show: false},
            height: 80,
            width:150,
            type: 'area'
        },
        grid:{show:false },
        xaxis: {
            labels: {show: false,},
            axisBorder: {show: false},
            axisTicks: {show: false,}	
        },
        yaxis: {labels: {show: false}},
        dataLabels: {enabled: false},
        stroke: {width:1},
        tooltip: {enabled:false},
    };

    var chart = new ApexCharts(document.querySelector("#chart-eur"), options);
    chart.render();
}

if(document.querySelector("#pieChart")) {
    const pieChartOptions = {
        chart: {
            // width: "240px",
            type: "donut", // Chart type
            // events: {
            //     dataPointSelection: (event, chartContext, config) => { 
            //     // this will print mango, apple etc. when clicked on respective datapoint
            //     console.log(config.w.config.labels[config.dataPointIndex])}
            // }
        },
        stroke: {
            width: 1,
            colors: ['#fff'],
          },
        series: [24.53, 41.27, 21.27, 14.43, 12.31], // Updated values for each segment
        labels: ["PROCESSING", "CLOSED", "PENDING", "CANCEL"], // Updated labels
        colors: ['#FC6E51', '#7fb842', '#5D9CEC', '#d84558'],
        legend: {
            position: "bottom",
        },
        legend: false,
        plotOptions: {
            pie: {
              expandOnClick: false, // Prevent slices from expanding on click
            },
        },
        dataLabels: {
            enabled: true, // Enable data labels
            textAnchor: 'middle',
            style: {
                fontSize: '10px',
                colors: ['rgba(0,0,0,0)'],
            },
            background: {
                enabled: true,
                foreColor: '#fff',
                borderWidth: 0,
                borderRadius: 4,
            },
            formatter: (val, opts) => {
                // Return the label instead of the value
                // return opts.w.globals.labels[opts.seriesIndex];
                return opts.w.globals.initialSeries[opts.seriesIndex];
            },
        },
        tooltip: {
            enabled: false, // Disable the tooltip
        },
    };

    window.pieChart = new ApexCharts(document.querySelector("#pieChart"), pieChartOptions);
    window.pieChart.render();
    // var chart = new ApexCharts(document.querySelector("#pieChart"), pieChartOptions);
    // chart.render();
}

if(document.querySelector("#chart-activity")) {
    var chartActivityOptions = {
        series: [14, 73, 31, 17, 15],
        colors:[chartRed, chartGreen, chartBlue, chartMint, chartMagenta],
        chart: {
            width:'320px',
            animations: {enabled: false},
            toolbar: {show: false},
            type: 'donut'
        },
        legend: {
            show:false,
            position: 'bottom'
        },
        grid:{show:false },
        xaxis: {
            labels: {show: false,},
            axisBorder: {show: false},
            axisTicks: {show: false,}	
        },
        yaxis: {labels: {show: false}},
        dataLabels: {enabled: false},
        stroke: {width:0},
        tooltip: {enabled:false},
    };

    var chart = new ApexCharts(document.querySelector("#chart-activity"), chartActivityOptions);
    chart.render();
}

if(document.querySelectorAll("#charts-demo-1")[0]) {
    var optionsChart1 = {
        chart: {
            type: 'area',
            toolbar: {
                show: false
            },
            animations: {
                enabled: false,
            }
        },
        series: [{
            name: 'Mobile',
            data: [30, 40, 45, 50, 49, 60, 70],
        }, {
            name: 'PWA',
            data: [40, 50, 65, 70, 89, 90, 95],
        }],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.7,
                opacityTo: 0.9,
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997]
        }
    }

    var chartDemo1 = new ApexCharts(document.querySelectorAll("#charts-demo-1")[0], optionsChart1);
    chartDemo1.render();
}