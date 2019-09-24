@extends('layouts.pembeli.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item active">keranjang belanja</li>
                    @foreach ($cart as $item)
                    <li class="list-group-item">
                        {{$item->name}} {{$item->quantity}} unit x Rp. {{number_format($item->price)}} = Rp. {{number_format($item->price)}}
                        <div class="row float-right">
                            <div class="col-md-5">
                                <form action="{{route('min.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{$item->id}}">
                                    <input type="submit" name="" value="-" class="btn-danger">
                                </form>
                            </div>

                            <div class="">{{$item->quantity}}</div>

                            <div class="col-md-5">
                                <form action="{{route('plus.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{$item->id}}">
                                    <input type="submit" name="" value="+" class="btn-success">
                                </form>
                            </div>
                        </div>
                    @endforeach
                    </li>
                    <li class="list-group-item">
                    <a href="{{route('transaksi',['id'=>Auth::user()->id])}}" type="submit" class="btn btn-success">Checkout</a>

                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Cek Ongkir</div>
                    <form action="">
                        <select name="province" id="province">
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $.ajax({
            url : 'http://localhost:8000/province',
            method : 'get',
            dataType : 'JSON',
            success : function(response){
                var data = response.data.rajaongkir.results
                console.log(data);
                $.each(data , function(key,val){
                    $('#province').append(`<option value="` + val.province_id + `">`+ val.province + `</option>`)
                })
            },
            error: function(err){
                console.log(err)
            }
        })
    })
</script>
@endsection
