<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SentEmailAlertController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for SentEmailAlertController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'sent-email-alerts'], function () {
    Route::get('{sent_email_alert}/tagging-taggeds', 'SentEmailAlertController@searchTaggingTaggeds')
        ->name('sent-email-alerts.searchTaggingTaggeds');
});

Route::apiResource('/sent-email-alerts', 'SentEmailAlertController', [
    'parameters' => [
        'sent-email-alerts' => 'sent_email_alert',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
