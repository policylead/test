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

$factory->define(App\Models\TwitterAccount::class, function (Faker $faker) {
    return [
        'name' => 'str',
        'twitterId' => '306',
        'twitts_amount' => '85',
        'last_check' => '1982-02-01 09:27:13',
        'timeline_check' => '1',
        'photo_url' => 'text',
        'type' => 'str',
        'country' => 'str',
        'subcountry' => 'str',
        'city' => 'str',
        'role' => 'str',
        'full_name' => 'str',

    ];
});
