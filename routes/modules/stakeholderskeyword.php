<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StakeholdersKeywordController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for StakeholdersKeywordController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'stakeholders-keywords'], function () {
});

Route::apiResource('/stakeholders-keywords', 'StakeholdersKeywordController', [
    'parameters' => [
        'stakeholders-keywords' => 'stakeholders_keyword',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
