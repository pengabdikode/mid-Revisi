@extends('layouts.pembeli.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item active">keranjang belanja</li>
                    @php
                        $jumlahtotal = 0;
                    @endphp
                    @if ($kosong)
                    <li class="list-group-item">
                        <h3>Keranjang Belanja Anda Kosong</h3>
                    </li>
                    @else
                    @foreach ($cart as $item)
                    @php
                        $jumlah = $item->getPriceSum();
                        $jumlahtotal = $jumlahtotal + $jumlah;
                    @endphp
                    <li class="list-group-item">
                        {{$item->name}} {{$item->quantity}} unit x Rp. {{number_format($item->price)}} = Rp. {{number_format($jumlah)}}
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
                    @endif
                    </li>
                    <li class="list-group-item">
                        <div class="col-mb-5 right">
                            <h5 class="right">Rp. {{ number_format($jumlahtotal) }}</h5>
                            @if ($kosong)
                                <fieldset disabled>
                                    <a href="{{route('index.checkout',['id'=>Auth::user()->id])}}" type="submit" class="btn btn-success">Checkout</a>
                                </fieldset>
                            @else
                                <a href="{{route('index.checkout',['id'=>Auth::user()->id])}}" type="submit" class="btn btn-success">Checkout</a>
                            @endif
                        </div>
                    </li>
                </ul>
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
