<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('documents_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('doc_id', 255);
            $table->integer('feed_id');
            $table->string('provider', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('documents_temps');
    }
}
