@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ubah Kategori
                </div>
                <form action="{{route('kategori.update',['$id'=>$kategori->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" value="{{$kategori->nama_kategori}}" id= "nama_kategori" name="nama" placeholder="Nama kategori">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" value="{{$kategori->keterangan}}" id= "keterangan" name="keterangan" placeholder="keterangan">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
