<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| BookmarkController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for BookmarkController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'bookmarks'], function () {
});

Route::apiResource('/bookmarks', 'BookmarkController', [
    'parameters' => [
        'bookmarks' => 'bookmark',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
