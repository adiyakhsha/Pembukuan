<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabarugisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labarugis', function (Blueprint $table) {
            $table->id();
            $table->integer('pendapatan');
            $table->integer('harga_pokok');
            $table->integer('pembelian');
            $table->integer('total_harga_penjualan');
            $table->integer('total_laba_kotor');

            $table->foreignId('user_id')->constrained();
            $table->foreignId('transaksi_id')->constrained();
            
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
        Schema::dropIfExists('labarugis');
    }
}
