<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ProviderController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ProviderController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'providers'], function () {
    Route::get('{provider}/documents', 'ProviderController@searchDocuments')
        ->name('providers.searchDocuments');

    Route::get('{provider}/feeds', 'ProviderController@searchFeeds')
        ->name('providers.searchFeeds');
});

Route::apiResource('/providers', 'ProviderController', [
    'parameters' => [
        'providers' => 'provider',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
