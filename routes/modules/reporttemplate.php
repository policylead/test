<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportTemplateController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportTemplateController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'report-templates'], function () {
    Route::get('{report_template}/reports', 'ReportTemplateController@searchReports')
        ->name('report-templates.searchReports');

    Route::get('{report_template}/newsletter-subscriptions', 'ReportTemplateController@searchNewsletterSubscriptions')
        ->name('report-templates.searchNewsletterSubscriptions');
});

Route::apiResource('/report-templates', 'ReportTemplateController', [
    'parameters' => [
        'report-templates' => 'report_template',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
