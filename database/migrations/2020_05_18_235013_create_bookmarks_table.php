<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->integer('newsdesk_id')->unsigned();
            $table->timestamps();
            $table->string('color', 255);
            $table->string('document_type', 255);
            $table->text('search_keyword');
            $table->text('snippet');
            $table->tinyInteger('reviewed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('bookmarks');
    }
}
