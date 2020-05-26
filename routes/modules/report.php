<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports'], function () {
    Route::get('{report}/client-feed-report-associations', 'ReportController@searchClientFeedReportAssociations')
        ->name('reports.searchClientFeedReportAssociations');

    Route::get('{report}/reports-email-clicks', 'ReportController@searchReportsEmailClicks')
        ->name('reports.searchReportsEmailClicks');

    Route::get('{report}/reports-scheduleds', 'ReportController@searchReportsScheduleds')
        ->name('reports.searchReportsScheduleds');

    Route::get('{report}/reports-versions', 'ReportController@searchReportsVersions')
        ->name('reports.searchReportsVersions');
});

Route::apiResource('/reports', 'ReportController', [
    'parameters' => [
        'reports' => 'report',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
