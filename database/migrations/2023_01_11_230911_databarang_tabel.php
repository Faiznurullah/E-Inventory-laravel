<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabarangTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('jenis_barang');
            $table->foreign('jenis_barang')->references('id')->on('jenis_barang');
            $table->string('foto');
            $table->string('kondisi');
            $table->string('tersedia');
            $table->string('kode_barang')->unique();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
