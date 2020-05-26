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

$factory->define(App\Models\ReportTemplate::class, function (Faker $faker) {
    return [
        'name' => 'str',
        'emails' => 'text',
        'chapters' => 'text',
        'title' => 'str',
        'author_name' => 'str',
        'company_name' => 'str',
        'enabled' => '331',
        'attach_pdf' => '223',
        'attach_html' => '877',
        'users' => 'text',
        'teams' => 'text',
        'logo' => 'image.jpg',

    ];
});
