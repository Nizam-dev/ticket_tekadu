<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->integer('total_pembayaran');
            $table->integer('total_ticket');
            $table->string('jenis_ticket');
            $table->string('foto_pembayaran')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('status_pembayaran');
            $table->foreignId('customer_id');
            $table->foreignId('event_id');
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
        Schema::dropIfExists('transaksis');
    }
}
