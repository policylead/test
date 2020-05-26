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

$factory->define(App\Models\Document::class, function (Faker $faker) {
    return [
        'pubdate_source' => '1979-10-09 02:36:11',
        'doc_title' => 'str',
        'record_nr' => 'str',
        'doc_link' => 'str',
        'doc_id' => 'str',
        'feed_id' => '347',
        'fulltext' => 'text',
        'ui' => '46998',
        'location' => 'str',
        'country' => 'str',
        'subcountry' => 'str',
        'city' => 'str',
        'doc_type' => 'str',
        'author_person' => 'text',
        'related_records' => 'text',
        'bill_keywords' => 'text',
        'related_people' => 'text',
        'status' => 'str',
        'author_group' => 'text',
        'event_time' => 'str',
        'source_keywords' => 'str',
        'publish_status' => '906',
        'pdf_local_path' => 'str',
        'people_tags' => 'text',
        'update_link' => 'str',
        'additional_content_link' => 'str',
        'document_image_link' => 'str',
        'policylead_doc_type' => 'str',
        'origin' => 'str',
        'provider_group' => 'str',
        'title_opennlp' => 'str',
        'language' => 'str',
        'author_list' => 'str',
        'related_people_list' => 'text',
        'processed' => '48',
        'provider_group_container' => 'str',
        'retweets' => '338',
        'favorites' => '754',
        'twitter_account_photo' => 'str',
        'authors_added' => '1',
        'ocr_needed' => '1',
        'run' => 'str',
        'distribution' => 'str',
        'fulltext_raw' => 'text',
        'social_media_type' => 'str',
        'users' => 'str',
        'index_ready' => '457',
        'provider_id' => function () {
            return factory(\App\Models\Provider::class)->create()->id;
        },

    ];
});
