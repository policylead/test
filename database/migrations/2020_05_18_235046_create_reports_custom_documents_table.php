<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsCustomDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reports_custom_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('doc_title', 255);
            $table->timestamp('pubdate_source');
            $table->string('provider', 255);
            $table->string('author', 255);
            $table->text('teaser');
            $table->text('fulltext');
            $table->string('doc_link', 255);
            $table->string('public_link', 255);
            $table->text('article_image_description');
            $table->integer('article_image_size');
            $table->integer('used');
            $table->integer('fulltext_columns');
            $table->string('type', 255)->default('document');
            $table->longText('further_publications');
            $table->tinyInteger('deactivated_link');
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->string('provider_logo')->nullable('1');
            $table->string('article_image')->nullable('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('reports_custom_documents');
    }
}
