<template>
    <div id="container" v-bind:style="styleObject"></div>
</template>

<script>
// var Highcharts = require('highcharts');
import Highcharts from 'highcharts';
import Exporting from 'highcharts/modules/exporting';
Exporting(Highcharts);

// import LineChartWithDifferingDataLabels from '@/components/LineChartWithDifferingDataLabels.vue';

// export default {
  // name: 'ParentUsingChart',
  


export default {
    name : "LineChartWithDifferingDataLabels",
    
    // components: {
    // 'line-chart-with-differing-data-labels': LineChartWithDifferingDataLabels
    // },

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

    methods: {

      build_plot_parameters(myData) {

        console.log('inside build_plot_parameters...');

        const seriesTemp = [];
        const number = myData.length;

        for(let i = 0; i < number; i++) {
          
          let name = myData[i].label;
          let data = myData[i].values;
          let color = myData[i].color;
          // let index = myData[i].index;
          // let y = myData[i].point.y;
          
          // console.log('myData[i] ', myData[i]);
          // console.log('');

          let dataLabels;
          // let marker;
          let series_obj;

          // choose between all data labels shown or last data label only formats
          let all_points_format_enabled = myData[i].showDataLabels;
          // var last_point_format_enabled = this.series.data[i].lastPoint;

          // step 1 of object build
          series_obj = {
              name: name,
              data: data,
              color: color,              
          };  // end series_obj
          
          // step 2 of object build
          if (all_points_format_enabled) {
            dataLabels = { enabled: true, };
          }
          else {
            dataLabels = {
              enabled: true,
              formatter: function() {
                  // Check if this is the last point in the series
                  if (this.point === this.series.points[this.series.points.length - 1]) {
                      return this.y; // Display the value for the last point
                  }
                  return null; // Hide labels for other points
              }
            };
            // series_obj = {
            //   name: name,
            //   data: data,
            //   color: color,
              
            //   dataLabels: dataLabels,
              // marker: marker,  // (optional) show a marker only on the last point
          } // end else

          // using javscript spread operator to add datalabels property to series_obj
          series_obj = { ...series_obj, dataLabels: dataLabels};

          seriesTemp.push(series_obj);

        } // end for

        return seriesTemp;        
      } // end function

  }, // end methods

    mounted() {

      // console.log('inside mounted()....')
      // console.log(this.series.data);
      // console.log(this.series.title);

      // see https://stackoverflow.com/questions/50144557/how-to-add-data-to-chart-js-with-a-for-loop/50144700
      
        let seriesTemp = [];
        
        seriesTemp = this.build_plot_parameters(this.series.data);          
          
        // console.log('check values for dataLabels and markers');

        //  for(let i = 0; i < this.series.data.length; i++) {
        //   console.log(seriesTemp[i].name); 
        //   console.log(seriesTemp[i].dataLabels); 
        //   console.log(seriesTemp[i].marker); 
        //   // console.log(seriesTemp[i].name, seriesTemp[i].dataLabels, seriesTemp[i].marker); 
        // }
        
       for(let i = 0; i < this.series.data.length; i++) {
          console.dir(seriesTemp[i].dataLabels); 
        }
        
        // console.log(seriesTemp);

      this.target = Highcharts.chart(this.$el, {
    
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

      series: [
          {
            name: seriesTemp[0].name,
            data: seriesTemp[0].data,
            dataLabels: seriesTemp[0].dataLabels,
            // marker: seriesTemp[0].marker,
          }, 
          {
            name: seriesTemp[1].name,
            data: seriesTemp[1].data,
            dataLabels: seriesTemp[1].dataLabels,
            // marker: seriesTemp[1].marker,
          },
          {
            name: seriesTemp[2].name,
            data: seriesTemp[2].data,
            dataLabels: seriesTemp[2].dataLabels,
            // marker: seriesTemp[2].marker,
          },
          {
            name: seriesTemp[3].name,
            data: seriesTemp[3].data,
            dataLabels: seriesTemp[3].dataLabels,
            // marker: seriesTemp[3].marker,
          },
          {
            name: seriesTemp[4].name,
            data: seriesTemp[4].data,
            dataLabels: seriesTemp[4].dataLabels,
            // marker: seriesTemp[4].marker,
          },
        ],
        // series: seriesTemp,
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
