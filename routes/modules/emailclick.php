<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| EmailClickController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for EmailClickController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'email-clicks'], function () {
});

Route::apiResource('/email-clicks', 'EmailClickController', [
    'parameters' => [
        'email-clicks' => 'email_click',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
