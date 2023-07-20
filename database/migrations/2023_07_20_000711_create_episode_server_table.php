<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_server', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('episode_id')->index();
            $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade');
            $table->unsignedInteger('server_id')->index();
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_server');
    }
}
