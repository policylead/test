<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FeedsManualController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for FeedsManualController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'feeds-manuals'], function () {
});

Route::apiResource('/feeds-manuals', 'FeedsManualController', [
    'parameters' => [
        'feeds-manuals' => 'feeds_manual',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
