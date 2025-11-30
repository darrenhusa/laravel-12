<template>
    <div id="container" :style="styleObject"></div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Highcharts from 'highcharts';
import Exporting from 'highcharts/modules/exporting';

const props = defineProps({
    series: {
        // type: Array,
        type: Object,
        required: true
    },
    chartWidth: {
        type: Number,
        default: 300
    },
    chartHeight: {
        type: Number,
        default: 300
    }
});

const target = ref(undefined);
const styleObject = ref({
    width: props.chartWidth + 'px',
    height: props.chartHeight + 'px',
    border: '1px solid gray',
});
    
 onMounted(() => { 

  const seriesTemp = [];
  const number = props.series.data.length

  for(let i=0; i<number; i++){
    seriesTemp.push({
        name: props.series.data[i].label,
        data: props.series.data[i].values,
        color: props.series.data[i].color
    });
  }

  // alert(seriesTemp);
  // console.log(seriesTemp);

  target.value = Highcharts.chart(document.getElementById('container'), {
    chart: {
        type: 'column',
          
    },
    title: {
        text: props.series.title
    },
    subtitle: {
        text: props.series.subtitle
    },
    xAxis: {
      title: {
            text: props.series.x_axis
        },
        categories: props.series.categories
    },
    yAxis: {
        min: 0,
        title: {
            text: props.series.y_axis
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: 'gray'
              //   color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            }
        }
      },
      // legend: {
      //     align: 'right',
      //     x: -70,
      //     verticalAlign: 'top',
      //     y: 20,
      //     floating: true,
      //     backgroundColor: 'white',
      //   //   backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
      //     borderColor: '#CCC',
      //     borderWidth: 1,
      //     shadow: false
      // },
      tooltip: {
          formatter: function() {
              return '<b>'+ this.x +'</b><br/>'+
                  props.series.name +': '+ this.y +'<br/>'+
                  'Total: '+ this.point.stackTotal;
          }
      },
      plotOptions: {
          column: {
              stacking: 'normal',
              dataLabels: {
                  enabled: true,
                  formatter: function () {
                      return Math.round(100 * this.y / this.total) + '%';
                  },
                  color: 'white',
                //   color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                  style: {
                      textShadow: '0 0 3px black, 0 0 3px black'
                  }
              }
          }
      },
      series: seriesTemp,

      legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'top',
        },

      credits: {
        enabled: false
      },
    });

 });

</script>
