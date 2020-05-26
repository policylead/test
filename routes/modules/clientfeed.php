<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ClientFeedController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ClientFeedController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'client-feeds'], function () {
    Route::get('{client_feed}/client-feed-report-associations', 'ClientFeedController@searchClientFeedReportAssociations')
        ->name('client-feeds.searchClientFeedReportAssociations');
});

Route::apiResource('/client-feeds', 'ClientFeedController', [
    'parameters' => [
        'client-feeds' => 'client_feed',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
