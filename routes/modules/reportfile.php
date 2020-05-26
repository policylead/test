<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportFileController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportFileController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'report-files'], function () {
});

Route::apiResource('/report-files', 'ReportFileController', [
    'parameters' => [
        'report-files' => 'report_file',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
