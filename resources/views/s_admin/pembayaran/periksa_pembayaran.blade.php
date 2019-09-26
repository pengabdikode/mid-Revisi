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
                    <h5>Pembayaran Pending</h5>
                    <table class="table">
                        <thead class="thead-light">
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Alamat Penerima</th>
                            <th scope="col">Total harga</th> 
                        </thead>
                        <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->nama_penerima}}</td>
                        <td>{{$item->alamat_kirim}}</td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <h5>Konfirmasi pembayaran yang masuk</h5>
                    <table class="table">
                        <thead class="thead-light">
                            <th scope="col">Nama Barang</th>
                            <th scope="col">kode pembayaran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total harga</th> 
                        </thead>
                        <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->nama_penerima}}</td>
                        <td>{{$item->alamat_kirim}}</td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection