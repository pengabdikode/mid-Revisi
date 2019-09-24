@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil {{$users->name}}</div>
                <div class="card-body">
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
                            <fieldset disabled>
                                <div class="col-md-12">
                                    <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{$users->nama_lengkap}}">
                                 </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Alamat</label>
                            <fieldset disabled>
                                <div class="col-md-12">
                                    <input id="alamat" type="text" class="form-control" name="alamat" value="{{$users->alamat}}">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Foto User</label>
                            <fieldset disabled>
                                    <div class="col-md-12">
                                    @if ($users->foto == null)
                                    <td>
                                        <img src="storage/asd.jpg" width="100" height="100">
                                    </td>
                                @else
                                <td>
                                    <img src="{{asset('storage/'.$item->foto_user)}}" width="100" height="60">
                                </td>
                                @endif
                                    </div>
                            </fieldset>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                    <td><a href="{{route('profil.edit',['id'=>$users->id])}}" class="btn btn-sm btn-success">Ubah Profil</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection