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

$factory->define(App\Models\ClientFeedReportAssociation::class, function (Faker $faker) {
    return [
        'title_template' => 'str',
        'description_template' => 'str',
        'link_template' => 'str',
        'author_template' => 'str',
        'pubdate_template' => 'str',
        'category_template' => 'str',
        'client_feed_id' => function () {
            return factory(\App\Models\ClientFeed::class)->create()->id;
        },
        'report_id' => function () {
            return factory(\App\Models\Report::class)->create()->id;
        },

    ];
});
