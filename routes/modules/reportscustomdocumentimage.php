<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsCustomDocumentImageController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsCustomDocumentImageController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-custom-document-images'], function () {
});

Route::apiResource('/reports-custom-document-images', 'ReportsCustomDocumentImageController', [
    'parameters' => [
        'reports-custom-document-images' => 'reports_custom_document_image',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
