<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ReportsMailingListController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ReportsMailingListController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'reports-mailing-lists'], function () {
    Route::get('{reports_mailing_list}/reports-scheduleds', 'ReportsMailingListController@searchReportsScheduleds')
        ->name('reports-mailing-lists.searchReportsScheduleds');

    Route::get('{reports_mailing_list}/newsletter-subscriptions', 'ReportsMailingListController@searchNewsletterSubscriptions')
        ->name('reports-mailing-lists.searchNewsletterSubscriptions');
});

Route::apiResource('/reports-mailing-lists', 'ReportsMailingListController', [
    'parameters' => [
        'reports-mailing-lists' => 'reports_mailing_list',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
