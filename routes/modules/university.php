<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| UniversityController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for UniversityController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'universities'], function () {
});

Route::apiResource('/universities', 'UniversityController', [
    'parameters' => [
        'universities' => 'university',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
