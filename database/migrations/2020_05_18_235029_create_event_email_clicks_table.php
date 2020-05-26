<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventEmailClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('event_email_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('client_ip', 255);
            $table->string('session_id', 255);
            $table->integer('sent_event_alert_id')->unsigned('1');
            $table->string('url', 255);
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('event_email_clicks');
    }
}
