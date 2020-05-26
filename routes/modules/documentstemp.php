<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DocumentsTempController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DocumentsTempController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'documents-temps'], function () {
});

Route::apiResource('/documents-temps', 'DocumentsTempController', [
    'parameters' => [
        'documents-temps' => 'documents_temp',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
