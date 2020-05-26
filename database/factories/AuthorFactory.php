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

$factory->define(App\Models\Author::class, function (Faker $faker) {
    return [
        'marital_status_title' => 'str',
        'first_name' => 'str',
        'full_name' => 'str',
        'last_name' => 'str',
        'title' => 'str',
        'parliament' => 'str',
        'abbr' => 'str',
        'sex' => 'str',
        'profile_photo' => 'str',
        'fraction' => 'str',
        'biography' => 'text',
        'profession' => 'str',
        'birthplace' => 'str',
        'birth_date' => '1978-05-14',
        'children' => 'str',
        'denomination' => 'str',
        'marital_status' => 'str',
        'email1' => 'str',
        'email2' => 'str',
        'personal_site' => 'str',
        'political_bodies' => 'text',
        'parliament_membership' => 'str',
        'election_result' => 'str',
        'federal_state' => 'str',
        'official_function' => 'str',
        'parliament_2' => 'text',
        'additional_address_parliament' => 'str',
        'mailbox_street_address_parliament' => 'str',
        'zip_code_parliament' => 'str',
        'city_parliament' => 'str',
        'eu_member_country_parliament' => 'str',
        'phone_code_parliament' => 'str',
        'phone_number_parliament' => 'str',
        'fax_code_number_parliament' => 'str',
        'fax_number_parliament' => 'str',
        'ministry_request_reg' => 'str',
        'additional_address_reg' => 'str',
        'mailbox_street_address_reg' => 'str',
        'zip_code_reg' => 'str',
        'city_reg' => 'str',
        'eu_member_country_reg' => 'str',
        'phone_code_reg' => 'str',
        'phone_number_reg' => 'str',
        'fax_code_number_reg' => 'str',
        'fax_number_reg' => 'str',
        'constituency_private' => 'str',
        'additional_address_wk' => 'str',
        'mailbox_street_address_wk' => 'str',
        'zip_code_wk' => 'str',
        'city_wk' => 'str',
        'eu_member_country_wk' => 'str',
        'phone_code_wk' => 'str',
        'phone_number_wk' => 'str',
        'fax_code_number_wk' => 'str',
        'fax_number_wk' => 'str',
        'employ_parliament' => 'text',
        'employ_reg' => 'text',
        'employ_wk' => 'text',
        'e_n_g_l_a_n_r_e_d_e' => 'str',
        'networks' => 'str',
        'twitter' => 'str',
        'facebook' => 'str',
        'period' => 'str',
        'qualification' => 'str',
        'election_list' => 'str',
        'avatar' => 'str',
        'twitter_avatar' => 'str',
        'facebook_avatar' => 'str',
        'last_check' => '1590511717',
        'institution' => 'str',

    ];
});
