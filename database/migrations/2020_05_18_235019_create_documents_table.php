<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('pubdate_source');
            $table->string('doc_title', 1000);
            $table->string('record_nr', 255);
            $table->string('doc_link', 255);
            $table->string('doc_id', 255);
            $table->integer('feed_id');
            $table->longText('fulltext');
            $table->bigInteger('ui')->unsigned('1');
            $table->string('location', 255)->nullable('1');
            $table->string('country', 255)->nullable('1');
            $table->string('subcountry', 255)->nullable('1');
            $table->string('city', 255)->nullable('1');
            $table->string('doc_type', 255);
            $table->longText('author_person');
            $table->longText('related_records');
            $table->longText('bill_keywords');
            $table->longText('related_people');
            $table->string('status', 255);
            $table->longText('author_group');
            $table->string('event_time', 255)->nullable('1');
            $table->string('source_keywords', 255)->nullable('1');
            $table->integer('publish_status');
            $table->string('pdf_local_path', 255)->nullable('1');
            $table->text('people_tags');
            $table->string('update_link', 255);
            $table->string('additional_content_link', 255)->nullable('1');
            $table->string('document_image_link', 255)->nullable('1');
            $table->string('policylead_doc_type', 255)->nullable('1');
            $table->string('origin', 255);
            $table->string('provider_group', 255);
            $table->string('title_opennlp', 255)->nullable('1');
            $table->string('language', 255)->nullable('1');
            $table->string('author_list', 255);
            $table->text('related_people_list');
            $table->integer('processed');
            $table->string('provider_group_container', 255);
            $table->integer('retweets');
            $table->integer('favorites');
            $table->string('twitter_account_photo', 255)->nullable('1');
            $table->tinyInteger('authors_added');
            $table->tinyInteger('ocr_needed');
            $table->string('run', 255);
            $table->string('distribution', 255);
            $table->longText('fulltext_raw');
            $table->string('social_media_type', 255)->nullable('1');
            $table->string('users', 255);
            $table->integer('index_ready');
            $table->integer('provider_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('documents');
    }
}
