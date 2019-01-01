<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesByGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_by_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('community_id');
            $table->unsignedInteger('community_group_id');
        });

        Schema::table('communities_by_groups', function (Blueprint $table) {
            $table->foreign('community_id')->references('id')->on('communities');
            $table->foreign('community_group_id')->references('id')->on('community_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities_by_groups');
    }
}
