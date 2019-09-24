@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($barang as $item)
        <div class="col-md-4">
            <div class="card" >
                @if ($item->foto == NULL)
                    <img src="{{asset('storage/asd.jpg'.$item->foto)}}" class="card-img-top" alt="..." >
                @else
                    <img src="{{asset('storage/'.$item->foto)}}" class="card-img-top" alt="..." >
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$item->nama_barang}}</h5>
                    <p class="card-text">Rp. {{number_format($item->harga)}}</p>
                    <form action="{{route('add.cart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="barang_id" value="{{$item->id}}">
                        <input type="submit" class="btn btn-block btn-sm btn-primary" value="Add Cart">
                    </form>
                    <a href="/info_barang/{{$item->id}}" class="btn btn-block btn-sm btn-success">Lihat Barang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        {{-- <script type="text/javascript">
            window.__lc = window.__lc || {};
            window.__lc.license = 11306652;
            (function() {
              var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
              lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
            })();
          </script> --}}
    </div>
@endsection
