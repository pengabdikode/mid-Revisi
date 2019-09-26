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
                        <label>Data Pengiriman</label>
                        <form action="{{route('transaksi')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Penerima</label>
                                <input type="text" class="form-control" id="nama_penerima" placeholder="Password">
                            </div>
                            <div class="form-group">
                            <label>Alamat Kirim</label>
                            <div class="form-check">
                                @if ($users->alamat == null)
                                    <input class="form-check-input" type="radio" name="alamat_choise" id="alamat" disabled>
                                    <label>Alamat Kosong</label>
                                @else
                                    <input class="form-check-input" type="radio" name="alamat_choise" id="alamat" value="alamat">
                                    <label class="form-check-label" for="exampleRadios1">{{$users->alamat}}</label>
                                @endif
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alamat_choise" id="alamat" value="alamat" checked>
                                    <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Isi Alamat Lain" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pembayaran</label>
                            <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pilih_bayar" id="alamat" checked>
                                    <label>langsung di tempat</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pilih_bayar" id="alamat" value="alamat" checked>
                                    <label>Transfer Bank</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama_penerima" placeholder="Nama Pemilik Rekening">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama_penerima" placeholder="Nomor Rekening">
                                    </div>
                            </div>
                        </div>

                            {{-- @if ($cart == null)
                                <button type="submit" class="btn btn-success" disabled>Payment</button>
                            @else --}}
                                <button type="submit" class="btn btn-success" >Payment</button>
                            {{-- @endif --}}
                            
                        </form>
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
