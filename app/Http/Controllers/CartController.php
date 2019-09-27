<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use Auth;
use App\ViewKode;
use App\Transaksi;
use App\Payment;
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
            $kosong=\Cart::session($user_id)->isEmpty();
            return view('cart.index',['total'=>$totalCart,'cart'=>$cart,'kosong'=>$kosong]);
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
        $kosong=\Cart::session($user_id)->isEmpty();
        if($kosong){
            return view('cart.index',['kosong'=>$kosong]);
        }else{
            return view('checkout.index',['total'=>$totalCart,'cart'=>$cart,'users'=>$users]);
        }
    }

        //kolom halaman periksa status pembayaran

        public function periksa_konfirmasi(Request $request){
            $kode = $request->query('kode');
            $trans = Transaksi::where('kode','=',$kode)->first();
            $datauser = ViewKode::where('kode','=',$kode)->first();
            $datakode = ViewKode::where('kode','=',$kode)->get();
            return view('pembeli.periksa_konfirmasi',['data' => $datakode,'user'=>$trans,'datauser' => $datauser]);
        }
    


    //kolom halaman input pembayaran

    public function input_payment(){
        

        return view('pembeli.input_payment');
    }

    //proses penyimpanan data input pembayaran

    public function simpan_payment(Request $request){

            \Validator::make($request->all(), [
                'kode' => 'required|min:9|max:9',
                'nama_pengirim' => 'required|min:3|max:25',
                'bank' => 'required|min:2|max:25',
                'rekening' => 'required|numeric',
                'nominal' => 'required|numeric|between:10000,100000000',
                // 'harga' => 'required|numeric|between:1000,90000000',
                ],[
                'nama_pengirim.required' => 'Nama Pengirim gak boleh kosong',
                'nama_pengirim.min' => 'minimal 3 karakter',
                'nama_pengirim.max' => 'maksimal 25 karakter',
                'kode.required' => 'Kode Invoice gak boleh kosong',
                'kode.min' => 'minimal 9 karakter',
                'kode.max' => 'maksimal 9 karakter',
                'bank.required' => 'Nama Bank Pengirim gak boleh kosong',
                'bank.min' => 'minimal 2 karakter',
                'bank.max' => 'maksimal 25 karakter',
                'rekening.required' => 'Nomor Rekening Pengirim gak boleh kosong',
                'rekening.numeric' => 'nomor Rekening harus berupa angka',
                'rekening.max' => 'maksimal 16 karakter',
                'nominal.required' => 'Nominal Transfer gak boleh kosong',
                'nominal.numeric' => 'Nominal Transfer harus berupa angka',
                'nominal.between' => 'Nominal transfer minimal Rp. 10.000 dan maksimal Rp. 100.000.000',
                // 'harga.required' => 'harga gak boleh kosong',
                // 'harga.between' => 'harga minimal Rp. 1.000 dan maksimal 90.000.000',
                // 'harga.numeric' => 'harga harus berisi angka'
            ])->validate();
            $pay =new \App\Payment;
            $pay->kode=$request->kode;
            $pay->nama_pengirim=$request->nama_pengirim;
            $pay->bank=$request->bank;
            $pay->rekening=$request->rekening;
            $pay->nominal=$request->nominal;
            if ($request->file('foto')){
                $foto = $request->file('foto')->store('foto_bukti','public');
                $pay->foto= $foto;
            }
            $pay->save();
            return redirect()->route('input_payment')->with('status','Berhasil Input Bukti Pembayaran');
        }
    //proses checkout ke tabel transaksi

    public function transaksi(Request $request){
        $this->user_id=\Auth::user()->id;
        $pilihan = $request->alamat_choise;
        if($pilihan == 2){
            $transaksi=new \App\Transaksi;
            $transaksi->kode = str_random(9);
            $transaksi->user_id=$this->user_id;
            $transaksi->nama_penerima = $request->nama_penerima;
            $transaksi->alamat_kirim = $request->alamat;
            $transaksi->save();
            $cart=\Cart::session($this->user_id)->getContent();
            }else{
                $transaksi=new \App\Transaksi;
                $transaksi->kode = str_random(9);
                $transaksi->user_id=$this->user_id;
                $transaksi->nama_penerima = $request->nama_penerima;
                $transaksi->alamat_kirim = $request->alamat_choise;
                $transaksi->save();
                $cart=\Cart::session($this->user_id)->getContent();
            }
        foreach($cart as $item){
            $detail=new \App\Detail;
            $detail->barang_id=$item->id;
            $detail->transaksi_id=$transaksi->id;
            $detail->quantity=$item->quantity;
            $detail->save();
            \Cart::session($this->user_id)->remove($item->id);
        }
        return view ('checkout.payment',['cart'=>$cart,'transaksi'=>$transaksi]); 
    }

}
