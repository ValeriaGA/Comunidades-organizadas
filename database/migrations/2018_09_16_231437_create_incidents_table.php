<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_id')->default(1);
            $table->unsignedInteger('weapon_id')->default(1);
            $table->unsignedInteger('transportation_id')->default(1);
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->date("date");
            $table->time("time");
            $table->string('location');
            $table->decimal('longitud', 11, 8);
            $table->decimal('latitud', 10, 8);
            $table->text('description');
            $table->integer('perpetrators')->default(1);
            $table->integer('victims')->default(0);
            $table->char('primary_victim_sex', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}