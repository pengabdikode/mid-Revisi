@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Invoice
                </div>
                <div class="card-body">
                    <h3>Harap lakukan pembayaran ke rekening roy !</h3>
                    {{$transaksi->name}}
                    <h5>Kode Invoice Anda : {{$transaksi->kode}}</h5>
                    <h5>Nama Penerima : {{$transaksi->nama_penerima}}</h5>
                    <h5>Alamat Penerima : {{$transaksi->alamat_kirim}}</h5>
                    <table class="table">
                        <thead class="thead-light">
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total harga</th> 
                        </thead>
                        <tbody>
                    @foreach ($cart as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>Rp. {{number_format($item->price)}}</td>
                        <td>Rp. {{number_format($item->getPriceSum())}}</td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <h5>disini isi keterangan bank dll</h5>
                    <p>
                        <a href="/shop" class="btn btn-sm btn-success">Kembali ke Halaman Utama</a>
                        <a href="#" class="btn btn-sm btn-primary">Konfirmasi pembayaran</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
