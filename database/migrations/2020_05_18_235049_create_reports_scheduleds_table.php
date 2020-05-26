<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsScheduledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('reports_scheduleds', function (Blueprint $table) {
            $table->increments('id');
            $table->text('emails');
            $table->string('sender_email', 255);
            $table->string('custom_sender_email', 255);
            $table->string('custom_sender_name', 255);
            $table->string('subject', 255);
            $table->text('keywords');
            $table->text('message');
            $table->tinyInteger('attach_pdf');
            $table->tinyInteger('send_as_html');
            $table->tinyInteger('sent');
            $table->timestamp('created_at');
            $table->string('lock_hash', 255);
            $table->integer('report_id')->unsigned();
            $table->integer('list_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('reports_scheduleds');
    }
}
