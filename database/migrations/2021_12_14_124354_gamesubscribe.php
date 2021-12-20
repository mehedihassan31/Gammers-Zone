<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gamesubscribe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('gamesubscribe', function (Blueprint $table) {
           $table->integer('id')->autoIncrement();
           $table->integer('user_id');
           $table->integer('match_id');
           $table->integer('range');
           $table->string('price_money')->default(0);
           $table->string('killbyuser')->default(0);
                     
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
