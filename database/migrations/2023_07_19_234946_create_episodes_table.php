<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('status')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->string('file_name');
            $table->string('link_embed')->nullable();
            $table->string('link_m3u8')->nullable();
            $table->unsignedInteger('server_id')->index();
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
