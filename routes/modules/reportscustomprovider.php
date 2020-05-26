<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsCustomProviderController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsCustomProviderController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-custom-providers'], function () {
});

Route::apiResource('/reports-custom-providers', 'ReportsCustomProviderController', [
    'parameters' => [
        'reports-custom-providers' => 'reports_custom_provider',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
