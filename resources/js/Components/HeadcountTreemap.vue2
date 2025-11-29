<template>
    <div>
        <div class="container"></div>
    </div>
</template>

<script>
// var Highcharts = require('highcharts');
import Highcharts from 'highcharts';
// import Heatmap from 'highcharts/modules/heatmap';
import Treemap from 'highcharts/modules/treemap';
import Exporting from 'highcharts/modules/exporting';
Exporting(Highcharts);
// Heatmap(Highcharts);
Treemap(Highcharts);

export default {
    name : "HeadcountTreemap",
    // props : {
    //   series : {
    //     // type: Array,
    //     type: Object,
    //     required: true
    //   },
    //   // algorithm : {
      //   type: String,
      //   // required: true,
      //   default: 'sliceAndDice'
      // },

	// },
  	data : function() {
      return {
        // target: 'container'
        target: undefined
      }
    },
    mounted : function() {
      // console.log(this.series);
      // console.log(this.series.title);

      // see https://stackoverflow.com/questions/50144557/how-to-add-data-to-chart-js-with-a-for-loop/50144700
      // const seriesTemp = [];
      // const number = this.series.data.length

      // for(let i=0; i<number; i++){
      //   seriesTemp.push({
      //       id: this.series.data[i].id,
      //       name: this.series.data[i].name,
      //       color: this.series.data[i].color,
      //   });
      // }

      // alert(seriesTemp);
      // console.log(seriesTemp);

      this.target = Highcharts.chart(this.$el, {
            series: [{
            type: "treemap",
            layoutAlgorithm: 'stripes',
            alternateStartingDirection: true,
            levels: [{
                level: 1,
                // layoutAlgorithm: 'squarified',
                layoutAlgorithm: 'sliceAndDice',
                dataLabels: {
                    enabled: true,
                    align: 'left',
                    verticalAlign: 'top',
                    style: {
                        fontSize: '15px',
                        fontWeight: 'bold'
                    }
                }
            }],
            data: [
            {
                id: '1',
                name: 'TRAD',
                color: "#636efa"
            }, 
            
            {
                id: '2',
                name: 'DCP',
                color: "#ef553b"
            }, 
            {
                id: '3',
                name: 'GRAD',
                color: '#00cc96'
            }, 
            // TRAD details
            {
                name: 'Accounting',
                parent: '1',
                value: 10
            },
            {
                name: 'Associates in Science Degree',
                parent: '1',
                value: 6
            }, 
            {
                name: 'Biomedical Science',
                parent: '1',
                value: 7
            }, 
            {
                name: 'Business Management',
                parent: '1',
                value: 126
            },
            {
                name: 'Criminal Justice',
                parent: '1',
                value: 50
            },

            {
                name: 'Digital & Studio Arts',
                parent: '1',
                value: 32
            },
            {
                name: 'Education',
                parent: '1',
                value: 25
            }, 
            {
                name: 'English & Media Communications',
                parent: '1',
                value: 19
            }, 
            
            {
                name: 'Forensic Science',
                parent: '1',
                value: 3
            },

            {
                name: 'General Studies',
                parent: '1',
                value: 24
            },
             
            {
                name: 'Human Services',
                parent: '1',
                value: 6
            }, 
            {
                name: 'Integrated Studies',
                parent: '1',
                value: 1
            }, 
            {
                name: 'Kinesiology',
                parent: '1',
                value: 69
            },
            {
                name: 'Life Science',
                parent: '1',
                value: 1
            },
            {
                name: 'Medical Lab Science',
                parent: '1',
                value: 5
            },
            {
                name: 'Psychology',
                parent: '1',
                value: 47
            },


            {
                name: 'BMFT',
                parent: '2',
                value: 8
            }, 
            {
                name: 'Public Safety Management (PSM)',
                parent: '2',
                value: 125
            },
            {
                name: 'Education (MAT)',
                parent: '3',
                value: 42
            },
            {
                name: 'Management (MSM)',
                parent: '3',
                value: 14
            },
            {
                name: 'Psychology (MAP)',
                parent: '3',
                value: 8
            },
            {
                name: 'Public Administration (MPA)',
                parent: '3',
                value: 13
            },
            {
                name: 'Public Safety Administration (PSA)',
                parent: '3',
                value: 37
            },
            ]
        }],
        title: {
            text: ''
        },

        credits: {
        enabled: false
      }
    });
  } // end mounted()
//   beforeDestroy: function() {
//     this.target.destroy();
//   },
} // end export default

</script>
