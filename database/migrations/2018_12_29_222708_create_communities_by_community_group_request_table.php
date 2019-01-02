<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesByCommunityGroupRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_by_group_request', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('community_group_request_id');
            $table->unsignedInteger('community_id');
        });

        Schema::table('communities_by_group_request', function (Blueprint $table) {
            $table->foreign('community_group_request_id')->references('id')->on('community_group_requests');
            $table->foreign('community_id')->references('id')->on('communities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communities_by_community_group_request');
    }
}
