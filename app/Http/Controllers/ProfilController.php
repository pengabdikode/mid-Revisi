<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user_id=\Auth::user()->id;
        $users= User::find($user_id);
        return view('profil.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user_id=\Auth::user()->id;
        $users= User::find($user_id);
        return view('profil.edit',['users'=>$users]);
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
        $users = User::findOrFail($id);
        $users->nama_lengkap=$request->nama_lengkap;
        $users->alamat=$request->alamat;
        if ($request->file('foto')){
            if($users->foto and file_exists(storage_path('app/public/'.$users->foto))){
                \Storage::delete('public/'.$users->foto);
            }
            $foto=$request->file('foto')->store('foto_user','public');
            $users->foto.$foto;
        }
        $users->save();
        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
