<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AlertController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for AlertController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'alerts'], function () {
});

Route::apiResource('/alerts', 'AlertController', [
    'parameters' => [
        'alerts' => 'alert',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
