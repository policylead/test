<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TaggingTaggedController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for TaggingTaggedController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'tagging-taggeds'], function () {
});

Route::apiResource('/tagging-taggeds', 'TaggingTaggedController', [
    'parameters' => [
        'tagging-taggeds' => 'tagging_tagged',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
