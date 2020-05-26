<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FeedController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for FeedController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'feeds'], function () {
    Route::get('{feed}/rss-subscriptions', 'FeedController@searchRssSubscriptions')
        ->name('feeds.searchRssSubscriptions');

    Route::get('{feed}/feeds-manuals', 'FeedController@searchFeedsManuals')
        ->name('feeds.searchFeedsManuals');
});

Route::apiResource('/feeds', 'FeedController', [
    'parameters' => [
        'feeds' => 'feed',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
