<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DocumentCountController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DocumentCountController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'document-counts'], function () {
});

Route::apiResource('/document-counts', 'DocumentCountController', [
    'parameters' => [
        'document-counts' => 'document_count',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
