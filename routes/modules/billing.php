<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| BillingController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for BillingController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'billings'], function () {
});

Route::apiResource('/billings', 'BillingController', [
    'parameters' => [
        'billings' => 'billing',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
