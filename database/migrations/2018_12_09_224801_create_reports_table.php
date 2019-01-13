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
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('description');
            $table->unsignedInteger('community_group_id');
            $table->unsignedInteger('sub_cat_report_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('state_id');
            $table->timestamps();
            $table->date("date");
            $table->time("time");
            $table->decimal('longitud', 11, 8);
            $table->decimal('latitud', 10, 8);
            $table->boolean('active')->default(TRUE);
            $table->boolean('news')->default(FALSE);
            $table->softDeletes();
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('community_group_id')->references('id')->on('community_groups');
            $table->foreign('sub_cat_report_id')->references('id')->on('sub_cat_report');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
