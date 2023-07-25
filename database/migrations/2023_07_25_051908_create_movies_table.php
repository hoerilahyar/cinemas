<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('genre_id');
            $table->string('title');
            $table->string('synopsis');
            $table->string('cast');
            $table->string('director');
            $table->string('plot');
            $table->date('release_year');
            $table->smallInteger('rating');
            $table->string('movie_length');
            $table->date('show_date');
            $table->string('thumbnail');
            $table->string('preview');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('genre_id')->references('id')->on('genres');
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
};
