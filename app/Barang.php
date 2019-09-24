<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
protected $table='barang';

public function kategori(){
    return $this->belongsToMany('App\Kategori','kategori_barang','barang_id','kategori_id');
    }

//public function listkategori(){
 //   return $this->belongsToMany('App\Kategori', 'kategori_barang','barang_id','kategori_id');
 //   }
}
