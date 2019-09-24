<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama_barang' => 'Galax GTX 1050 TI ',
            'merk' => 'Galax',
            'tipe' => 'GTX',
            'warna' => 'Hitam',
            'stok' => 0,
            'harga' => 1500000,
            'deskripsi' => 'ini produk VGA pertama',
            'foto' => 'foto_barang/1050_TI.jpg'
        ]);

        Barang::create([
            'nama_barang' => 'Galax GTX 1060',
            'merk' => 'Galax',
            'tipe' => 'GTX',
            'warna' => 'Hitam',
            'stok' => 0,
            'harga' => 2000000,
            'deskripsi' => 'ini produk VGA kedua',
            'foto' => 'foto_barang/1060.jpg'
        ]);

        Barang::create([
            'nama_barang' => 'Galax GTX 1660',
            'merk' => 'Galax',
            'tipe' => 'GTX',
            'warna' => 'Hitam',
            'stok' => 0,
            'harga' => 3600000,
            'deskripsi' => 'ini produk VGA ketiga',
            'foto' => 'foto_barang/1660.jpg'
        ]);

        Barang::create([
            'nama_barang' => 'Galax RTX 2060',
            'merk' => 'Galax',
            'tipe' => 'RTX',
            'warna' => 'Hitam',
            'stok' => 0,
            'harga' => 4000000,
            'deskripsi' => 'ini produk VGA keempat',
            'foto' => 'foto_barang/2060.jpg'
        ]);

        Barang::create([
            'nama_barang' => 'Realme 3 Pro',
            'merk' => 'Realme',
            'tipe' => '3 Pro',
            'warna' => 'Hitam Ungu',
            'stok' => 0,
            'harga' => 3000000,
            'deskripsi' => 'ini produk Smartphone pertama',
            'foto' => 'foto_barang/realme.jpg'
        ]);

    }
}
