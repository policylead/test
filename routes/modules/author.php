<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AuthorController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for AuthorController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'authors'], function () {
    Route::get('{author}/author-documents', 'AuthorController@searchAuthorDocuments')
        ->name('authors.searchAuthorDocuments');

    Route::post('{author}/author-documents/{document}', 'AuthorController@attachAuthorDocument')
        ->name('authors.attachAuthorDocument');

    Route::delete('{author}/author-documents/{document}', 'AuthorController@detachAuthorDocument')
        ->name('authors.detachAuthorDocument');

    Route::get('{author}/reports', 'AuthorController@searchReports')
        ->name('authors.searchReports');

    Route::get('{author}/stakeholders-lists', 'AuthorController@searchStakeholdersLists')
        ->name('authors.searchStakeholdersLists');

    Route::get('{author}/person-documents', 'AuthorController@searchPersonDocuments')
        ->name('authors.searchPersonDocuments');

    Route::post('{author}/person-documents/{document}', 'AuthorController@attachPersonDocument')
        ->name('authors.attachPersonDocument');

    Route::delete('{author}/person-documents/{document}', 'AuthorController@detachPersonDocument')
        ->name('authors.detachPersonDocument');
});

Route::apiResource('/authors', 'AuthorController', [
    'parameters' => [
        'authors' => 'author',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
