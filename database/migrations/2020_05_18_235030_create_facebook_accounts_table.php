<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('facebook_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('facebookId', 255);
            $table->dateTime('last_check');
            $table->text('facebook_account_photo');
            $table->string('type', 255)->nullable('1');
            $table->string('country', 255)->nullable('1');
            $table->string('subcountry', 255)->nullable('1');
            $table->string('city', 255)->nullable('1');
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
        Schema::dropIfExists('facebook_accounts');
    }
}
