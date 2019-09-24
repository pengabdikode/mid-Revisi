<?php

use\App\Relasi;
use Illuminate\Database\Seeder;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_barang')->insert(['barang_id' => '1',
        'kategori_id' => '1',]
        );

        DB::table('kategori_barang')->insert(['barang_id' => '2',
        'kategori_id' => '1',]
        );

        DB::table('kategori_barang')->insert(['barang_id' => '3',
        'kategori_id' => '1',]
        );

        DB::table('kategori_barang')->insert(['barang_id' => '4',
        'kategori_id' => '1',]
        );

        DB::table('kategori_barang')->insert(['barang_id' => '5',
        'kategori_id' => '2',]
        );
    }
}
