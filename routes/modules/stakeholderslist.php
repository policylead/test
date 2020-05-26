<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StakeholdersListController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for StakeholdersListController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'stakeholders-lists'], function () {
});

Route::apiResource('/stakeholders-lists', 'StakeholdersListController', [
    'parameters' => [
        'stakeholders-lists' => 'stakeholders_list',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
