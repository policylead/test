<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StockController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for StockController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'stocks'], function () {
});

Route::apiResource('/stocks', 'StockController', [
    'parameters' => [
        'stocks' => 'stock',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
