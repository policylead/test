<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| SubjectAreaController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for SubjectAreaController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'subject-areas'], function () {
});

Route::apiResource('/subject-areas', 'SubjectAreaController', [
    'parameters' => [
        'subject-areas' => 'subject_area',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
