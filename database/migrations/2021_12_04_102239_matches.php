<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name')->nullable();
            $table->string('Device')->nullable();
            $table->string('Type')->nullable();
            $table->string('version')->nullable();
            $table->string('map')->nullable();
            $table->string('match_type')->nullable();
            $table->string('room_id')->nullable();
            $table->string('room_password')->nullable();
            $table->string('totall_p')->nullable();
            $table->integer('Entry Fee')->nullable();
            $table->dateTime('match_time')->nullable();
            $table->string('winning_price')->nullable();
            $table->string('runnerup_one')->nullable();
            $table->string('runnerup_two')->nullable();
            $table->string('per_kill')->nullable();
            $table->string('total_price')->nullable();
            $table->string('registered_p')->nullable(); 
            $table->string('game_link')->nullable();
            $table->string('category')->nullable();
            $table->string('game_name')->nullable();
            $table->string('game_type_by_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
