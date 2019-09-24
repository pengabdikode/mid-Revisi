<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
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
    }

    public function index()
    {
        $user=User::where('roles','admin')->get();
        return view('s_admin.user.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('s_admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =new \App\User;
        $user->email=$request->email;
        $user->name=$request->name;
        $user->password=\Hash::make($request->password);
        $user->roles='admin';
       /* if ($request->file('foto')){
            $foto = $request->file('foto')->store('foto_kategori','public');
            $kategori->foto= $foto;
        } */
        $user->save();
        return redirect()->route('user.index')->with('status','Berhasil Tambah Admin');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('status',' Data Berhasil Dihapus !!');
    }
}
