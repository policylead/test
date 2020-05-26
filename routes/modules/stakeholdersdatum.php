<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StakeholdersDatumController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for StakeholdersDatumController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'stakeholders-datas'], function () {
    Route::get('{stakeholders_datum}/stakeholders-lists', 'StakeholdersDatumController@searchStakeholdersLists')
        ->name('stakeholders-datas.searchStakeholdersLists');
});

Route::apiResource('/stakeholders-datas', 'StakeholdersDatumController', [
    'parameters' => [
        'stakeholders-datas' => 'stakeholders_datum',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
