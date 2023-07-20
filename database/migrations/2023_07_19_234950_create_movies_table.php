<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_id', 50)->unique();
            $table->string('name', 50)->unique()->index();
            $table->string("origin_name", 50)->unique()->index();
            $table->string('slug',50)->unique()->index();
            $table->text('description')->nullable();
            $table->date('release_date');
            $table->string('type',20);
            $table->string('status', 20)->default('ongoing');
            $table->string('thumb_url')->nullable();
            $table->string('poster')->nullable();
            $table->tinyInteger("is_copyright")->default(1);
            $table->tinyInteger('sub_docquyen')->default(1);
            $table->tinyInteger('chieu_rap')->default(0);
            $table->string('trailer_url')->nullable();
            $table->string('time');
            $table->string('episode_current')->nullable();
            $table->string('episode_total')->nullable();
            $table->string('quality')->nullable();
            $table->string('lang')->nullable();
            $table->string('noty')->nullable();
            $table->string('show_time')->nullable();
            $table->integer('year')->default(now()->year);
            $table->integer('view')->default(1);
            $table->tinyInteger('active')->default(1);
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
        Schema::dropIfExists('movies');
    }
}
