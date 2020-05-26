<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| UserLimitController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for UserLimitController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user-limits'], function () {
});

Route::apiResource('/user-limits', 'UserLimitController', [
    'parameters' => [
        'user-limits' => 'user_limit',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
