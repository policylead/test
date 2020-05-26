<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ClientFeedReportAssociationController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ClientFeedReportAssociationController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'client-feed-report-associations'], function () {
});

Route::apiResource('/client-feed-report-associations', 'ClientFeedReportAssociationController', [
    'parameters' => [
        'client-feed-report-associations' => 'client_feed_report_association',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
