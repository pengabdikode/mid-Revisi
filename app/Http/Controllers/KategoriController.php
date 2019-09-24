<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\Gate;

class KategoriController extends Controller
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
            }
            else{abort(403,'lu sapa bangs*t ?');
            }
        });
        $this->Barang = Barang::all();
    }

    public function index()
    {
        //$barang=\App\Barang::with('kategori')->get();
        //$kategori=\App\Kategori::with('barang')->get();
        $kategori=Kategori::orderBy('nama_kategori')->paginate(5); 
        //return $kategori;
        //return $barang;
        //return $kategori;
        return view('s_admin.kategori.index',['kategori'=>$kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('s_admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori =new \App\Kategori;
        $kategori->nama_kategori=$request->nama;
        $kategori->keterangan=$request->keterangan;
       /* if ($request->file('foto')){
            $foto = $request->file('foto')->store('foto_kategori','public');
            $kategori->foto= $foto;
        } */
        $kategori->save();
        return redirect()->route('kategori.index')->with('status','Berhasil Tambah Kategori');
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
        $kategori=Kategori::findOrFail($id);//disini mencari berdasarkan $id
        return view ('s_admin.kategori.edit',['kategori'=>$kategori]);
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
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori=$request->nama;
        $kategori->keterangan=$request->keterangan;
    /*    if ($request->file('foto')){
            if($kategori->foto and file_exists(storage_path('app/public/'.$kategori->foto))){
                \Storage::delete('public/'.$kategori->foto);
            }
            $foto=$request->file('foto')->store('foto_kategori','public');
            $kategori->foto.$foto;//
    }*/
    $kategori->save();
    return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('status',' Data Berhasil Dihapus !!');
    }
}
