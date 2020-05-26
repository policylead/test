<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ContentPartnerController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for ContentPartnerController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'content-partners'], function () {
});

Route::apiResource('/content-partners', 'ContentPartnerController', [
    'parameters' => [
        'content-partners' => 'content_partner',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
