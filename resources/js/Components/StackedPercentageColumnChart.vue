<script setup>
import { ref, onMounted } from 'vue';
import Highcharts from 'highcharts';
// import Exporting from 'highcharts/modules/exporting';
// Exporting(Highcharts);

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
    console.log('inside onMounted().....');
    console.log('props.series = ', props.series);
    console.log('props.series.data = ', props.series.data);
    console.log('props.series.data.length = ', props.series.data.length);

    const seriesTemp = [];
    const number = props.series.data.length;

    // console.log('number = ', number);

    for (let i = 0; i < number; i++) {
        seriesTemp.push({
            name: props.series.data[i].label,
            data: props.series.data[i].values,
            color: props.series.data[i].color
        });
    }

    let entryTypeTotal = 0;
    const percentage = [];

    for (let i = 0; i < number; i++) {
        entryTypeTotal += props.series.data[i].values[0];
    }
    for (let i = 0; i < number; i++) {
        percentage.push((100.0 * props.series.data[i].values[0]) / entryTypeTotal);
    }

    console.log(percentage);

    target.value = Highcharts.chart(document.getElementById('container'), {
        chart: {
            type: 'column'
        },
        title: {
            text: props.series.title
        },
        subtitle: {
            text: props.series.subtitle // Assuming subtitle exists in props.series
        },
        // ... rest of your Highcharts options

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
              }
          },
          tooltip: {
              pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
              shared: true
          },
          plotOptions: {
              column: {
                  stacking: 'percent',

                  dataLabels: {
                  enabled: true,
                  inside: true,
                  formatter: function() {
                     return Math.round(100 * this.y / this.total) + '%';
                  }
                }
              },
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
          }
        });

});
</script>


<template>
    <div id="container" :style="styleObject"></div>
</template>
