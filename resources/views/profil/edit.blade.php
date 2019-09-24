@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ubah Profil User
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <fieldset disabled>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="text" class="form-control" value="{{$users->email}}" id= "email" name="nama" placeholder="E-mail">
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{$users->name}}" id= "nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{$users->alamat}}" id= "alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <label>Upload Foto User</label>
                    <br>
                    <input type="file" value="{{$users->foto}}" id="foto" name="foto" placeholder="Foto">
                    <input type="submit" class="btn btn-primary btn-sm btn-block" value="simpan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection