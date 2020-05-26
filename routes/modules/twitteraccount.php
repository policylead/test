<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TwitterAccountController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for TwitterAccountController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'twitter-accounts'], function () {
});

Route::apiResource('/twitter-accounts', 'TwitterAccountController', [
    'parameters' => [
        'twitter-accounts' => 'twitter_account',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
