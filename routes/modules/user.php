<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| UserController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for UserController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users'], function () {
    Route::get('me', 'UserController@me')
        ->name('users.me');

    Route::post('me/password', 'UserController@updatePassword')
        ->name('users.updatePassword');

    Route::get('client-feeds', 'UserController@searchClientFeeds')
        ->name('users.searchClientFeeds');

    Route::get('user-limits', 'UserController@searchUserLimits')
        ->name('users.searchUserLimits');

    Route::get('report-files', 'UserController@searchReportFiles')
        ->name('users.searchReportFiles');

    Route::get('reports', 'UserController@searchReports')
        ->name('users.searchReports');

    Route::get('reports-custom-documents', 'UserController@searchReportsCustomDocuments')
        ->name('users.searchReportsCustomDocuments');

    Route::get('reports-custom-providers', 'UserController@searchReportsCustomProviders')
        ->name('users.searchReportsCustomProviders');

    Route::get('reports-mailing-lists', 'UserController@searchReportsMailingLists')
        ->name('users.searchReportsMailingLists');

    Route::get('revisions', 'UserController@searchRevisions')
        ->name('users.searchRevisions');

    Route::get('sent-event-alerts', 'UserController@searchSentEventAlerts')
        ->name('users.searchSentEventAlerts');

    Route::get('stakeholders', 'UserController@searchStakeholders')
        ->name('users.searchStakeholders');

    Route::get('user-doc-requests', 'UserController@searchUserDocRequests')
        ->name('users.searchUserDocRequests');

    Route::get('alerts', 'UserController@searchAlerts')
        ->name('users.searchAlerts');

    Route::get('billings', 'UserController@searchBillings')
        ->name('users.searchBillings');

    Route::get('bookmarks', 'UserController@searchBookmarks')
        ->name('users.searchBookmarks');

    Route::get('content-partners', 'UserController@searchContentPartners')
        ->name('users.searchContentPartners');

    Route::get('dashboards', 'UserController@searchDashboards')
        ->name('users.searchDashboards');

    Route::get('dashboards-settings', 'UserController@searchDashboardsSettings')
        ->name('users.searchDashboardsSettings');

    Route::get('document-counts', 'UserController@searchDocumentCounts')
        ->name('users.searchDocumentCounts');

    Route::get('documents-comments', 'UserController@searchDocumentsComments')
        ->name('users.searchDocumentsComments');

    Route::get('email-clicks', 'UserController@searchEmailClicks')
        ->name('users.searchEmailClicks');

    Route::get('event-email-clicks', 'UserController@searchEventEmailClicks')
        ->name('users.searchEventEmailClicks');

    Route::get('interests', 'UserController@searchInterests')
        ->name('users.searchInterests');

    Route::post('interests/{interest}', 'UserController@attachInterest')
        ->name('users.attachInterest');

    Route::delete('interests/{interest}', 'UserController@detachInterest')
        ->name('users.detachInterest');
});

Route::apiResource('/users', 'UserController', [
    'parameters' => [
        'users' => 'user',
    ],
    'only' => [
        'store','update'
    ]
]);
