<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('report_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->string('type', 255);
            $table->string('title', 255);
            $table->string('author', 255);
            $table->longText('fulltext');
            $table->string('bill_keywords', 255);
            $table->string('related_records', 255);
            $table->string('email1', 255);
            $table->string('full_name', 255);
            $table->date('birth_date')->nullable('1');
            $table->string('profession', 255);
            $table->string('abbr', 255);
            $table->string('mailbox_street_address_parliament', 255);
            $table->string('zip_code_parliament', 255);
            $table->string('city_parliament', 255);
            $table->string('profile_picture', 255);
            $table->string('personal_site', 255);
            $table->string('political_bodies', 255);
            $table->string('employee_parliament', 255);
            $table->string('fraction', 255);
            $table->string('zip_code_wk', 255);
            $table->string('city_wk', 255);
            $table->text('biography');
            $table->string('phone_code_parliament', 255);
            $table->string('phone_number_parliament', 255);
            $table->string('fax_number_parliament', 255);
            $table->longText('text_section');
            $table->longText('abstract');
            $table->string('provider', 255);
            $table->string('provider_group', 255);
            $table->string('doc_type', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('report_files');
    }
}
