
<script setup>
import StackedColumnChartWithDataLabelsPercents from '@/Components/StackedColumnChartWithDataLabelsPercents.vue';

const props = defineProps({
    series: {
        // type: Array,
        type: Object,
        required: true
    },
    
});

</script>

<template>

    <div id="app">
   
        {{ props.series }}



    <h2>Figure ?? - Demographic Distribution (in %) - Fall 2025 Part-time Undergraduates</h2>
    <stacked-column-chart-with-data-labels-percents 
        :series='props.series'
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-chart-with-data-labels-percents>
       
    <!-- <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <th style="padding-right: 25px;"></th>                    
                    @for ($i = 0; $i < 4; $i++)
                        <th style="text-align: center; padding-right: 125px;">{{ $series['categories'][$i] }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for ($j = 0; $j < $length18+1; $j++)
                    <tr style="border-bottom: 1px solid gray; height: 20px;">
                        <th style="font-weight: bold; text-align: left; padding-right: 125px; ">{{ $labels[$j] }}</th>
                        @for ($i = 0; $i < 4; $i++)
                            <td style="text-align: center; padding-right: 100px;">{{ $numbers[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
        </div> -->

    </div>

</template>
