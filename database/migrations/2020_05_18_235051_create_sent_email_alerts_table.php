<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentEmailAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('sent_email_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dashboard_id')->unsigned();
            $table->timestamps();
            $table->integer('days');
            $table->integer('num_docs');
            $table->tinyInteger('sent');
            $table->string('error', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('sent_email_alerts');
    }
}
