<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsScheduledController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsScheduledController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-scheduleds'], function () {
});

Route::apiResource('/reports-scheduleds', 'ReportsScheduledController', [
    'parameters' => [
        'reports-scheduleds' => 'reports_scheduled',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
