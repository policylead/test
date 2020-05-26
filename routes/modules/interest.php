<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| InterestController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for InterestController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'interests'], function () {
    Route::get('{interest}/users', 'InterestController@searchUsers')
        ->name('interests.searchUsers');
});

Route::apiResource('/interests', 'InterestController', [
    'parameters' => [
        'interests' => 'interest',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
