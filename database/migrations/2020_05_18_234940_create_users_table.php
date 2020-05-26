<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->timestamps();
            $table->string('email', 255);
            $table->string('password', 60);
            $table->softDeletes();
            $table->string('first_name', 255);
            $table->string('remember_token', 100)->nullable('1');
            $table->string('last_name', 255);
            $table->string('full_name', 255);
            $table->integer('role');
            $table->string('agency_name', 255)->nullable('1');
            $table->string('office_name', 255)->nullable('1');
            $table->string('press_releases', 255)->nullable('1');
            $table->string('homepage', 255)->nullable('1');
            $table->string('university_id', 255)->nullable('1');
            $table->string('subject_area_id', 255)->nullable('1');
            $table->string('blog', 255)->nullable('1');
            $table->string('employee', 255)->nullable('1');
            $table->string('tel', 255)->nullable('1');
            $table->string('terms_and_conditions', 255)->nullable('1');
            $table->tinyInteger('verified');
            $table->string('verification_token', 255)->nullable('1');
            $table->string('lead_type', 255)->nullable('1');
            $table->string('profile_photo', 255)->nullable('1');
            $table->string('student_card', 255)->nullable('1');
            $table->string('test_period', 255)->default('true');
            $table->string('client_status', 255)->default('free');
            $table->tinyInteger('data_filled');
            $table->tinyInteger('approved');
            $table->longText('alert_providers');
            $table->string('alert_frequency', 255);
            $table->string('alert_weekday', 255);
            $table->text('blocked_documents');
            $table->tinyInteger('first_alert');
            $table->tinyInteger('second_alert')->default('1');
            $table->tinyInteger('newsdesk_provider_filter')->default('1');
            $table->integer('personal_email_for_reports');
            $table->tinyInteger('settings_1to1_support');
            $table->tinyInteger('settings_newsdesk_support')->default('1');
            $table->tinyInteger('settings_click_tracking_reports');
            $table->tinyInteger('settings_click_tracking_other')->default('1');
            $table->tinyInteger('settings_newsletter_features')->default('1');
            $table->tinyInteger('settings_newsletter_expired')->default('1');
            $table->tinyInteger('settings_reconnect');
            $table->string('custom_sender_email', 255);
            $table->string('custom_sender_name', 255);
            $table->tinyInteger('client_feeds_enabled');
            $table->string('language', 255)->default('de');
            $table->string('salutation', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('users');
    }
}
