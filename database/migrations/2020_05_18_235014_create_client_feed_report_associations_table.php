<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFeedReportAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('client_feed_report_associations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title_template', 128);
            $table->string('description_template', 255);
            $table->string('link_template', 255);
            $table->string('author_template', 255);
            $table->string('pubdate_template', 255);
            $table->string('category_template', 255);
            $table->integer('client_feed_id')->unsigned();
            $table->integer('report_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('client_feed_report_associations');
    }
}
