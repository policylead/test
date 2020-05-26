<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsVersionController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsVersionController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-versions'], function () {
});

Route::apiResource('/reports-versions', 'ReportsVersionController', [
    'parameters' => [
        'reports-versions' => 'reports_version',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
