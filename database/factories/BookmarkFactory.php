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

$factory->define(App\Models\Bookmark::class, function (Faker $faker) {
    return [
        'color' => 'str',
        'document_type' => 'str',
        'search_keyword' => 'text',
        'snippet' => 'text',
        'reviewed' => '1',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },
        'document_id' => function () {
            return factory(\App\Models\Document::class)->create()->id;
        },
        'newsdesk_id' => function () {
            return factory(\App\Models\Dashboard::class)->create()->id;
        },

    ];
});
