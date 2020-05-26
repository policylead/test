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

$factory->define(App\Models\DashboardsKeyword::class, function (Faker $faker) {
    return [
        'keywords' => 'text',
        'filter' => 'text',
        'providers_count' => '314',
        'dashboard_id' => function () {
            return factory(\App\Models\Dashboard::class)->create()->id;
        },

    ];
});
