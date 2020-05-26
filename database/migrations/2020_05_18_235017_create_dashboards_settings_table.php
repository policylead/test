<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('dashboards_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('dashboard_id')->unsigned();
            $table->integer('active')->default('1');
            $table->integer('first_alert');
            $table->integer('second_alert')->default('1');
            $table->timestamp('delay_time');
            $table->timestamp('last_sent');
            $table->string('alert_frequency', 255)->default('day');
            $table->string('alert_weekday', 255);
            $table->string('channels', 255);
            $table->tinyInteger('push_alert');
            $table->tinyInteger('push_monday');
            $table->tinyInteger('push_tuesday');
            $table->tinyInteger('push_wednesday');
            $table->tinyInteger('push_thursday');
            $table->tinyInteger('push_friday');
            $table->tinyInteger('push_saturday');
            $table->tinyInteger('push_sunday');
            $table->integer('push_from')->default('8');
            $table->integer('push_to')->default('17');
            $table->string('push_type', 255)->default('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('dashboards_settings');
    }
}
