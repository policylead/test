<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('status')->default('1');
            $table->string('health', 255)->default('new');
            $table->integer('manual');
            $table->integer('location_auto_find');
            $table->integer('goose');
            $table->integer('documents_count');
            $table->timestamp('last_document');
            $table->text('source_link');
            $table->integer('use_html')->nullable('1');
            $table->string('list_css', 255)->nullable('1');
            $table->string('link_css', 255)->nullable('1');
            $table->string('title_css', 255)->nullable('1');
            $table->string('title_attr', 255)->nullable('1');
            $table->string('date_css', 255)->nullable('1');
            $table->string('date_attr', 255)->nullable('1');
            $table->string('author', 255);
            $table->string('location', 255);
            $table->string('country', 255)->nullable('1');
            $table->string('subcountry', 255)->nullable('1');
            $table->string('city', 255)->nullable('1');
            $table->string('provider_group', 255);
            $table->string('doc_type', 255);
            $table->string('title', 255);
            $table->string('pub_date', 255);
            $table->string('fulltext_mode', 255)->nullable('1');
            $table->string('fulltext_source_link', 255)->nullable('1');
            $table->string('event_field', 255)->nullable('1');
            $table->string('fulltext_xpath', 255)->nullable('1');
            $table->string('fulltext_field', 255)->nullable('1');
            $table->string('selector', 255)->nullable('1');
            $table->string('source_keywords', 255)->nullable('1');
            $table->timestamp('last_scraped');
            $table->text('description');
            $table->integer('special_encoding');
            $table->integer('top_source');
            $table->string('lock_hash', 255);
            $table->integer('scrape_all');
            $table->string('news_type', 255);
            $table->integer('created_by');
            $table->tinyInteger('content_partner');
            $table->string('scraping_mode', 255);
            $table->text('options');
            $table->text('first_document');
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
        Schema::dropIfExists('feeds');
    }
}
