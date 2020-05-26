<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('client_feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 128);
            $table->tinyInteger('published')->default('1');
            $table->text('description');
            $table->text('content');
            $table->integer('document_count')->unsigned('1');
            $table->string('external_id', 255);
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
        Schema::dropIfExists('client_feeds');
    }
}
