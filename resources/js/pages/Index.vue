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


    <!-- <li><a href="/section01-practice">Section 01 Practice - Has Calculated Percentages in HTML table example</a></li> -->
    <div class="p-4">
    <h1 class="text-3xl">2025-2026 CCSJ Factbook</h1>
    <ul>
        <li class="text-2xl">Enrollment</li>
        <ul>
            <!-- <li><a href="/section01-enrollment">Archived Misc charts</a></li> -->
            <li><Link href="/historical_headcounts">Historical CCSJ Headcounts</Link></li>
            <li><Link href="/test-chart">Historical CCSJ Headcounts with Different DataLabel Styles</Link></li>
            <li><Link href="/table-01">Table ?? - Total College</Link></li>
            <li><Link href="/table-02">Table ?? - Full-Time Undergraduates - First Majors - Traditional Programs</Link></li>
            <li><Link href="/table-03">Table ?? - Part-Time Undergraduates - First Majors - Traditional Programs</Link></li>
            <li><Link href="/table-04">Table ?? - Graduate Students by Major</Link></li>
            <li><Link href="/term_demographics">Demographics</Link></li>
            <li><Link href="/catholic-numbers">Numbers of Catholic</Link></li>
            <li><Link href="/catholic-percent">Percentage of Catholics</Link></li>
        </ul>
            <li class="text-2xl">Retention Rates</li>
        <ul>
            <li><Link href="/trad_retention">Full-time TRAD Retention Rates</Link></li>
            <li><Link href="/fall-to-spring-f1-trend">Fall-to-Spring FT, FT, F1 Retention Trends</Link></li>
            <li><Link href="/fall-to-fall-f1-trend">Fall-to-Fall FT, FT, F1 Retention Trends</Link></li>
        </ul>
        <li class="text-2xl">High School GPAs</li>
        <ul>
            <li><Link href="numbers_with_hs_gpa">Numbers with HS GPA</Link></li>
            <li><Link href="hs_gpa_averages">Average HS GPA</Link></li>
            <li><Link href="by_hs_gpa_range">Percent by HS GPA Ranges</Link></li>
        </ul>
        <li class="text-2xl">Graduation Rates</li>
            <ul>
            <li><Link href="/ccsj_grs">CCSJ Graduation Rates</Link></li>
            <li><Link href="/4yr_comp">4 Year Graduation Rate Comparisons</Link></li>
            <li><Link href="/6yr_comp">6 Year Graduation Rate Comparisons</Link></li>
        </ul>

        <li class="text-2xl">Sankey Charts</li>
            <ul>
                <li><Link href="/dept-sankey-chart">Dept Sankey Chart</Link></li>
            </ul>

    </ul>
</div>    
</template>
