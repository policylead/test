<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsdeskTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('newsdesk_trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user', 255);
            $table->string('name', 255);
            $table->string('action', 255);
            $table->timestamp('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('newsdesk_trackers');
    }
}
