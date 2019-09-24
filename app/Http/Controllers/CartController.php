<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    protected $barang;
    protected $user_id;
        public function __construct(Request $request){
            $this->barang=\App\Barang::find($request->barang_id);
            $this->middleware('auth');

            $this->middleware(function($request,$next){
                if (Gate::allows('pembeli')) {
                    return $next($request);
                } else {
                    return redirect('/home');
                }
            });
        }

        public function index(){
            $this->user_id=\Auth::user()->id;
            $totalCart=\Cart::session($this->user_id)->getContent()->count();
            $cart=\Cart::session($this->user_id)->getContent()->sort();
            return view('cart.index',
            ['total'=>$totalCart,
            'cart'=>$cart]);
        }
    public function add(Request $request){
        $this->user_id=\Auth::user()->id;
        if (\Cart::session($this->user_id)->get($this->barang->id)){
        }else{
            \Cart::session($this->user_id)->add(array(
                'id' => $this->barang->id,
                'name' => $this->barang->nama_barang,
                'price' => $this->barang->harga,
                'quantity' => 1,
                'attributes' => [ //nambah atribut
                    'berat'=>1
                ]
            ));
        }
    return redirect()->back();
    }

    public function transaksi(){
        $this->user_id=\Auth::user()->id;

        $transaksi=new \App\Transaksi;
        $transaksi->kode = str_random(6);
        $transaksi->user_id=$this->user_id;
        $transaksi->status=0;
        $transaksi->save();
        $cart=\Cart::session($this->user_id)->getContent();

        foreach($cart as $item){
            $detail=new \App\Detail;
            $detail->barang_id=$item->id;
            $detail->transaksi_id=$transaksi->id;
            $detail->quantity=$item->quantity;
            $detail->save();
            \Cart::session($this->user_id)->remove($item->id);
        }
        return $cart;
    }

    public function plus(){
        $this->user_id=\Auth::user()->id;
        \Cart::session($this->user_id)->update($this->barang->id, array(
            'quantity' => +1
        ));
        return redirect('/cart');
    }

    public function min(){
        $this->user_id=\Auth::user()->id;
        $cek= \Cart::session($this->user_id)->get($this->barang->id);
        if ($cek->quantity <=1){
            \Cart::session($this->user_id)->remove($this->barang->id);
        }else{
        \Cart::session($this->user_id)->update($this->barang->id, array(
            'quantity' => -1
        ));
    }
        return redirect('/cart');
    }
}
