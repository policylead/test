<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('report_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->text('emails');
            $table->text('chapters');
            $table->string('title', 255);
            $table->string('author_name', 255);
            $table->string('company_name', 255);
            $table->integer('enabled')->default('1');
            $table->integer('attach_pdf')->default('1');
            $table->integer('attach_html')->default('1');
            $table->text('users');
            $table->text('teams');
            $table->string('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('report_templates');
    }
}
