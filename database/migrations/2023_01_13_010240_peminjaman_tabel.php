<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeminjamanTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->id();
            $table->string('peminjam');
            $table->string('name');  
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('kode_barang');
            $table->foreign('kode_barang')->references('kode_barang')->on('data_barang');
            $table->string('surat');
            $table->string('kondisi');
            $table->string('tersedia');
            $table->string('foto')->nullable();
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
         Schema::dropIfExists('peminjaman_barang');
    }
}
