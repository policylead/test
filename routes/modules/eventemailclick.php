<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| EventEmailClickController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for EventEmailClickController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'event-email-clicks'], function () {
});

Route::apiResource('/event-email-clicks', 'EventEmailClickController', [
    'parameters' => [
        'event-email-clicks' => 'event_email_click',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
