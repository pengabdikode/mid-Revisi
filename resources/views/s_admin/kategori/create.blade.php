@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Kategori
                </div>
                <form action="{{route('kategori.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
