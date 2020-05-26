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

$factory->define(App\Models\ReportsCustomDocument::class, function (Faker $faker) {
    return [
        'doc_title' => 'str',
        'pubdate_source' => '1590511719',
        'provider' => 'str',
        'author' => 'str',
        'teaser' => 'text',
        'fulltext' => 'text',
        'doc_link' => 'str',
        'public_link' => 'str',
        'article_image_description' => 'text',
        'article_image_size' => '880',
        'used' => '943',
        'fulltext_columns' => '441',
        'type' => 'str',
        'further_publications' => 'text',
        'deactivated_link' => '1',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },
        'provider_logo' => 'image.jpg',
        'article_image' => 'image.jpg',

    ];
});
