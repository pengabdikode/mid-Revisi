@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">warna</th>
                            <th scope="col">Stok Barang</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal input</th>
                            <th scope="col">Atribut</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                            <tr>
                                @if ($item->foto == null)
                                    <td>
                                        <img src="storage/asd.jpg" width="100" height="60">
                                    </td>
                                @else
                                <td>
                                    <img src="{{asset('storage/'.$item->foto)}}" width="100" height="60">
                                </td>
                                @endif
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->merk}}</td>
                                <td>{{$item->tipe}}</td>
                                <td>{{$item->warna}}</td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><a href="{{route('barang.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success">Update Barang</a>
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
