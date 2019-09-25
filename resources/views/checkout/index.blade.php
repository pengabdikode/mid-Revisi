@extends('layouts.pembeli.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item active">Checkout</li>
                    @foreach ($cart as $item)
                    <li class="list-group-item" enctype="multipart/form-data">
                        {{$item->name}} {{$item->quantity}} unit x Rp. {{number_format($item->price)}} = Rp. {{number_format($item->getPriceSum())}}
                        <div class="row float-right">
                            <div class="">{{$item->foto}}</div>
                        </div>
                    @endforeach
                    </li>
                    <li class="list-group-item">
                            <label>Alamat Kirim</label>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    alamat sesuai profil
                                  {{-- {{$user->alamat}} --}}
                                </label>

                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  Isi alamat lain
                                </label>
                              </div>
                        </form>
                    </li>
                    </li>
                    <li class="list-group-item">
                    <a href="{{route('transaksi',['id'=>Auth::user()->id])}}" type="submit" class="btn btn-success">Payment</a>

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
