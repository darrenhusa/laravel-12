<script setup lang="ts">
import MyComponent from '@/Components/MyComponent.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div id="app">
        Hello Vue 3
        <MyComponent />
    </div>

    <h1>2025-2026 CCSJ Factbook</h1>

    <!-- <li><a href="/section01-practice">Section 01 Practice - Has Calculated Percentages in HTML table example</a></li> -->
    <div class="px-4">
    <ul>
        <li class="text-2xl py-3">Enrollment</li>
        <ul class="py-3">
            <!-- <li><a href="/section01-enrollment">Archived Misc charts</a></li> -->
            <li><a href="/historical_headcounts">Historical CCSJ Headcounts</a></li>
            <li><a href="/test-chart">Historical CCSJ Headcounts with Different DataLabel Styles</a></li>
            <li><a href="/table-01">Table ?? - Total College</a></li>
            <li><a href="/table-02">Table ?? - Full-Time Undergraduates - First Majors - Traditional Programs</a></li>
            <li><a href="/table-03">Table ?? - Part-Time Undergraduates - First Majors - Traditional Programs</a></li>
            <li><a href="/table-04">Table ?? - Graduate Students by Major</a></li>
            <li><a href="/term_demographics">Demographics</a></li>
            <li><a href="/catholic-numbers">Numbers of Catholic</a></li>
            <li><a href="/catholic-percent">Percentage of Catholics</a></li>
        </ul>
            <li class="class=text-2xl">Retention Rates</li>
        <ul>
            <li><a href="/trad_retention">Full-time TRAD Retention Rates</a></li>
            <li><a href="/fall-to-spring-f1-trend">Fall-to-Spring FT, FT, F1 Retention Trends</a></li>
            <li><a href="/fall-to-fall-f1-trend">Fall-to-Fall FT, FT, F1 Retention Trends</a></li>
        </ul>
        <li class="text-2xl">High School GPAs</li>
        <ul>
            <li><a href="numbers_with_hs_gpa">Numbers with HS GPA</a></li>
            <li><a href="hs_gpa_averages">Average HS GPA</a></li>
            <li><a href="by_hs_gpa_range">Percent by HS GPA Ranges</a></li>
        </ul>
        <li class="text-2xl">Graduation Rates</li>
            <ul>
            <li><a href="/ccsj_grs">CCSJ Graduation Rates</a></li>
            <li><a href="/4yr_comp">4 Year Graduation Rate Comparisons</a></li>
            <li><a href="/6yr_comp">6 Year Graduation Rate Comparisons</a></li>
        </ul>

        <li class="text-2xl">Sankey Charts</li>
            <ul>
                <li><a href="/dept-sankey-chart">Dept Sankey Chart</a></li>
            </ul>

    </ul>
</div>    
</template>
