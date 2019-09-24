@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang
                </div>
                <div class="card-body">
                        <p><a href="{{route('s_adminBarang.create')}}" class="btn btn-sm btn-success" enctype="multipart/form-data">Tambah Barang</a></p>
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

                                <td><a href="{{route('s_adminBarang.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success">Update Barang</a>
                                    <form action="{{route('s_adminBarang.destroy',['id'=>$item->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" class="btn btn-danger btn-sm" value="Hapus Barang">
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
