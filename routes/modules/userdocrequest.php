<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| UserDocRequestController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for UserDocRequestController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user-doc-requests'], function () {
});

Route::apiResource('/user-doc-requests', 'UserDocRequestController', [
    'parameters' => [
        'user-doc-requests' => 'user_doc_request',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
