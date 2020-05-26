<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DashboardsSettingController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DashboardsSettingController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'dashboards-settings'], function () {
});

Route::apiResource('/dashboards-settings', 'DashboardsSettingController', [
    'parameters' => [
        'dashboards-settings' => 'dashboards_setting',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
