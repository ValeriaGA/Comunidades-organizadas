<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCatReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_cat_report', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_report_id');
            $table->string('name', 255);
            $table->text('multimedia_path')->nullable();
            $table->boolean('active')->default(TRUE);
        });

        Schema::table('sub_cat_report', function (Blueprint $table) {
            $table->foreign('cat_report_id')->references('id')->on('cat_report');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_cat_report');
    }
}
