<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori' => 'VGA (Graphic Card)',
            'Keterangan' => 'Hardware komputer yang berfungsi untuk mengolah, dan menampilkan gambar',
        ]);

        Kategori::create([
            'nama_kategori' => 'SmartPhone',
            'Keterangan' => 'Ponsel pintar yang mampu membantu tugas tugas anda, serta dapat memberikan hiburan',
        ]);
    }
}
