<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TeamsListController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for TeamsListController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'teams-lists'], function () {
    Route::get('{teams_list}/reports', 'TeamsListController@searchReports')
        ->name('teams-lists.searchReports');

    Route::get('{teams_list}/reports-custom-documents', 'TeamsListController@searchReportsCustomDocuments')
        ->name('teams-lists.searchReportsCustomDocuments');

    Route::get('{teams_list}/reports-custom-providers', 'TeamsListController@searchReportsCustomProviders')
        ->name('teams-lists.searchReportsCustomProviders');

    Route::get('{teams_list}/reports-mailing-lists', 'TeamsListController@searchReportsMailingLists')
        ->name('teams-lists.searchReportsMailingLists');

    Route::get('{teams_list}/reports-versions', 'TeamsListController@searchReportsVersions')
        ->name('teams-lists.searchReportsVersions');

    Route::get('{teams_list}/stakeholders', 'TeamsListController@searchStakeholders')
        ->name('teams-lists.searchStakeholders');

    Route::get('{teams_list}/users', 'TeamsListController@searchUsers')
        ->name('teams-lists.searchUsers');

    Route::get('{teams_list}/bookmarks', 'TeamsListController@searchBookmarks')
        ->name('teams-lists.searchBookmarks');

    Route::get('{teams_list}/content-partners', 'TeamsListController@searchContentPartners')
        ->name('teams-lists.searchContentPartners');

    Route::get('{teams_list}/dashboards', 'TeamsListController@searchDashboards')
        ->name('teams-lists.searchDashboards');

    Route::get('{teams_list}/documents-comments', 'TeamsListController@searchDocumentsComments')
        ->name('teams-lists.searchDocumentsComments');
});

Route::apiResource('/teams-lists', 'TeamsListController', [
    'parameters' => [
        'teams-lists' => 'teams_list',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
