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

$factory->define(App\Models\Feed::class, function (Faker $faker) {
    return [
        'status' => '445',
        'health' => 'str',
        'manual' => '553',
        'location_auto_find' => '171',
        'goose' => '256',
        'documents_count' => '942',
        'last_document' => '1590511718',
        'source_link' => 'text',
        'use_html' => '691',
        'list_css' => 'str',
        'link_css' => 'str',
        'title_css' => 'str',
        'title_attr' => 'str',
        'date_css' => 'str',
        'date_attr' => 'str',
        'author' => 'str',
        'location' => 'str',
        'country' => 'str',
        'subcountry' => 'str',
        'city' => 'str',
        'provider_group' => 'str',
        'doc_type' => 'str',
        'title' => 'str',
        'pub_date' => 'str',
        'fulltext_mode' => 'str',
        'fulltext_source_link' => 'str',
        'event_field' => 'str',
        'fulltext_xpath' => 'str',
        'fulltext_field' => 'str',
        'selector' => 'str',
        'source_keywords' => 'str',
        'last_scraped' => '1590511718',
        'description' => 'text',
        'special_encoding' => '577',
        'top_source' => '413',
        'lock_hash' => 'str',
        'scrape_all' => '522',
        'news_type' => 'str',
        'created_by' => '48',
        'content_partner' => '1',
        'scraping_mode' => 'str',
        'options' => 'text',
        'first_document' => 'text',
        'provider_id' => function () {
            return factory(\App\Models\Provider::class)->create()->id;
        },

    ];
});
