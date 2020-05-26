<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DoctypeController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DoctypeController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'doctypes'], function () {
});

Route::apiResource('/doctypes', 'DoctypeController', [
    'parameters' => [
        'doctypes' => 'doctype',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
