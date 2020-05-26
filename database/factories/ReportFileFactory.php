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

$factory->define(App\Models\ReportFile::class, function (Faker $faker) {
    return [
        'type' => 'str',
        'title' => 'str',
        'author' => 'str',
        'fulltext' => 'text',
        'bill_keywords' => 'str',
        'related_records' => 'str',
        'email1' => 'str',
        'full_name' => 'str',
        'birth_date' => '2014-02-14',
        'profession' => 'str',
        'abbr' => 'str',
        'mailbox_street_address_parliament' => 'str',
        'zip_code_parliament' => 'str',
        'city_parliament' => 'str',
        'profile_picture' => 'str',
        'personal_site' => 'str',
        'political_bodies' => 'str',
        'employee_parliament' => 'str',
        'fraction' => 'str',
        'zip_code_wk' => 'str',
        'city_wk' => 'str',
        'biography' => 'text',
        'phone_code_parliament' => 'str',
        'phone_number_parliament' => 'str',
        'fax_number_parliament' => 'str',
        'text_section' => 'text',
        'abstract' => 'text',
        'provider' => 'str',
        'provider_group' => 'str',
        'doc_type' => 'str',
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },

    ];
});
