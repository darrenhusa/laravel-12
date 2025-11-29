
<script setup>
import StackedPercentageColumnChart from '@/Components/StackedPercentageColumnChart.vue';
// import { defineProps } from 'vue';

const props = defineProps({
    series: {
        // type: Array,
        type: Object,
        required: true
    },
});

// const chartSeries = ref([]); // Initialize as an empty array
</script>

<template>

    <div id="app">
   
        {{ props.series }}

        <h2>Figure ?? - Percentages of Catholic Traditional Students</h2>
        <stacked-percentage-column-chart 
            :series="props.series"
            :chart-width="1200"
            :chart-height="600">
        </stacked-percentage-column-chart>
        
    </div>

</template>
