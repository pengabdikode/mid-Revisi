<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\uji_middleware;
use Illuminate\Support\Facades\Gate;

class S_AdminBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware(function($request,$next){
            if (Gate::allows('s_admin')) {
                return $next($request);
            } else {abort(403,'lu sapa bangs*t ?');
            }
        });
        $this->kategori = Kategori::all();
    }

    public function index()
    {
        $barang = Barang::orderBy('nama_barang')->paginate(5); 
        $kategori=Kategori::all();
        return view('s_admin.barang.index',['barang'=>$barang , 'kategori'=>$kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategori::all();
        return view('s_admin.barang.create',['kategori'=>$kategori,'total'=>0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'nama_barang' => 'required|min:4|max:25',
            'harga' => 'required|numeric|between:1000,90000000',
        ],[
            'nama_barang.required' => 'Nama gak boleh kosong',
            'nama_barang.min' => 'minimal 5 karakter',
            'harga.required' => 'harga gak boleh kosong',
            'harga.between' => 'harga minimal Rp. 1.000 dan maksimal 90.000.000',
            'harga.numeric' => 'harga harus berisi angka'
        ])->validate();
        $barang =new \App\Barang;
        $barang->nama_barang=$request->nama_barang;
        $barang->merk=$request->merk;
        $barang->tipe=$request->tipe;
        $barang->warna=$request->warna;
        $barang->harga=$request->harga;
        $barang->deskripsi=$request->keterangan;

        if ($request->file('foto')){
            $foto = $request->file('foto')->store('foto_barang','public');
            $barang->foto= $foto;
        }
        $barang->save();
        $barang->kategori()->attach($request->kategori);
        return redirect()->route('s_adminBarang.index')->with('status','Berhasil Tambah Barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang=Barang::findOrFail($id);
        $kategori=Kategori::all();
        return view ('s_admin.barang.edit',['barang'=>$barang,'kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->nama_barang=$request->nama;
        $barang->merk=$request->merk;
        $barang->tipe=$request->tipe;
        $barang->warna=$request->warna;
        $barang->harga=$request->harga;
        $barang->deskripsi=$request->deskripsi;
        if ($request->file('foto')){
            if($barang->foto and file_exists(storage_path('app/public/'.$barang->foto))){
                \Storage::delete('public/'.$barang->foto);
            }
            $foto=$request->file('foto')->store('foto_barang','public');
            $barang->foto.$foto;
        }
        $barang->save();
        return redirect()->route('s_adminBarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang=Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('s_adminBarang.index')->with('status',' Data Berhasil Dihapus !!');
    }
}
