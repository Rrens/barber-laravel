<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_user');
            $table->foreignId('id_barber');
            $table->date('tgl_reservasi');
            $table->time('jam_reservasi');
            $table->integer('total_waktu');
            $table->bigInteger('total_biaya')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_barber')->references('id_barber')->on('barber');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
