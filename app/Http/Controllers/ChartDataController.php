<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\MyHelper;
use Inertia\Inertia; 

class ChartDataController extends Controller
{
     
    public function showStackedPercentageColumnChartData()
    {
        
        // specify data
        $catholic = ['label' => 'Catholic', 'values' => [174, 162, 105, 73, 47]];
    
        $non_catholic_data = [
            ['label' => 'Baptist', 'values' => [0, 0, 6, 4, 4]],
            ['label' => 'Christian', 'values' => [2, 7, 30, 35, 14]],
            ['label' => 'Lutheran', 'values' => [0, 0, 4, 2, 2]],
            ['label' => 'None', 'values' => [1, 2, 18, 19, 13]],
            ['label' => 'Other', 'values' => [215, 235, 117, 81, 67]]
        ];
    
        $unknown = ['label' => 'Unknown', 'values' => [3, 33, 148, 176, 282]];

        $non_catholic_totals = calculateElementSum($non_catholic_data);

        $data = [
                ['label' => 'Catholic', 'color' => '#8d230f', 'values' => $catholic['values']],
                ['label' => 'Non-Catholic', 'color' => '#217ca3', 'values' => $non_catholic_totals],
                ['label' => 'Unknown', 'color' => '', 'values' => $unknown['values']],
        ];
        
        $series = [
            'title' => "Percent of Catholic Traditional Students",
            'subtitle' => "",
            'x_axis' => '',
            'y_axis_visible' => false,
            'y_axis' => 'Percentage (%)',
            'y_axis_max' => 100,
            'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025', ],
            'data' => $data,
        ];

        // return view('enrollment.catholic-percent', [
        //     'series' => $series,
        // ]);

        return Inertia::render('CatholicPercent', [
            'series' => $series,
            // 'series' => json_encode($series),
        ]);

    }

    public function showColumnChartData()
    {
        
        // specify data
        $catholic = ['label' => 'Catholic', 'values' => [174, 162, 105, 73, 47]];
    
        $non_catholic_data = [
            ['label' => 'Baptist', 'values' => [0, 0, 6, 4, 4]],
            ['label' => 'Christian', 'values' => [2, 7, 30, 35, 14]],
            ['label' => 'Lutheran', 'values' => [0, 0, 4, 2, 2]],
            ['label' => 'None', 'values' => [1, 2, 18, 19, 13]],
            ['label' => 'Other', 'values' => [215, 235, 117, 81, 67]]
        ];
    
        $unknown = ['label' => 'Unknown', 'values' => [3, 33, 148, 176, 282]];

        $non_catholic_totals = calculate_element_sum($non_catholic_data);
        
        $grand_total = [];

        // Method 1: Using a loop (most straightforward for element-by-element sum)
        for ($i = 0; $i < count($catholic['values']); $i++) {
            $grand_total[$i] = $catholic['values'][$i] + $non_catholic_totals[$i] + $unknown['values'][$i];
        }
        // only want max value relative to one dataset since the columns are side-by-side
        $max_values = [];
        $max_values[] = max($catholic['values']);
        $max_values[] = max($non_catholic_totals);
        $max_values[] = max($unknown['values']);

        $y_max = max($max_values);

        // echo "Grand Totals: ";
        // print_r($grand_total);

        $data = [
                ['label' => 'Catholic', 'color' => '#8d230f', 'values' => $catholic['values']],
                ['label' => 'Non-Catholic', 'color' => '#217ca3', 'values' => $non_catholic_totals],
                ['label' => 'Unknown', 'color' => '', 'values' => $unknown['values']],
        ];
        
        $series = [
            'title' => "Numbers of Catholic Traditional Students",
            'subtitle' => "",
            'x_axis' => '',
            'y_axis_visible' => true,
            // values for Percentage charts provided $data is calculated as the percentages!!!
            // 'y_axis' => 'Percentage (%)',
            // 'y_value_chart_units' => '%',
            // 'y_axis_max' => 100,
            'y_axis' => '',
            'y_value_chart_units' => null,
            'y_axis_max' => $y_max,
            'categories' => ['Fall 2021', 'Fall 2022', 'Fall 2023', 'Fall 2024', 'Fall 2025', ],
            'data' => $data,
        ];

        return view('enrollment.catholic-numbers', [
            'series' => $series,
        ]);


    }

    public function showTermFullTimeDemographicData()
    {
        $data_ft = [
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [22, 17, 75, 114]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [32, 12, 72, 116]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [8, 5, 12, 25]],
             ['label' => 'White', 'color' => 'purple', 'values' => [45, 9, 71, 125]],
             ['label' => 'Unknown', 'color' => '', 'values' => [39, 0, 1, 40]],
        ];

        $length_ft = count($data_ft);
        $total_ft = [];

        for ($i = 0; $i < 4; $i++) {
            $sum = 0;
            for ($j = 0; $j < $length_ft; $j++) {
                $sum += $data_ft[$j]['values'][$i];
            }
            array_push($total_ft, $sum);
        }

        $labels_ft = [];
        $numbers_ft = [];

        for ($j = 0; $j < $length_ft; $j++) {
            array_push($labels_ft, $data_ft[$j]['label']);
            array_push($numbers_ft, $data_ft[$j]['values']);
        }
        array_push($labels_ft, 'Grand Total');
        array_push($numbers_ft, $total_ft);

        $series_ft = [
            'title' => 'Demographic Distribution',
            'subtitle' => '(Fall 2025 Full-time Undergraduates)',
            'categories' => ['First-time Students', 'Transfer Students', 'Continuing/Returning Students', 'All FT Undergrads'],
            'data' => $data_ft,
        ];

        return Inertia::render('TermFullTimeDemographics', [
            'series' => $series_ft,
            'labels' => $labels_ft,
            'numbers' => $numbers_ft,
        ]);

    }


    public function showTermPartTimeDemographicData()
    {
        $data_pt = [
             ['label' => 'Black or African American', 'color' => '#217ca3', 'values' => [0, 0, 5, 5]],
             ['label' => 'Hispanics of any race', 'color' => '#8d230f', 'values' => [0, 0, 2, 2]],
             ['label' => 'Other', 'color' => '#50CB93', 'values' => [0, 0, 0, 0]],
             ['label' => 'White', 'color' => 'purple', 'values' => [0, 0, 2, 2]],
             ['label' => 'Unknown', 'color' => '', 'values' => [0, 0, 0, 0]],
        ];

        $length_pt = count($data_pt);
        $total_pt = [];

        for ($i = 0; $i < 4; $i++) {
            $sum = 0;
            for ($j = 0; $j < $length_pt; $j++) {
                $sum += $data_pt[$j]['values'][$i];
            }
            array_push($total_pt, $sum);
        }

        $labels_pt = [];
        $numbers_pt = [];

        for ($j = 0; $j < $length_pt; $j++) {
            array_push($labels_pt, $data_pt[$j]['label']);
            array_push($numbers_pt, $data_pt[$j]['values']);
        }
        array_push($labels_pt, 'Grand Total');
        array_push($numbers_pt, $total_pt);

        $series_pt = [
            'title' => 'Demographic Distribution',
            'subtitle' => '(Fall 2025 Part-time Undergraduates)',
            'categories' => ['First-time Students', 'Transfer Students', 'Continuing/Returning Students', 'All PT Undergrads'],
            'data' => $data_pt,
        ];

        return Inertia::render('TermPartTimeDemographics', [
            'series' => $series_pt,
        ]);


    }
}
