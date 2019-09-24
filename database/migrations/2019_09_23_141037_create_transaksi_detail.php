<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail', function (Blueprint $table) {
            $table->Increments('id');
            $table->float('quantity');
            $table->integer('barang_id')->unsigned();
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->integer('transaksi_id')->unsigned();
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
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
        Schema::dropIfExists('detail');
    }
}
