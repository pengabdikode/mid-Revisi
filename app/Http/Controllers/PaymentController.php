<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\ViewKode;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
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
        $transaksi=Transaksi::where('status','pending')->get();
        return view('s_admin.pembayaran.periksa_pembayaran',['data' => $transaksi]);
    }

    public function periksa_konfirmasi(Request $request){
        $kode = $request->query('kode');
        $trans = Transaksi::where('kode','=',$kode);
        $datakode = ViewKode::where('kode','=',$kode)->get();
        return view('s_admin.pembayaran.periksa_pembayaran',['data' => $datakode,'user'=>$trans]);
    }

}
