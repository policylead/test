<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('report_template_id')->unsigned();
            $table->timestamps();
            $table->string('title', 255);
            $table->string('layout', 255);
            $table->string('logo', 255)->nullable('1');
            $table->string('author', 255)->nullable('1');
            $table->string('company_name', 255);
            $table->timestamp('published_at');
            $table->longText('content');
            $table->text('emails');
            $table->integer('attach_pdf')->nullable('1');
            $table->integer('attach_html')->nullable('1');
            $table->dateTime('last_edited');
            $table->string('report_image_description', 255);
            $table->tinyInteger('published');
            $table->timestamp('sent_at');
            $table->string('template', 255);
            $table->text('template_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('reports');
    }
}
