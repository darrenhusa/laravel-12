<template>
    <div id="container" v-bind:style="styleObject"></div>
</template>

<script>
// var Highcharts = require('highcharts');
import Highcharts from 'highcharts';
import Exporting from 'highcharts/modules/exporting';
Exporting(Highcharts);

export default {
    name : "BasicLineChart",
    props : {
      series : {
        // type: Array,
        type: Object,
        required: true
      },
      showDataLabels : {
        type: Boolean,
        default: false
      },
     
      chartWidth: {
        type: Number,
        default: 300
      },
      chartHeight: {
        type: Number,
        default: 300
      }
	},
  	data : function() {
      return {
        // target: 'container'
        target: undefined,
        // width: '300px',
        // height: '300px',
        styleObject: {
          width: this.chartWidth + 'px',
          height: this.chartHeight + 'px',
          border: '1px solid gray',
        },
      }
    },  // end data

    mounted : function() {

      // console.log(this.series);
      // console.log(this.series.title);

      // see https://stackoverflow.com/questions/50144557/how-to-add-data-to-chart-js-with-a-for-loop/50144700
      const seriesTemp = [];
      const number = this.series.data.length;

      for(let i=0; i<number; i++){
        seriesTemp.push({
            name: this.series.data[i].label,
            data: this.series.data[i].values,
            color: this.series.data[i].color,
            dataLabels: {enabled: this.series.data[i].showDataLabels}
        });
      } // end for

      // alert(seriesTemp);
      // console.log(seriesTemp);

      this.target = Highcharts.chart(this.$el, {
    
        events: {
            load: function () {
                const chart = this;
                chart.series.forEach(function (series) {
                    if (series.data.length > 0) {
                        const lastPoint = series.data[series.data.length - 1];
                        lastPoint.update({
                            marker: {
                                enabled: true,
                                // radius: 5, // Customize marker size
                                // fillColor: 'white', // Customize marker color
                                // lineColor: series.color, // Match series color
                                // lineWidth: 2
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function () {
                                    return this.y; // Display the y-value of the last point
                                },
                                // align: 'right',
                                // x: 5 // Adjust label position
                            }
                        }, false); // Set to false to avoid redraw until all updates are done
                    }
                });  // end forEach
                
                chart.redraw(); // Redraw the chart after all updates
            } // end load
        }, // end events
      
        title: {
          text: this.series.title,
          x: -20 //center
        }, // end ytitle
        subtitle: {
          text: this.series.subtitle,
          x: -20
        }, // end subtitle
        xAxis: {
          categories: this.series.categories
        }, // end xAxis
        yAxis: {
          min: 0,
          max: 1500,
          tickInterval: 100,
          // tickPixelInterval: 100,
          title: {
            text: this.series.y_axis,
        },
      
        plotLines: [{
          value: 0,
          width: 1,
          color: '#808080'
        }]
      }, // end yAxis

      plotOptions: {
          line: {
              // dataLabels: {
              //     enabled: this.showDataLabels
              // },
              enableMouseTracking: false,
                marker: {
                symbol: 'circle'
              },  // end marker
          },  // end line
        },  // end plotOptions

          // series: {
          //       dataLabels: {
          //           enabled: true, // Enable data labels for all points initially
          //           formatter: function() {
          //               var seriesPoints = this.series.points;
          //               // Check if the current point is the last point in the series
          //               if (this.point === seriesPoints[seriesPoints.length - 1]) {
          //                   return this.y; // Return the value (or custom text) for the last point
          //               }
          //           },
          //           // Optional: allow labels to overlap if needed
          //           allowOverlap: true 
          //       },
          //       // Optional: ensure markers are shown for all points or only the last one
          //       marker: {
          //           enabled: false // Disable markers for all points by default
          //       }
          //   }
          // },  // end series
       
      tooltip: {
        valueSuffix: ''
      },  // end tooltip

      legend: {
        layout: 'horizontal',
        // layout: 'vertical',
        align: 'center',
        // align: 'right',
        verticalAlign: 'top',
        // verticalAlign: 'middle',
  	    borderWidth: 0,
      },  // end legend

        series: seriesTemp,
        // dataLabels: {
        //     enabled: this.series.data.showDataLabels
        // },
        // for loop generates code of the form below dynamically!
        // [
        //   {
        //     name: this.series.data[0].label,
        //     data: this.series.data[0].values
        //   },
        //   etc. etc.
        credits: {
          enabled: false
        }, // end credits
    });  // end Highcharts.chart
  },  // end mounted()

//   beforeDestroy: function() {
//     this.target.destroy();
//   },
} // end export default

</script>
