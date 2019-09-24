<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table='kategori';

    public function barang(){
        return $this->belongsToMany('App\Barang','kategori_barang','kategori_id','barang_id');
    }
}
