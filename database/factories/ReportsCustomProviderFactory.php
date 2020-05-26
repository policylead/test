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

$factory->define(App\Models\ReportsCustomProvider::class, function (Faker $faker) {
    return [
        'provider_name' => 'str',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },
        'logo' => 'image.jpg',

    ];
});
