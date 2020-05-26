<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('revisionable_type', 255);
            $table->integer('revisionable_id');
            $table->string('key', 255);
            $table->text('old_value');
            $table->text('new_value');
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
        Schema::dropIfExists('revisions');
    }
}
