<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->timestamps();
            $table->string('name', 255);
            $table->tinyInteger('email')->default('1');
            $table->tinyInteger('active')->default('1');
            $table->timestamp('delay_time');
            $table->timestamp('last_sent');
            $table->text('keywords');
            $table->integer('first_alert');
            $table->integer('second_alert')->default('1');
            $table->string('alert_frequency', 255)->default('day');
            $table->string('alert_weekday', 255);
            $table->integer('edited_by');
            $table->dateTime('locked_time');
            $table->integer('locked_by');
            $table->string('dashboard_type', 255)->default('newsdesk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('dashboards');
    }
}
