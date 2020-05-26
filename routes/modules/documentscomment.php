<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DocumentsCommentController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for DocumentsCommentController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'documents-comments'], function () {
});

Route::apiResource('/documents-comments', 'DocumentsCommentController', [
    'parameters' => [
        'documents-comments' => 'documents_comment',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
