<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('marital_status_title', 10)->nullable('1');
            $table->string('first_name', 255)->nullable('1');
            $table->string('full_name', 255)->nullable('1');
            $table->string('last_name', 255)->nullable('1');
            $table->string('title', 255)->nullable('1');
            $table->string('parliament', 255)->nullable('1');
            $table->string('abbr', 255)->nullable('1');
            $table->string('sex', 255)->nullable('1');
            $table->string('profile_photo', 255)->nullable('1');
            $table->string('fraction', 255)->nullable('1');
            $table->text('biography');
            $table->string('profession', 255)->nullable('1');
            $table->string('birthplace', 255)->nullable('1');
            $table->date('birth_date')->nullable('1');
            $table->string('children', 255)->nullable('1');
            $table->string('denomination', 255)->nullable('1');
            $table->string('marital_status', 255)->nullable('1');
            $table->string('email1', 255)->nullable('1');
            $table->string('email2', 255)->nullable('1');
            $table->string('personal_site', 255)->nullable('1');
            $table->text('political_bodies');
            $table->string('parliament_membership', 255)->nullable('1');
            $table->string('election_result', 255)->nullable('1');
            $table->string('federal_state', 255)->nullable('1');
            $table->string('official_function', 255)->nullable('1');
            $table->text('parliament_2');
            $table->string('additional_address_parliament', 255)->nullable('1');
            $table->string('mailbox_street_address_parliament', 255)->nullable('1');
            $table->string('zip_code_parliament', 255)->nullable('1');
            $table->string('city_parliament', 255)->nullable('1');
            $table->string('eu_member_country_parliament', 255)->nullable('1');
            $table->string('phone_code_parliament', 255)->nullable('1');
            $table->string('phone_number_parliament', 255)->nullable('1');
            $table->string('fax_code_number_parliament', 255)->nullable('1');
            $table->string('fax_number_parliament', 255)->nullable('1');
            $table->string('ministry_request_reg', 255)->nullable('1');
            $table->string('additional_address_reg', 255)->nullable('1');
            $table->string('mailbox_street_address_reg', 255)->nullable('1');
            $table->string('zip_code_reg', 255)->nullable('1');
            $table->string('city_reg', 255)->nullable('1');
            $table->string('eu_member_country_reg', 255)->nullable('1');
            $table->string('phone_code_reg', 255)->nullable('1');
            $table->string('phone_number_reg', 255)->nullable('1');
            $table->string('fax_code_number_reg', 255)->nullable('1');
            $table->string('fax_number_reg', 255)->nullable('1');
            $table->string('constituency_private', 255)->nullable('1');
            $table->string('additional_address_wk', 255)->nullable('1');
            $table->string('mailbox_street_address_wk', 255)->nullable('1');
            $table->string('zip_code_wk', 255)->nullable('1');
            $table->string('city_wk', 255)->nullable('1');
            $table->string('eu_member_country_wk', 255)->nullable('1');
            $table->string('phone_code_wk', 255)->nullable('1');
            $table->string('phone_number_wk', 255)->nullable('1');
            $table->string('fax_code_number_wk', 255)->nullable('1');
            $table->string('fax_number_wk', 255)->nullable('1');
            $table->text('employ_parliament');
            $table->text('employ_reg');
            $table->text('employ_wk');
            $table->string('e_n_g_l_a_n_r_e_d_e', 255)->nullable('1');
            $table->string('networks', 255)->nullable('1');
            $table->string('twitter', 255)->nullable('1');
            $table->string('facebook', 255)->nullable('1');
            $table->string('period', 255)->nullable('1');
            $table->string('qualification', 255)->nullable('1');
            $table->string('election_list', 255)->nullable('1');
            $table->string('avatar', 255);
            $table->string('twitter_avatar', 255);
            $table->string('facebook_avatar', 255);
            $table->timestamp('last_check');
            $table->string('institution', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('authors');
    }
}
