<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsEmailClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reports_email_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->unsigned();
            $table->timestamps();
            $table->string('title', 255);
            $table->string('link', 255);
            $table->integer('clicks');
            $table->integer('date');
            $table->string('hash', 255);
            $table->string('chapter', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('reports_email_clicks');
    }
}
