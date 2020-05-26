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

$factory->define(App\Models\StakeholdersDatum::class, function (Faker $faker) {
    return [
        'description' => 'str',
        'location' => 'str',
        'abbr' => 'str',
        'facebook' => 'str',
        'twitter' => 'str',
        'political_bodies' => 'str',
        'parliament' => 'str',
        'alias' => 'str',
        'authority' => 'str',
        'use_alias_only' => '1',
        'name' => 'str',
        'backup_picture' => 'image.jpg',

    ];
});
