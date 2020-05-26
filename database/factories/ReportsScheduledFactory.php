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

$factory->define(App\Models\ReportsScheduled::class, function (Faker $faker) {
    return [
        'emails' => 'text',
        'sender_email' => 'str',
        'custom_sender_email' => 'str',
        'custom_sender_name' => 'str',
        'subject' => 'str',
        'keywords' => 'text',
        'message' => 'text',
        'attach_pdf' => '1',
        'send_as_html' => '1',
        'sent' => '1',
        'created_at' => '1590511720',
        'lock_hash' => 'str',
        'report_id' => function () {
            return factory(\App\Models\Report::class)->create()->id;
        },
        'list_id' => function () {
            return factory(\App\Models\ReportsMailingList::class)->create()->id;
        },

    ];
});
