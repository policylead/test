<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SentEventAlertController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for SentEventAlertController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'sent-event-alerts'], function () {
});

Route::apiResource('/sent-event-alerts', 'SentEventAlertController', [
    'parameters' => [
        'sent-event-alerts' => 'sent_event_alert',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
