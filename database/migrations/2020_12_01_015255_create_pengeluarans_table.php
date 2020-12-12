<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pengeluaran');
            $table->integer('no_bukti_pengeluaran');
            $table->integer('no_cek');
            $table->string('ket_pengeluaran');
            $table->string('ref')->nullable();
            $table->integer('serba_serbi')->nullable();
            $table->integer('hutang_dagang')->nullable();
            $table->integer('pot_pembelian')->nullable();
            $table->integer('kas')->nullable();
            $table->integer('total_pengeluaran');

             $table->foreignId('user_id')->constrained();

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
        Schema::dropIfExists('pengeluarans');
    }
}
