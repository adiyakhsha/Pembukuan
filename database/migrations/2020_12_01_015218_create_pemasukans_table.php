<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->string('ket_pemasukan');
            $table->date('tgl_pemasukan');
            $table->integer('no_nota')->nullable();
            $table->integer('total_pemasukan');
            $table->date('jatuh_tempo')->nullable();
            $table->integer('bayar')->nullable();
            $table->date('tgl_bayar')->nullable();
            $table->integer('saldo_pemasukan');

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
        Schema::dropIfExists('pemasukans');
    }
}
