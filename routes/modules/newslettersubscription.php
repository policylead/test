<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| NewsletterSubscriptionController Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all routes for NewsletterSubscriptionController. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'newsletter-subscriptions'], function () {
});

Route::apiResource('/newsletter-subscriptions', 'NewsletterSubscriptionController', [
    'parameters' => [
        'newsletter-subscriptions' => 'newsletter_subscription',
    ],
    'only' => [
        'index','show','store','update','destroy'
    ]
]);
