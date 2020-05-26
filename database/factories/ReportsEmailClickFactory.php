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

$factory->define(App\Models\ReportsEmailClick::class, function (Faker $faker) {
    return [
        'title' => 'str',
        'link' => 'str',
        'clicks' => '410',
        'date' => '252',
        'hash' => 'str',
        'chapter' => 'str',
        'report_id' => function () {
            return factory(\App\Models\Report::class)->create()->id;
        },

    ];
});
