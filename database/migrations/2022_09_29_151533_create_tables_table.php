<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_game_with_dlc');
            $table->boolean('is_owns_a_box');
            $table->unsignedInteger('number_of_players');
            $table->time('start_time');

            $table->foreignId('game_id')->references('id')->on('games');
            $table->foreignId('event_id')->references('id')->on('events');
            $table->foreignId('owner_id')->references('id')->on('players');

            $table->softDeletes();
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
        Schema::dropIfExists('tables');
    }
}
