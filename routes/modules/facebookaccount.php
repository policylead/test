<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FacebookAccountController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for FacebookAccountController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'facebook-accounts'], function () {
});

Route::apiResource('/facebook-accounts', 'FacebookAccountController', [
    'parameters' => [
        'facebook-accounts' => 'facebook_account',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
