<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStakeholdersDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('stakeholders_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('backup_picture')->nullable('1');
            $table->string('description', 255);
            $table->string('location', 255);
            $table->string('abbr', 255);
            $table->string('facebook', 255);
            $table->string('twitter', 255);
            $table->string('political_bodies', 1000);
            $table->string('parliament', 255);
            $table->string('alias', 255);
            $table->string('authority', 255);
            $table->tinyInteger('use_alias_only');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('stakeholders_datas');
    }
}
