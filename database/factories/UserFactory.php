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

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',

        'first_name' => 'str',
        'remember_token' => 'str',
        'last_name' => 'str',
        'full_name' => 'str',
        'role' => '957',
        'agency_name' => 'str',
        'office_name' => 'str',
        'press_releases' => 'str',
        'homepage' => 'str',
        'university_id' => 'str',
        'subject_area_id' => 'str',
        'blog' => 'str',
        'employee' => 'str',
        'tel' => 'str',
        'terms_and_conditions' => 'str',
        'verified' => '1',
        'verification_token' => 'str',
        'lead_type' => 'str',
        'profile_photo' => 'str',
        'student_card' => 'str',
        'test_period' => 'str',
        'client_status' => 'str',
        'data_filled' => '1',
        'approved' => '1',
        'alert_providers' => 'text',
        'alert_frequency' => 'str',
        'alert_weekday' => 'str',
        'blocked_documents' => 'text',
        'first_alert' => '1',
        'second_alert' => '1',
        'newsdesk_provider_filter' => '1',
        'personal_email_for_reports' => '110',
        'settings_1to1_support' => '1',
        'settings_newsdesk_support' => '1',
        'settings_click_tracking_reports' => '1',
        'settings_click_tracking_other' => '1',
        'settings_newsletter_features' => '1',
        'settings_newsletter_expired' => '1',
        'settings_reconnect' => '1',
        'custom_sender_email' => 'str',
        'custom_sender_name' => 'str',
        'client_feeds_enabled' => '1',
        'language' => 'str',
        'salutation' => 'str',
        'team_id' => function () {
            return factory(\App\Models\TeamsList::class)->create()->id;
        },

    ];
});
