@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil {{$users->name}}</div>

                <div class="card-body">
                    <form action="{{route('profil.update',['$id'=>$users->id])}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Username</label>
                            <fieldset disabled>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$users->name}}">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">E-mail</label>
                                <fieldset disabled>
                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control" name="email" value="{{$users->email}}">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                                <div class="col-md-4">
                                    <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{$users->nama_lengkap}}">
                                 </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-4">
                                    <input id="alamat" type="text" class="form-control" name="alamat" value="{{$users->Alamat}}">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Foto User</label>
                            <div class="col-md-4">
                                <input type="file" value="{{$users->foto}}" id="foto" name="foto" placeholder="Foto">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Ubah Profil</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection