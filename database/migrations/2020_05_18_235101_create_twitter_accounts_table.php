<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('twitter_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->integer('twitterId');
            $table->integer('twitts_amount');
            $table->dateTime('last_check');
            $table->tinyInteger('timeline_check')->default('1');
            $table->text('photo_url');
            $table->string('type', 255);
            $table->string('country', 255)->nullable('1');
            $table->string('subcountry', 255)->nullable('1');
            $table->string('city', 255)->nullable('1');
            $table->string('role', 255)->nullable('1');
            $table->string('full_name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('twitter_accounts');
    }
}
