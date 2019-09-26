@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Payment
                </div>
                <div class="card-body">
                    <form action="{{route('periksa_konfirmasi')}}" method="GET">
                        @csrf
                        <div class="form-group">
                            <label>Input Kode pembayaran</label>
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode Pembayaran">
                            <button type="submit" class="btn btn-success">Periksa</button>
                        </div>
                    </form>
                    {{-- <h5>Nama Penerima : {{$user->nama_penerima}}</h5>
                    <h5>Alamat Pengiriman : {{$user->alamat_kirim}}</h5> --}}
                    <table class="table">
                        <thead class="thead-light">
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total harga</th> 
                        </thead>
                        <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>Rp. {{number_format($item->harga)}}</td>
                        <td>Rp. {{number_format(($item->harga)*($item->quantity))}}</td>
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