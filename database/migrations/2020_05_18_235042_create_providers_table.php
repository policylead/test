<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('provider_group_container', 255);
            $table->integer('provider_group_container_index');
            $table->string('country', 255);
            $table->string('subcountry', 255);
            $table->string('city', 255);
            $table->integer('feed_id');
            $table->string('social_media_type', 255)->nullable('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('providers');
    }
}
