<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cron_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cron_id')->index();
            $table->foreign('cron_id')->references('id')->on('crons')->onDelete('cascade');
            $table->json('payload');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('cron_detail');
    }
}
