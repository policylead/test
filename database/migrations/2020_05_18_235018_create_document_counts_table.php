<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('document_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->timestamps();
            $table->string('client_ip', 255);
            $table->string('session_id', 255);
            $table->string('document_type', 255);
            $table->string('document_link', 255);
            $table->string('search_keyword', 255)->nullable('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('document_counts');
    }
}
