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

$factory->define(App\Models\FacebookAccount::class, function (Faker $faker) {
    return [
        'name' => 'str',
        'facebookId' => 'str',
        'last_check' => '1984-02-29 17:29:22',
        'facebook_account_photo' => 'text',
        'type' => 'str',
        'country' => 'str',
        'subcountry' => 'str',
        'city' => 'str',
        'full_name' => 'str',

    ];
});
