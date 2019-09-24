@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kategori
                </div>
                <div class="card-body">
                        <p><a href="{{route('kategori.create')}}" class="btn btn-sm btn-success">Tambah Kategori</a></p> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal input</th>
                            <th scope="col">Atribut</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item)
                            <tr>
                                <td>{{$item->nama_kategori}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><a href="{{route('kategori.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success">Update Kategori</a>
                                    <form action="{{route('kategori.destroy',['id'=>$item->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" class="btn btn-danger btn-sm" value="Hapus Kategori">
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kategori->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
