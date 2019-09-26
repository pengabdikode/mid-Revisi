<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use Auth;
use App\ViewKode;
use App\Transaksi;
class CartController extends Controller
{

    
    protected $barang;
    protected $user_id;

    //middleware
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

        //index cart

        public function index(){
            $user_id=\Auth::user()->id;
            $totalCart=\Cart::session($user_id)->getContent()->count();
            $cart=\Cart::session($user_id)->getContent()->sort();
            return view('cart.index',['total'=>$totalCart,'cart'=>$cart]);
        }

        //widget add to cart

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

    //kolom halaman periksa status pembayaran

    public function periksa_konfirmasi(Request $request){
        $kode = $request->query('kode');
        $trans = Transaksi::where('kode','=',$kode);
        $datakode = ViewKode::where('kode','=',$kode)->get();
        return view('pembeli.periksa_konfirmasi',['data' => $datakode,'user'=>$trans]);
    }

    //widget tambah jumlah item cart

    public function plus(){
        $this->user_id=\Auth::user()->id;
        \Cart::session($this->user_id)->update($this->barang->id, array(
            'quantity' => +1
        ));
        return redirect('/cart');
    }

    //widget kurang item cart

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

        //index checkout

    public function index_checkout(){
        // $user_id=\Auth::user()->id;
        $user_id=Auth::user()->id;
        $users= User::find($user_id);
        $totalCart=\Cart::session($user_id)->getContent()->count();
        $cart=\Cart::session($user_id)->getContent()->sort();
        return view('checkout.index',['total'=>$totalCart,'cart'=>$cart,'users'=>$users]);
    }

    //kolom halaman pembayaran

    public function payment(){
        
        
        return view('checkout.payment');
    }

    //proses checkout ke tabel transaksi

    public function transaksi(Request $request){
        $this->user_id=\Auth::user()->id;

        $transaksi=new \App\Transaksi;
        $transaksi->kode = str_random(9);
        $transaksi->user_id=$this->user_id;
        $transaksi->alamat_kirim = $request->alamat;
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
        //return $cart;
        return view ('checkout.payment',['cart'=>$cart]);
    }

}
