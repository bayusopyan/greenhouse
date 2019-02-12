<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('tanaman')->nullable();
            $table->integer('jumlah_tanaman')->nullable();
            $table->string('status')->nullable();
            $table->foreign('kelompok')->references('id')->on('kelompok')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tanaman')->references('id')->on('tanaman')->onDelete('cascade')->onUpdate('cascade');              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
