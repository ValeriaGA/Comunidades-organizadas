<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_id');
            $table->unsignedInteger('cat_weapon_id');
            $table->unsignedInteger('cat_transportation_id');
        });

        Schema::table('security_reports', function (Blueprint $table) {
            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('cat_weapon_id')->references('id')->on('cat_weapon');
            $table->foreign('cat_transportation_id')->references('id')->on('cat_transportation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_reports');
    }
}
