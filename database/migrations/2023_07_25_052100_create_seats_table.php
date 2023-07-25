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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('theater_id');
            $table->json('available_seat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('theater_id')->references('id')->on('theaters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
};
