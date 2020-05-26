<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RevisionController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for RevisionController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'revisions'], function () {
});

Route::apiResource('/revisions', 'RevisionController', [
    'parameters' => [
        'revisions' => 'revision',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
