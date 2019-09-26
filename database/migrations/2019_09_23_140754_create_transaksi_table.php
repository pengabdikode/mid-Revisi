<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode',9)->unique();
            $table->enum('status',['pending','already paid','unsuccessful'])->default('pending');
            $table->string('nama_penerima')->nullable();
            $table->text('alamat_kirim')->nullable();
            $table->string('nama_pemilik_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('kode_pengiriman')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
