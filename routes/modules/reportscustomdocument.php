<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsCustomDocumentController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsCustomDocumentController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-custom-documents'], function () {
});

Route::apiResource('/reports-custom-documents', 'ReportsCustomDocumentController', [
    'parameters' => [
        'reports-custom-documents' => 'reports_custom_document',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
