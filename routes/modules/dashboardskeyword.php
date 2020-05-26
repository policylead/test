<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DashboardsKeywordController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DashboardsKeywordController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'dashboards-keywords'], function () {
});

Route::apiResource('/dashboards-keywords', 'DashboardsKeywordController', [
    'parameters' => [
        'dashboards-keywords' => 'dashboards_keyword',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
