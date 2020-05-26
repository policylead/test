<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsCustomDocumentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reports_custom_document_images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('document_id')->unsigned();
            $table->string('article_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('reports_custom_document_images');
    }
}
