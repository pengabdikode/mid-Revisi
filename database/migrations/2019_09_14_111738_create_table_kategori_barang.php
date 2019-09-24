<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKategoriBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_barang', function (Blueprint $table) {
                $table->integer('barang_id')->unsigned();
                $table->integer('kategori_id')->unsigned();
                $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
                $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            });
        }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_barang');
    }
}
