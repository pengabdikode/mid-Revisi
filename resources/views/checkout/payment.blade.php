@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payment
                </div>
                <div class="card-body">
                    <h3>Harap lakukan pembayaran ke rekening roy !</h3>
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
