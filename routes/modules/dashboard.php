<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DashboardController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DashboardController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'dashboards'], function () {
    Route::get('{dashboard}/sent-email-alerts', 'DashboardController@searchSentEmailAlerts')
        ->name('dashboards.searchSentEmailAlerts');

    Route::get('{dashboard}/bookmarks', 'DashboardController@searchBookmarks')
        ->name('dashboards.searchBookmarks');

    Route::get('{dashboard}/dashboards-keywords', 'DashboardController@searchDashboardsKeywords')
        ->name('dashboards.searchDashboardsKeywords');

    Route::get('{dashboard}/dashboards-settings', 'DashboardController@searchDashboardsSettings')
        ->name('dashboards.searchDashboardsSettings');
});

Route::apiResource('/dashboards', 'DashboardController', [
    'parameters' => [
        'dashboards' => 'dashboard',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
