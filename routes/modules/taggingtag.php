<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TaggingTagController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for TaggingTagController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'tagging-tags'], function () {
});

Route::apiResource('/tagging-tags', 'TaggingTagController', [
    'parameters' => [
        'tagging-tags' => 'tagging_tag',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
