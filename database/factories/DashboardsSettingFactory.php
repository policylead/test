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

$factory->define(App\Models\DashboardsSetting::class, function (Faker $faker) {
    return [
        'active' => '460',
        'first_alert' => '617',
        'second_alert' => '255',
        'delay_time' => '1590511717',
        'last_sent' => '1590511717',
        'alert_frequency' => 'str',
        'alert_weekday' => 'str',
        'channels' => 'str',
        'push_alert' => '1',
        'push_monday' => '1',
        'push_tuesday' => '1',
        'push_wednesday' => '1',
        'push_thursday' => '1',
        'push_friday' => '1',
        'push_saturday' => '1',
        'push_sunday' => '1',
        'push_from' => '460',
        'push_to' => '699',
        'push_type' => 'str',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'dashboard_id' => function () {
            return factory(\App\Models\Dashboard::class)->create()->id;
        },

    ];
});
