<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('feeds_manuals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('increment', 255)->default('10');
            $table->string('date_xpath', 255);
            $table->string('title_xpath', 255);
            $table->string('doc_link_xpath', 255);
            $table->integer('feed_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('feeds_manuals');
    }
}
