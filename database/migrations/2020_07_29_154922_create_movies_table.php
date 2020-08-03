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
            $table->id();

            $table->string('poster_path', 500)->nullable();
            $table->boolean('adult')->nullable();
            $table->string('overview', 2000)->nullable();
            $table->date('release_date')->nullable();
            $table->string('original_title', 255)->nullable();
            $table->string('original_language', 10)->nullable();
            $table->string('title', 255);
            $table->string('backdrop_path', 255)->nullable();
            $table->bigInteger('popularity')->nullable();
            $table->bigInteger('vote_count')->nullable();
            $table->float('vote_average')->nullable();
            $table->integer('stock')->default(1);

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
