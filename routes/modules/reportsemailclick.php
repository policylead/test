<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsEmailClickController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsEmailClickController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-email-clicks'], function () {
});

Route::apiResource('/reports-email-clicks', 'ReportsEmailClickController', [
    'parameters' => [
        'reports-email-clicks' => 'reports_email_click',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
