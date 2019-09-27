@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Input Bukti Transfer Pembayaran</h3>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('simpan_payment')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kode Invoice</label>
                            <input type="text" class="form-control {{$errors->has('kode') ? ' is-invalid' : ''}}" name="kode">
                            @if ($errors->has('kode'))
                                <small class="text-danger">{{$errors->first('kode')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama Pengirim</label>
                            <input type="text" class="form-control {{$errors->has('nama_pengirim') ? ' is-invalid' : ''}}" name="nama_pengirim">
                            @if ($errors->has('nama_pengirim'))
                                <small class="text-danger">{{$errors->first('nama_pengirim')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" class="form-control {{$errors->has('bank') ? ' is-invalid' : ''}}" name="bank">
                            @if ($errors->has('bank'))
                                <small class="text-danger">{{$errors->first('bank')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening Pengirim</label>
                            <input type="numeric"  class="form-control {{$errors->has('rekening') ? ' is-invalid' : ''}}" name="rekening">
                            @if ($errors->has('rekening'))
                                <small class="text-danger">{{$errors->first('rekening')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="numeric" class="form-control {{$errors->has('nominal') ? ' is-invalid' : ''}}" name="nominal">
                             @if ($errors->has('nominal'))
                                <small class="text-danger">{{$errors->first('nominal')}}</small>
                            @endif 
                        </div>
                        <label>Foto</label>
                        <input type="file" name="foto">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" value="simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection