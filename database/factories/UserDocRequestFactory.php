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

$factory->define(App\Models\UserDocRequest::class, function (Faker $faker) {
    return [
        'ip' => 'str',
        'link' => 'str',
        'message' => 'text',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },

    ];
});
