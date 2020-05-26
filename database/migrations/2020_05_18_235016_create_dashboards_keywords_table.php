<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('dashboards_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('keywords');
            $table->longText('filter');
            $table->integer('providers_count');
            $table->integer('dashboard_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('dashboards_keywords');
    }
}
