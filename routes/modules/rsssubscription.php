<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RssSubscriptionController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for RssSubscriptionController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'rss-subscriptions'], function () {
});

Route::apiResource('/rss-subscriptions', 'RssSubscriptionController', [
    'parameters' => [
        'rss-subscriptions' => 'rss_subscription',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
