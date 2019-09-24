<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\Gate;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware(function($request,$next){
            if (Gate::allows('admin')) {
                return $next($request);
            } else {abort(403,'lu sapa bangs*t ?');
            }
        });
        $this->kategori = Kategori::all();
    }
    public function index()
    {
        $barang = Barang::orderBy('nama_barang')->paginate(5); 
        $kategori = Kategori::all();
        return view('admin.barang.index',['barang'=>$barang , 'kategori'=>$kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (Gate::allows('admin')) {
        
    }
        // else{abort(403,'lu sapa bangs*t ?');
        // }
    //}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        return view ('admin.barang.edit',['barang'=>$barang,'kategori'=>$kategori]);
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
        $barang->stok=$request->stok;
        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
