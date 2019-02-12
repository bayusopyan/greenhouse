<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediatanamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediatanam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cahaya')->nullable();
            $table->integer('suhu')->nullable();
            $table->float('ph')->nullable();
            $table->integer('kt')->nullable();
            $table->time('jam')->nullable();
            $table->date('tanggal')->nullable();            
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
        Schema::dropIfExists('mediatanam');
    }
}
