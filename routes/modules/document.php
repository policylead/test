<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DocumentController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DocumentController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'documents'], function () {
    Route::get('{document}/persons', 'DocumentController@searchPersons')
        ->name('documents.searchPersons');

    Route::post('{document}/persons/{author}', 'DocumentController@attachPerson')
        ->name('documents.attachPerson');

    Route::delete('{document}/persons/{author}', 'DocumentController@detachPerson')
        ->name('documents.detachPerson');

    Route::get('{document}/reports-custom-document-images', 'DocumentController@searchReportsCustomDocumentImages')
        ->name('documents.searchReportsCustomDocumentImages');

    Route::get('{document}/bookmarks', 'DocumentController@searchBookmarks')
        ->name('documents.searchBookmarks');

    Route::get('{document}/document-counts', 'DocumentController@searchDocumentCounts')
        ->name('documents.searchDocumentCounts');

    Route::get('{document}/documents-comments', 'DocumentController@searchDocumentsComments')
        ->name('documents.searchDocumentsComments');

    Route::get('{document}/authors', 'DocumentController@searchAuthors')
        ->name('documents.searchAuthors');

    Route::post('{document}/authors/{author}', 'DocumentController@attachAuthor')
        ->name('documents.attachAuthor');

    Route::delete('{document}/authors/{author}', 'DocumentController@detachAuthor')
        ->name('documents.detachAuthor');
});

Route::apiResource('/documents', 'DocumentController', [
    'parameters' => [
        'documents' => 'document',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
