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

$factory->define(App\Models\Report::class, function (Faker $faker) {
    return [
        'title' => 'str',
        'layout' => 'str',
        'logo' => 'str',
        'author' => 'str',
        'company_name' => 'str',
        'published_at' => '1590511719',
        'content' => 'text',
        'emails' => 'text',
        'attach_pdf' => '18',
        'attach_html' => '328',
        'last_edited' => '2010-03-26 02:32:41',
        'report_image_description' => 'str',
        'published' => '1',
        'sent_at' => '1590511719',
        'template' => 'str',
        'template_options' => 'text',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'author_id' => function () {
            return factory(\App\Models\Author::class)->create()->id;
        },
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },
        'report_template_id' => function () {
            return factory(\App\Models\ReportTemplate::class)->create()->id;
        },

    ];
});
