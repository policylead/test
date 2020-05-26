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

$factory->define(App\Models\SentEmailAlert::class, function (Faker $faker) {
    return [
        'days' => '930',
        'num_docs' => '800',
        'sent' => '1',
        'error' => 'str',
        'dashboard_id' => function () {
            return factory(\App\Models\Dashboard::class)->create()->id;
        },

    ];
});
