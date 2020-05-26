<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FeedsDuplicateController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for FeedsDuplicateController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'feeds-duplicates'], function () {
});

Route::apiResource('/feeds-duplicates', 'FeedsDuplicateController', [
    'parameters' => [
        'feeds-duplicates' => 'feeds_duplicate',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
