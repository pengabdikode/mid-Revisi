@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Barang
                </div>
                <form action="{{route('s_adminBarang.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label>Pilih Kategori</label>
                            <div class="form-group">
                                <select class="js-example-basic-multiple col-md-12" name="kategori[]" multiple="multiple">
                                    @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control {{$errors->has('nama_barang') ? ' is-invalid' : ''}}" name="nama_barang">
                        @if ($errors->has('nama_barang'))
                            <small class="text-danger">{{$errors->first('nama_barang')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk">
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" name="tipe">
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" class="form-control" name="warna">
                    </div>
                    <fieldset disabled>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok">
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" {{$errors->has('harga') ? ' is-invalid' : ''}} name="harga">
                        @if ($errors->has('harga'))
                            <small class="text-danger">{{$errors->first('harga')}}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <label>Foto</label>
                    <input type="file" name="foto">
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            });
    </script>   
@endsection