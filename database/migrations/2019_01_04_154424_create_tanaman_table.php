<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanaman', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->longText('image')->nullable();
            // $table->unsignedInteger('jadwal')->nullable();
            // $table->foreign('jadwal')->references('id')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanaman');
    }
}
