<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\RssSubscription::class, function (Faker $faker) {
    return [
        'first_name' => 'str',
        'last_name' => 'str',
        'email' => 'str',
        'offers' => '1',
        'hash' => 'str',
        'feed_id' => function () {
            return factory(\App\Models\Feed::class)->create()->id;
        },

    ];
});
