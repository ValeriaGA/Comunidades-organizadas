<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpetratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpetrators', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->unsignedInteger('security_report_id');
            $table->unsignedInteger('gender_id');
        });

        Schema::table('perpetrators', function (Blueprint $table) {
            $table->foreign('security_report_id')->references('id')->on('security_reports');
            $table->foreign('gender_id')->references('id')->on('genders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpetrators');
    }
}
