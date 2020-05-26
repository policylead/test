<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggingTaggedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('tagging_taggeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('taggable_id')->unsigned();
            $table->string('taggable_type', 255);
            $table->string('tag_name', 255);
            $table->string('tag_slug', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('tagging_taggeds');
    }
}
