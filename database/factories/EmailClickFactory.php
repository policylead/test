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

$factory->define(App\Models\EmailClick::class, function (Faker $faker) {
    return [
        'client_ip' => 'str',
        'session_id' => 'str',
        'sent_email_alert_id' => '931',
        'url' => 'str',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },

    ];
});
