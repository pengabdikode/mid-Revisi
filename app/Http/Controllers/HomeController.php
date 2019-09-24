<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function index_pembeli()
    {
        $barang = Barang::inRandomOrder()->take(3)->get();
        return view('pembeli.welcome')->with('barang', $barang);
    }

    public function index_s_admin()
    {
        return view('s_admin.home');
    }
}
