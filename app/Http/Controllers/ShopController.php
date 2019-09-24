<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\Gate;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware(function($request,$next){
            if (Gate::allows('admin, s_admin')) {
                abort(403,'admin napa nyasar ke sini, bangs*t !');
            } else {return $next($request);
            }
        });
        $this->kategori = Kategori::all();
    }

    public function index()
    {
        $barang = Barang::orderBy('nama_barang')->paginate(8);
        $kategori = Kategori::all();
        return view('shop.index',['barang'=>$barang , 'kategori'=>$kategori]);
    }

    public function index_kategori($id)
    {

        $barang=Kategori::find($id);
        $barang=$barang->barang()->paginate(5);
        $kategori = Kategori::all();
        return view('shop.index',['barang'=>$barang,"kategori"=>$kategori]);
    }

}
