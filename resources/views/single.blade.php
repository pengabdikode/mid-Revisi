@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card mb-5 col-md-12 center">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('storage/'.$barang->foto)}}" class="card-img" alt="...">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$barang->nama_barang}}</h5>
                        <p class="card-text">Merk&emsp;&emsp;&nbsp;:{{$barang->merk}}</p>
                        <p class="card-text">tipe&emsp;&emsp;&emsp;:{{$barang->tipe}}</p>
                        <p class="card-text">warna&emsp;&emsp;&nbsp;:{{$barang->warna}}</p>
                        <p class="card-text">Stok&emsp;&emsp;&emsp;:{{$barang->stok}}</p>
                        <p class="card-text">Harga&emsp;&emsp;&nbsp;: Rp. {{number_format($barang->harga)}}</p>
                        <p class="card-text">deskripsi&emsp;:{{$barang->deskripsi}}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <form action="{{route('add.cart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="barang_id" value="{{$barang->id}}">
                        <input type="submit" class="btn btn-block btn-sm btn-primary" value="Add Cart">
                        <p><a href="/shop" class="btn btn-block btn-sm btn-success">lanjutkan Belanja</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection