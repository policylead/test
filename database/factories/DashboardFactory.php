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

$factory->define(App\Models\Dashboard::class, function (Faker $faker) {
    return [
        'name' => 'str',
        'email' => '1',
        'active' => '1',
        'delay_time' => '1590511717',
        'last_sent' => '1590511717',
        'keywords' => 'text',
        'first_alert' => '749',
        'second_alert' => '347',
        'alert_frequency' => 'str',
        'alert_weekday' => 'str',
        'edited_by' => '169',
        'locked_time' => '2005-09-06 03:37:58',
        'locked_by' => '794',
        'dashboard_type' => 'str',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },

    ];
});
