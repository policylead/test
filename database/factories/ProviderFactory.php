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

$factory->define(App\Models\Provider::class, function (Faker $faker) {
    return [
        'name' => 'str',
        'provider_group_container' => 'str',
        'provider_group_container_index' => '457',
        'country' => 'str',
        'subcountry' => 'str',
        'city' => 'str',
        'feed_id' => '129',
        'social_media_type' => 'str',

    ];
});
