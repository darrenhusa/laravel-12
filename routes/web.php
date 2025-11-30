<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ChartDataController;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');


Route::get('/', function () {
    return Inertia::render('Index');
})->name('home');


// Route::get('/catholic-percent', function () {
//     return Inertia::render('enrollment.CatholcPercent');
// })->name('catholic-percent');


Route::get('/catholic-percent', [ChartDataController::class, 'showStackedPercentageColumnChartData']);

Route::get('/term_ft_demographics', [ChartDataController::class, 'showTermFullTimeDemographicData']);
Route::get('/term_pt_demographics', [ChartDataController::class, 'showTermPartTimeDemographicData']);