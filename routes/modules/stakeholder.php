<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StakeholderController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for StakeholderController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'stakeholders'], function () {
    Route::get('{stakeholder}/stakeholders-lists', 'StakeholderController@searchStakeholdersList')
        ->name('stakeholders.searchStakeholdersList');

    Route::get('{stakeholder}/keywords', 'StakeholderController@searchKeywords')
        ->name('stakeholders.searchKeywords');
});

Route::apiResource('/stakeholders', 'StakeholderController', [
    'parameters' => [
        'stakeholders' => 'stakeholder',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
