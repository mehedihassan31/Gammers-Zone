<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('slider', function (Blueprint $table) {
         $table->integer('id')->autoIncrement();
         $table->string('photo')->nullable();
         $table->string('link')->nullable();
         $table->string('title')->nullable();
    
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
