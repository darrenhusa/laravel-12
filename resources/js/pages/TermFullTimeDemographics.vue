
<script setup>
import StackedColumnChartWithDataLabelsPercents from '@/Components/StackedColumnChartWithDataLabelsPercents.vue';

const props = defineProps({
    series: {
        // type: Array,
        type: Object,
        required: true
    },
    labels: {
        type: Array,
        required: true
    },
    numbers: {
        type: Array,
        required: true
    },
});

</script>

<template>

    <div id="app">
   
        <!-- {{ props.series }} -->
        <!-- <pre> -->
            {{ props.series.categories }}
            {{ props.numbers }}
            {{ props.labels }}
        <!-- </pre> -->

    <h2>Figure ?? - Demographic Distribution (in %) - Fall 2025 Full-time Undergraduates</h2>
    <stacked-column-chart-with-data-labels-percents 
        :series="props.series"
        :chart-width="1200"
        :chart-height="400">
    </stacked-column-chart-with-data-labels-percents>
       
    <div style="padding-top: 25px; padding-bottom: 25px; margin: 0px 0px 0px 0px;">
        <table style="border-collapse: collapse;">
            <thead style="border-top: 2px solid gray; border-bottom: 2px solid gray;">
                <tr>
                    <!-- <th style="padding-right: 50px;"></th>                    
                     -->
                        <th 
                            v-for="(row, rowIndex) in props.series['categories']"
                            :key="rowIndex"
                            style="padding-left: 350px; text-align: center; padding-right: 10px;"
                        >
                        {{ row }}
                    </th>
    
                </tr>
            </thead>
            <tbody>                
                <tr v-for="(row, rowIndex) in props.numbers"
                    :key="rowIndex"
                    style="border-bottom: 1px solid gray; height: 20px;"
                >
                {{ props.labels[rowIndex] }}
                <!-- <th style="font-weight: bold; text-align: left; padding-right: 125px; "></th> -->
                <td v-for="(cell, cellIndex) in row"
                    :key="cellIndex" 
                    style="text-align: center; padding-right: 10px;"
                >
                {{ cell }}
                </td>
                </tr>
            </tbody>
        </table>
        </div>

    </div>

</template>
