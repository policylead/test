<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SmsLinkController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for SmsLinkController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'sms-links'], function () {
});

Route::apiResource('/sms-links', 'SmsLinkController', [
    'parameters' => [
        'sms-links' => 'sms_link',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
