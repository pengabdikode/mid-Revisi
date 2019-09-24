@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ubah Barang
                </div>
                <form action="{{route('barang.update',['$id'=>$barang->id])}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <select class="js-example-basic-multiple" name="kategori[]" multiple="multiple">
                        @foreach ($kategori as $item)
                            <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="{{$barang->nama_barang}}" id= "nama_barang" name="nama" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" class="form-control" value="{{$barang->merk}}" id= "merk" name="merk" placeholder="Merk">
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" class="form-control" value="{{$barang->tipe}}" id= "tipe" name="tipe" placeholder="Tipe">
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" class="form-control" value="{{$barang->warna}}" id= "warna" name="warna" placeholder="Warna">
                    </div>
                    <fieldset disabled>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" value="{{$barang->stok}}" id= "stok" name="stok" placeholder="Stok">
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" value="{{$barang->harga}}" id= "harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" value="{{$barang->deskripsi}}" id= "deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <label>Upload Foto Baru</label>
                    <br>
                <input type="file" value="{{$barang->foto}}" id="foto" name="foto" placeholder="Foto">
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
            $('.js-example-basic-multiple').val({{$barang->kategori->pluck('id')}}).trigger('change');
            });
    </script>   
@endsection