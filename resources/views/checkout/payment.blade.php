@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang
                </div>
                <div class="card-body">
                    disini list barang yang mau di checkout
                    @foreach ($cart as $item)
                    {{$item->name}}
                    {{$item->quantity}}
                    {{$item->price}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
